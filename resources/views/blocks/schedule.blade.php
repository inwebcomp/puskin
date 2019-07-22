<div class="schedule-table-wrap">
    <table class="schedule">
        <thead class="schedule__head">
            <tr class="schedule__row">
                <th class="schedule__cell"></th>
                <th class="schedule__cell">@lang('Понедельник')</th>
                <th class="schedule__cell">@lang('Вторник')</th>
                <th class="schedule__cell">@lang('Среда')</th>
                <th class="schedule__cell">@lang('Четверг')</th>
                <th class="schedule__cell">@lang('Пятница')</th>
            </tr>
        </thead>
        <tbody class="schedule__body">
            @foreach($data as $class)
                <tr class="schedule__row">
                    <td class="schedule__cell">{{ $class['class'] }}</td>

                    @foreach($class['days'] as $day)
                    <td class="schedule__cell">
                    <table class="schedule__table-small" width="100%">
                        
                        @for ($i = 0; $i < 7; $i++)
                        <tr class="schedule__table-small__row">
                            <td class="schedule__table-small__cell">{{ $day[$i] ?? ''}}</td>
                        </tr>
                        @endfor
                    </table>
                    </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>