<section class="carousel">
    @foreach($banners as $banner)
        @if($banner->link)
            <a href="{{ localized($banner->link) }}" class="carousel__cell">
                <img class="carousel__image" src="{{ $banner->image->getUrl('catalog') }}" width="770" height="405" data-flickity-lazyload="{{ $banner->image->getUrl('catalog') }}"  alt="{{ $banner->title }}"/>
            </a>
        @else
            <div class="carousel__cell">
                <img class="carousel__image" src="{{ $banner->image->getUrl('catalog') }}" width="770" height="405" data-flickity-lazyload="{{ $banner->image->getUrl('catalog') }}"  alt="{{ $banner->title }}"/>
            </div>
        @endif
    @endforeach
</section>