<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;

class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Nioyoin coders',
            'body' => 'This is for testing email using smtp.'
        ];
         
        Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));
           
        dd("Email is sent successfully.");
    }
}
