<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\SMSSender;
use App\Classes\SMSReceiver;
use App\Classes\SMSServiceException;
use App\Models\response_log;
use App\Models\SentSms;
use Illuminate\Support\Facades\Log;
use Storage;


class BdappsController extends Controller
{

    /**
     *  sms response reciver function to store the response and data field that we 
     * can need to store for olympic aws system
     */
    public function sms(Request $request)
    {

        $appid = "APP_060322";
        $apppassword = "edf54eb9915fb5064caea8778368dd9c";
        $SendingSmsBaseUrl = "https://developer.bdapps.com/sms/send";

        try {
            // Creating a receiver and intialze it with the incomming data
            $receiver = new SMSReceiver($request->all());
            $sender = new SmsSender($SendingSmsBaseUrl, $appid, $apppassword);

            //Creating reciver instance with its dependencies
            $message = $receiver->getMessage(); // Get the message sent to the app
            $address = $receiver->getAddress();    // Get the phone no from which the message was sent 

            // we try here sms instead of broadcasting but it fails to send data to the server
            // to server , so then we uses the broadcast function to make it works
            $smsSendingToUser = $sender->broadcast('Thank you for your SMS' . '  ' . $message);
            // $smsSendingToUser = $sender->sms('Thank you for your SMS', $address);


            // a constrains to keep the status( boolean ) up to date , if 
            //then the status is 1 , if any way failed = -1
            // if ($smsSendingToUser->statusCode == 'S1000') {
            //     $status = 1;
            // } else {
            //     $status = -1;
            // }


            // storing the api calls request params in database.
            SentSms::create([
                'applicationId' => $appid,
                'message' => $message,
                'sourceAddress' => $address,
                'requestId' => $request->requestId
            ]);


            // storing the data in json format as response log
            response_log::create([
                'applicationId' =>
                $appid,
                'status' => $status,
                'response' => $smsSendingToUser
            ]);


            // return failed responses $response;
        } catch (SMSServiceException $e) {
            $response2 = $sender->broadcast('you sms sent failed' . '  ' . $message);
        }
    }

    /**
     * A function which search data by two date , and pull it to olympic 2 solution 
     * it was checked out and hope it will works fine.
     */
    public function SearchByDate(Request $request)
    {
        $start_date = date('Y-m-d', strtotime($request->start_at));
        $end_date = date('Y-m-d', strtotime($request->end_at));

        // this actually a orm calling where we have to give 2 params [starting date , last date ] 
        // which times data we want to full it from the database to keep the olympic system
        // up to date with the user subscription_status
        // $queryByDate = SentSms::whereBetween('created_at', [$start_date, $end_date])->get();
        $queryByDate = SentSms::whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date)->get();


        if (count($queryByDate) < 0) {
            return response()->json(['failed'], 400);
        }
        return response()->json($queryByDate, 200);
    }
}
