<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    public function contact(Request $request)
    {
        //Mail::to(config('contacts.mail_to'))->queue(new ConsultationMail($request->input()));

        return [
            'message' => __("Сообщение отправлено!"),
            'description' => __("Мы с вами скоро свяжемся")
        ];
    }
}
