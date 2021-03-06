@extends('layout.default')

@section('content')
    <main class="page-contact">
        @include('contacts.list', ['contacts' => $contacts])

        <div class="contacts-actions">
            @include('contacts.contact-form')

            @include('contacts.map')
        </div>
    </main>
@endsection