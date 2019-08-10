<form class="contact-form" action="{{ route('contacts.send') }}" method="post">
    @csrf

    <h2 class="contact-form__title">@lang('Напишите нам')</h2>

    <div class="contact-form__row">
        <div class="input-field contact-form__field">
            <input type="text" class="input-field__input" required name="name" value="{{ $data['name'] ?? '' }}" placeholder="@lang('Представьтесь, пожалуйста')">
            @if($errors->has('name'))
                <span class="input-field__error">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="input-field contact-form__field">
            <input type="text" class="input-field__input" required name="contact" value="{{ $data['contact'] ?? '' }}" placeholder="@lang('Как с вами связаться?')">
            @if($errors->has('contact'))
                <span class="input-field__error">{{ $errors->first('contact') }}</span>
            @endif
        </div>
    </div>

    <textarea name="text" class="textarea" required placeholder="@lang('Что вас интересует?')">{{ $data['message'] ?? '' }}</textarea>
    @if($errors->has('text'))
        <span class="input-field__error">{{ $errors->first('text') }}</span><br>
    @endif

    <button type="submit" class="button button--small contact-form__button">@lang('Отправить сообщение')</button>

    @isset($message)
        <p class="contact-form__alerts">
            <span class="contact-form__alert contact-form__alert--{{ $errors->any() ? 'error' : 'success' }}">{{ $message }}</span>
        </p>
    @endisset
</form>