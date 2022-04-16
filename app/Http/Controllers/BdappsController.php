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
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class BdappsController extends Controller
{
    //
    protected $cur_date; //= date("Y-m-d");
    protected $prev_date; // = date('Y-m-d', strtotime('-7 days'));
    protected $time;

    public function __construct()
    {
        date_default_timezone_set("Asia/Dhaka");
        $this->cur_date = date('Ymd');
        $this->time = date('h:i:s');
        $this->prev_date = date('Y-m-d', strtotime('-7 days'));
    }

    public function resend_sms()
    {
        $server = 'https://developer.bdapps.com/sms/send';
        $appid = "APP_036385";
        $apppassword = "00febb6e06c0c8a30c268f18d69de401";
        $sender = new SMSSender($server, $appid, $apppassword);
        $datas = response_log::where('statusCode', '!=', 'S1000')->where('timeStamp', 'LIKE', $this->cur_date . "%")->take(10)->get();
        $myfile = fopen("tmp_file.txt", "a+") or die("Unable to open file!");
        //fwrite($myfile,json_encode($datas)." ".$this->cur_date."\n");
        foreach ($datas as $data) {
            $response = $sender->sms('Thanks for your response', $data->address);
            fwrite($myfile, $response->timeStamp . " " . $this->time . " " . $response->address . "\n");
            response_log::where('id', $data->id)->update(['timeStamp' => $response->timeStamp, 'address' => $response->address, 'messageId' => $response->messageId, 'statusDetail' => $response->statusDetail, 'statusCode' => $response->statusCode]);
            usleep(100000);
        }
        fclose($myfile);
        // $response = $sender->sms('Thanks for your response', $address);

    }



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


            return response()->json(['wins', $message, $address], 200);
            //---------- 	Send a SMS to a particular user
            // $response = $sender->sms("Thank you for your response " . $message . ' ' . $version_id, $address);
        } catch (SMSServiceException $e) {
            return response()->json(['failed']);

            // $logger->WriteLog($e->getErrorCode() . " " . $e->getErrorMessage() . "\n");
        }
    }
}
