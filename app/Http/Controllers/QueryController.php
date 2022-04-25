<?php

namespace App\Http\Controllers;

use App\Models\SentSms;
use Illuminate\Http\Request;

class QueryController extends Controller
{



    public function queryByDate(Request $request)
    {
        $start_date = date('Y-m-d', strtotime($request->start_at));
        $end_date = date('Y-m-d', strtotime($request->end_at));


        $foundSms = SentSms::whereBetween('created_at', [$start_date, $end_date])->get();

        return view('query', compact('foundSms'));
    }
}
