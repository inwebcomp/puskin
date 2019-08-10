<div class="contacts-list">
    @foreach($contacts as $contact)
        @include('contacts.snippets.contact-item', ['contact' => $contact])
    @endforeach
</div>

