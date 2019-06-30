@if(isset($breadcrumbs))
    <div class="breadcrumbs">
        <a href="{{ \InWeb\Base\Support\Route::route('index') }}" class="breadcrumbs__item">
            <i class="fas fa-home breadcrumbs__icon-home"></i>
            @lang('Главная')
        </a>

        @foreach($breadcrumbs as $item)
            <a href="{{ $item['link'] }}" class="breadcrumbs__item">{{ $item['title'] }}</a>
        @endforeach
    </div>
@endif