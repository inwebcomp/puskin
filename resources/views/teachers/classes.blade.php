@if(is_countable($classes) and count($classes))
    <div class="class-teacher">
        <h2 class="page-title">
            @lang('Руководитель')
        </h2>

        @foreach($classes as $class)
            <div class="classes__row">
                @include('classes.snippets.card-teacher', ['class' => $class])
            </div>
        @endforeach
    </div>
@endif