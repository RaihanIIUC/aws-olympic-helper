<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\UssdReceiver;
use App\Classes\UssdSender;
use App\Classes\UssdException;
use App\Classes\Subscription;
use App\Classes\SubscriptionException;

use App\Classes\SMSSender;
use App\Classes\SMSReceiver;
use App\Classes\SMSServiceException;

use App\Classes\SubscriptionReceiver;

use App\Models\item;
use App\Models\route;
use App\Models\error_message;
use App\Models\download_message;
use App\Models\voucher_details;
use App\Models\voucher_head;
use Session;
use App\Models\route_with_number;
use App\Models\response_log;
use App\Models\SentSms;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class BdappsController extends Controller
{



    // sms response reciver function to store the response and data field that we 
    // can need to store for olympic aws system
    public function sms(Request $request)
    {

        $appid = "APP_060322";
        $apppassword = "edf54eb9915fb5064caea8778368dd9c";

        try {


            // Creating a receiver and intialze it with the incomming data
            $receiver = new SMSReceiver($request->all());


            $sender = new SmsSender("https://developer.bdapps.com/sms/send", $appid, $apppassword);

            //Creating a sender

            $message = $receiver->getMessage(); // Get the message sent to the app
            $address = $receiver->getAddress();    // Get the phone no from which the message was sent 
            $jsonInfo = $receiver->getJson();


            //---------- 	Send a SMS to a particular user
            $response = $sender->sms('Thanks for your response', $address);
            $response2 = $sender->broadcast('Thank you for your SMS' . '  ' . $message);



            if ($response2->statusCode == 'S1000') {
                $status = 1;
            } else {
                $status = -1;
            }

            // storing the api calls request params in database.
            SentSms::create([
                'applicationId' => $request->applicationId,
                'message' => $message,
                'sourceAddress' => $address,
                'requestId' => $request->requestId
            ]);

            // storing the data in json format as response log
            response_log::create([
                'applicationId' =>
                $request->applicationId,
                'status' => $status,
                'response' => $response2->statusCode
            ]);



            // return $response;
        } catch (SMSServiceException $e) {
            $response =   $sender->sms("Thank you for your response " . $message . '' . $e->getErrorCode() . " " . $e->getErrorMessage(), $address);
        }
    }



    public function SearchByDate(Request $request)
    {
        $from_date = date('Y-m-d', strtotime($request->start_at));
        $to_date = date('Y-m-d', strtotime($request->end_at));

        $queryByDate = SentSms::whereBetween('created_at', [$from_date, $to_date])->get();

        return response()->json([$queryByDate], 200);
    }
}
