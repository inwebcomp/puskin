<div class="contacts-list">
    @foreach(array(1, 2, 3) as $value)
        @include('contacts.snippets.contact-item')
    @endforeach
</div>

