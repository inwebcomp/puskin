<div class="contact-item">
    <p class="contact-item__title">{{ $contact->title }}</p>
    <p class="contact-item__name">{{ $contact->name }}</p>

    @if($contact->phone)
        <a href="tel:{{ preg_replace("/[^+0-9]+/", '', $contact->phone) }}" class="contact-item__element">
            <i class="fas fa-phone contact-item__icon"></i>
            {{ $contact->phone }}
        </a>
    @endif
    @if($contact->phone_mobile)
        <a href="tel:{{ preg_replace("/[^+0-9]+/", '', $contact->phone_mobile) }}" class="contact-item__element">
            <i class="far fa-mobile contact-item__icon"></i>
            {{ $contact->phone_mobile }}
        </a>
    @endif
    @if($contact->email)
        <a href="mailto:{{ $contact->email }}" class="contact-item__element">
            <i class="far fa-at contact-item__icon"></i>
            {{ $contact->email }}
        </a>
    @endif
</div>