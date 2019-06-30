<aside class="page-sitebar events-sitebar">
    <div class="events-list">
        <h2 class="page-title events-list__title">Мероприятия</h2>

        @foreach($events as $item)
            @include('news.snippets.small', ['item' => $item])
        @endforeach
    </div>
</aside>