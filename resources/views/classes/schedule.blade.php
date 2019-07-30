@if(count($schedule))
    <div class="class-schedule">
        <h2 class="page-title">
            @lang('Расписание')
        </h2>

        <div class="schedule-table-wrap">
            @foreach($schedule as $day)
                <table class="schedule">
                    <caption class="schedule__caption">{{ \App\Models\Schedule::dayName($day->first()->day) }}</caption>
                    <thead class="schedule__head">
                        <tr class="schedule__row">
                            <th class="schedule__cell">№</th>
                            <th class="schedule__cell">@lang('Время')</th>
                            <th class="schedule__cell">@lang('Урок')</th>
                            <th class="schedule__cell">@lang('Учитель')</th>
                        </tr>
                    </thead>
                    <tbody class="schedule__body">
                        @foreach($day as $n => $subject)
                            <tr class="schedule__row">
                                <td class="schedule__cell schedule__cell--min">{{ $n + 1 }}</td>
                                <td class="schedule__cell schedule__cell--min" style="padding-right: 32px">{{ implode(' - ', \App\Models\Schedule::lessonTime($n + 1)) }}</td>
                                <td class="schedule__cell">{{ $subject->subject }}</td>
                                <td class="schedule__cell">{{ optional($subject->teacher)->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endisset