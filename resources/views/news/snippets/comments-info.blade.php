@if ($item->date or $item->commentsCount)
    <div class="data-comment {{ $classes ?? '' }}">
        @if ($item->date)
            <span class="data-comment__date">
                <i class="fal fa-calendar-alt data-comment__icon"></i>
                {{ $item->date }}
            </span>
        @endif
        @if ($item->commentsCount)
            <a href="{{ $item->path() . '#comments' }}" class="data-comment__comments">
                <i class="fal fa-comment-lines data-comment__icon"></i>
                @lang('Комментариев'):
                <span class="data-comment__comments-count">{{ $item->commentsCount }}</span>
            </a>
        @endif
    </div>
@endif