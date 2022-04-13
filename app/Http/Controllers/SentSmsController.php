<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsStoreRequest;
use App\Models\SentSms;
use Illuminate\Http\Request;
use App\Classes\UssdReceiver;
use App\Classes\UssdSender;
use App\Classes\UssdException;
use App\Classes\Logger;
use App\Classes\Subscription;
use App\Classes\SubscriptionException;

use App\Classes\SMSSender;
use App\Classes\SMSReceiver;
use App\Classes\SMSServiceException;

class SentSmsController extends Controller
{


    public function sms(Request $request)
    {


        // file_put_contents('test.txt', 'hello');
        $server = 'https://developer.bdapps.com/sms/send';
        $appid = "APP_060322";
        $apppassword = "edf54eb9915fb5064caea8778368dd9c";
        // dd($server, $appid, $apppassword);

        try {

            info(file_get_contents('php://input'));
            $receiver = new SMSReceiver(file_get_contents('php://input'));
            dd($receiver);
            //Creating a sender
            $sender = new SMSSender($server, $appid, $apppassword);

            $message = $receiver->getMessage(); // Get the message sent to the app
            $address = $receiver->getAddress(); // Get the phone no from which the message was sent
            $appid = $receiver->getApplicationId(); // Get the phone no from which the message was sent



            //	Send a SMS to a particular user
            $response = $sender->sms('Thanks for your response', $address);

            // storing the data in database 
            SentSms::create([
                'timeStamp' => $response->timeStamp,
                'address' => $response->address,
                'message' => $message,
                'messageId' => $response->messageId,
                'statusDetail' => $response->statusDetail,
                'statusCode' => $response->statusCode
            ]);

            return response()->json([
                'status' => 'win',
                'response_log'
            ]);
        } catch (SMSServiceException $e) {
            return response()->json([
                'status' => 'failed', 'response_log' => $e->getErrorCode() . " " . $e->getErrorMessage() . "\n"
            ]);
        }
    }



    public function SmsStore(SmsStoreRequest $request)
    {

        SentSms::create([
            'applicationId' => $request->applicationId,
            'sourceAddress' => $request->sourceAddress,
            'message' => $request->message,
            'requestId' => $request->requestId
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }


    public function SearchByDate(Request $request)
    {
        $from_date = date('Y-m-d', strtotime($request->start_at));
        $to_date = date('Y-m-d', strtotime($request->end_at));

        $queryByDate = SentSms::whereBetween('created_at', [$from_date, $to_date])->get();

        return response()->json([$queryByDate], 200);
    }

    public function hello()
    {
        return response()->json('hellos', 200);
    }
}
