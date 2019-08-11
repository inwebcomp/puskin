<section class="carousel">
    <div class="owl-carousel">
        @foreach($banners as $banner)
            @if($banner->link)
                @foreach($banner->images as $image)
                    <a href="{{ localized($banner->link) }}" class="carousel__cell">
                        <img class="carousel__image" src="{{ $image->getUrl('catalog') }}" width="770" height="405" data-flickity-lazyload="{{ $image->getUrl('catalog') }}"  alt="{{ $banner->title }}"/>
                    </a>
                @endforeach
            @else
                @foreach($banner->images as $image)
                    <div class="carousel__cell">
                        <img class="carousel__image" src="{{ $image->getUrl('catalog') }}" width="770" height="405" data-flickity-lazyload="{{ $image->getUrl('catalog') }}"  alt="{{ $banner->title }}"/>
                    </div>
                @endforeach
            @endif
        @endforeach
    </div>
</section>