<?php

use App\Models\Textblock;
use Illuminate\Database\Seeder;

class TextBlockSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Textblock::create([
            'uid'   => 'copyrights',
            'title' => 'Подпись внизу сайта (Copyrights)',
        ]);
        Textblock::create([
            'uid'   => 'phone',
            'title' => 'Телефон',
        ]);
        Textblock::create([
            'uid'   => 'address',
            'title' => 'Адрес',
        ]);
        Textblock::create([
            'uid'   => 'email',
            'title' => 'Email адрес',
        ]);
    }
}
