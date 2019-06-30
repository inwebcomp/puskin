@if(count($news))
    <section class="others-list">
        <h2 class="page-title page-title--labeled others-list__title">@lang('Другие новости')</h2>
        <div class="others-list__list">
            @foreach($news as $item)
                @include('news.snippets.card', ['item' => $item])
            @endforeach
        </div>
    </section>
@endif