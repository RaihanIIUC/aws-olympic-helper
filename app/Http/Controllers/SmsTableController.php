<?php

namespace App\Http\Controllers;

use App\Models\SentSms;
use Illuminate\Http\Request;

class SmsTableController extends Controller
{
    public function smstableAction()
    {
        $sms = SentSms::latest()->paginate(5);
        return view('welcome', compact('sms'));
    }
}
