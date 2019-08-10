<?php

namespace App\Http\Controllers;

use App\Breadcrumbs;
use App\Models\Contact;
use App\Models\Metadata;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index', [
            'pageType' => 'index',
            'meta'     => Metadata::fromPage('index'),
        ]);
    }

    public function contacts(Request $request)
    {
        $page = Page::findBySlug('contacts')->published()->firstOrFail();

        $contacts = Contact::published()->ordered()->get();

        if ($request->getMethod() == 'POST') {
            $controller = new FormController();
            $data = $controller->callAction('contact', [$request]);
        } else {
            $data = [];
        }

        return view('pages.contacts', array_merge([
            'pageType'    => 'contacts',
            'meta'        => Metadata::fromPage($page),
            'breadcrumbs' => Breadcrumbs::page($page),
            'contacts'    => $contacts,
            'errors'      => new MessageBag(),
        ], $data));
    }

    public function show($page)
    {
        $page = Page::findBySlug($page)->published()->firstOrFail();

        return view('pages.page', [
            'page'        => $page,
            'pageType'    => 'article',
            'breadcrumbs' => Breadcrumbs::page($page),
            'meta'        => Metadata::fromPage($page),
        ]);
    }

    public function schedule()
    {
        $schedule = [
            [
                'class' => '5a',
                'days'  => [
                    ['химия', 'физика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика',],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика', 'матеиатика',]
                ]
            ],
            [
                'class' => '7a',
                'days'  => [
                    ['химия', 'физика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика',],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика', 'матеиатика',]
                ]
            ],
            [
                'class' => '9a',
                'days'  => [
                    ['химия', 'физика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика',],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика', 'матеиатика',]
                ]
            ],
            [
                'class' => '9a',
                'days'  => [
                    ['химия', 'физика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика',],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика', 'матеиатика',]
                ]
            ],
            [
                'class' => '9a',
                'days'  => [
                    ['химия', 'физика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика',],
                    ['химия', 'физика', 'матеиатика', 'русский'],
                    ['химия', 'физика', 'матеиатика', 'русский', 'химия', 'физика', 'матеиатика',]
                ]
            ],
        ];

        return view('pages.schedule', [
            'pageType' => 'schedule',
            'data'     => $schedule
        ]);
    }
}
