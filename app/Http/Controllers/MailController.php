<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJobs;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request) {

        dispatch(new EmailJobs($request->all()));

        return 'Email sent!!';
    }
}
