<comments>
    <div class="comments" id="comments">
        <div class="page-title">@lang('Комментарии') @if($comments->count()) ({{ $comments->count() }}) @endif</div>

        @if(! $comments->count())
            <button  type="button" class="comments__head comments__head--empty" style="margin-bottom: 16px">
            <i class="fal fa-comment-lines comments__head-icon"></i>
            <p class="comments__head-text">
                @lang('Нет комментариев')
            </p>
            </button>
        @endif

        @if($comments->count())
            <div class="comments__inner">
                @foreach($comments as $comment)
                    <div class="comments__item">
                        <div class="comments__item-info">
                            <span class="comments__item-name">{{ $comment->name }}</span>
                            <span class="comments__item-time">{{ $comment->date }}</span>
                        </div>
                        <div class="comments__item-text">{{ $comment->text }}</div>
                    </div>
                @endforeach
            </div>
        @endif



        <form class="comments__footer" action="" method="post">
            @csrf

            <div class="comments__add" id="comment-add">
                <div class="page-title">@lang('Оставьте свой комментарий')</div>

                <div class="input-field">
                    <input type="text" class="input-field__input" name="name" value="{{ $data['name'] ?? '' }}" placeholder="@lang('Ваше имя')">
                    @if($errors->has('name'))
                        <span class="input-field__error">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <textarea name="text" class="textarea" placeholder="@lang('Текст комментария')">{{ $data['message'] ?? '' }}</textarea>
                @if($errors->has('text'))
                    <span class="input-field__error">{{ $errors->first('text') }}</span><br>
                @endif
            </div>

            <button class="button button--small comments__btn">@lang('Добавить комментарий')</button>

            @isset($message)
                <p class="contact-form__alerts">
                    <span class="contact-form__alert contact-form__alert--{{ $errors->any() ? 'error' : 'success' }}">{{ $message }}</span>
                </p>
            @endisset
        </form>

        @if(isset($message) or $errors->any())
            <script>
                window.location.href = "#comment-add"
            </script>
        @endif
    </div>
</comments>