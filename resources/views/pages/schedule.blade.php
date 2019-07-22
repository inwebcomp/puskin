@extends('layout.default')

@section('title', __('Лицей им. А.С.Пушкина'))

@section('content')
    <main class="page-main">
            <div class="schedule__table-wrap">
                <table class="schedule">
                    <thead class="schedule__head">
                        <tr class="schedule__row">
                            <th class=class="schedule__cell">--</th>
                            <th class=class="schedule__cell">Понедельник</th>
                            <th class=class="schedule__cell">Вторник</th>
                            <th class=class="schedule__cell">Среда</th>
                            <th class=class="schedule__cell">Четверг</th>
                            <th class=class="schedule__cell">Пятница</th>
                        </tr>
                    </thead>
                    <tbody class="schedule__body">
                        
                    </tbody>
                </table>
            </div>

    </main>
@endsection

@section('footer')
   
@endsection