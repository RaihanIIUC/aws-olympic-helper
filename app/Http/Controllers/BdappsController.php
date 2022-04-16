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
    //
    // protected $cur_date; //= date("Y-m-d");
    // protected $prev_date; // = date('Y-m-d', strtotime('-7 days'));
    // protected $time;

    // public function __construct()
    // {
    //     date_default_timezone_set("Asia/Dhaka");
    //     $this->cur_date = date('Ymd');
    //     $this->time = date('h:i:s');
    //     $this->prev_date = date('Y-m-d', strtotime('-7 days'));
    // }


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


            //---------- 	Send a SMS to a particular user
            $response = $sender->sms('Thanks for your response', $address);
            SentSms::create([
                'applicationId' => $request->applicationId,
                'message' => $message,
                'sourceAddress' => $address,
                'requestId' => $request->requestId
            ]);



            // return $response;
        } catch (SMSServiceException $e) {
            $sender->sms("Thank you for your response " . $message . '' . $e->getErrorCode() . " " . $e->getErrorMessage(), $address);
        }
    }
}
