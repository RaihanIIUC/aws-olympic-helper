<?php

namespace App\Http\Controllers;

use App\Models\SentSms;
use Illuminate\Http\Request;

class SmsTableController extends Controller
{
    public function smstableAction()
    {
        $sms = SentSms::latest()->paginate(5);
        $total = SentSms::count();
        $no_count = 1;

        debugbar()->info('message1222');

        return view('welcome', compact('sms', 'total', 'no_count'));
    }
}
