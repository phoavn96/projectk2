<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function send_mail()
    {
        $data = array('username' => 'xuanhung', 'namegift' => 'Hello world', 'transaction' => 'as');
        Mail::send('admin.email.send', $data, function ($message) {
            $message->to('baolangsa18@gmail.com', 'Tutorials Point') -> subject('thu nghiem gui mail');
            $message->from('locnxth1907005@fpt.edu.vn', 'Xuan Hung');
        });

    }
}
