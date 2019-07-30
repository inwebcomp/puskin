<form class="contact-form">
    <h2 class="contact-form__title">@lang('Напишите нам')</h2>

    <div class="contact-form__row">
        <div class="input-field contact-form__field">
            <input type="text" class="input-field__input" required  placeholder="@lang('Представьтесь, пожалуйста')">
            <span class="input-field__error">@lang('Произошла ошибка')</span>
        </div>

        <div class="input-field contact-form__field">
            <input type="text" class="input-field__input" required  placeholder="@lang('Как с вами связаться?')">
            <span class="input-field__error">@lang('Произошла ошибка')</span>
        </div>
    </div>

    <textarea name="" class="textarea" placeholder="@lang('Что вас интересует?')"></textarea>

    <button type="submit" class="button button--small contact-form__button">@lang('Отправить сообщение')</button>

    <p class="contact-form__alerts">
        <span class="contact-form__alert-error">@lang('Сообщение отправлено! Мы с вами скоро свяжемся')</span>
        <span class="contact-form__alert-success">@lang('Произошла ошибка. Пожалуйста, свяжитесь с нами через контакты выше')</span>
    </p>
</form>