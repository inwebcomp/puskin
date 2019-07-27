<?php

use Illuminate\Database\Seeder;

use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Page::create([
            'slug'   => 'index',
            'title' => 'Главная страница',
        ]);
        Page::create([
            'slug'   => 'news',
            'title' => 'Новости',
        ]);
        Page::create([
            'slug'   => 'events',
            'title' => 'Мероприятия',
        ]);
        Page::create([
            'slug'   => 'album',
            'title' => 'Фотоальбом',
        ]);
        Page::create([
            'slug'   => 'schedule',
            'title' => 'Расписание',
        ]);
        Page::create([
            'slug'   => 'classes',
            'title' => 'Классы',
        ]);
    }
}
