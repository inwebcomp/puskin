@isset($teacher)
    <div class="class-teacher">
        <h2 class="page-title">
            @lang('Руководитель')
        </h2>

        <div class="classes__row">
            @include('teachers.snippets.card-class', ['teacher' => $teacher])
        </div>
    </div>
@endisset