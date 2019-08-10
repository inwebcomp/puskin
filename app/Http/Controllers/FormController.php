<?php

namespace App\Http\Controllers;

use App\Mail\CommentMail;
use App\Mail\ContactMail;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'contact' => 'required',
            'text'    => 'required',
        ], [
            'name.required' => __('Как к вам обращаться?'),
            'contact.required' => __('Мы должны с вами как-то связаться'),
            'text.required' => __('Вы забили самое главное'),
        ]);

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors(),
                'data' => $validator->getData(),
            ];
        }

        Mail::to(config('contacts.mail_to'))->queue(new ContactMail($request->input()));

        return [
            'message' => __('Сообщение отправлено! Мы с вами скоро свяжемся'),
        ];
    }

    public function comment(Request $request, Article $article)
    {
        $validator = Validator::make($request->all(), [
            'name'    => '',
            'text'    => 'required',
        ], [
            'text.required' => __('Вы забили самое главное'),
        ]);

        $validatedData = $validator->getData();

        if ($validator->fails()) {
            return [
                'errors' => $validator->errors(),
                'data' => $validatedData,
            ];
        }

        $article->comments()->create([
            'name' => $validatedData['name'],
            'text' => $validatedData['text'],
        ]);

//        Mail::to(config('contacts.mail_to'))->queue(new CommentMail($request->input(), $article));

        return [
            'message' => __('Комментарий добавлен'),
        ];
    }
}
