<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsStoreRequest;
use App\Models\SentSms;
use Illuminate\Http\Request;

class SentSmsController extends Controller
{


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
}
