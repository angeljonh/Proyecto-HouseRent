<?php

use Illuminate\Database\Seeder;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Zona::create(['zona' => 'Guadalajara', 'clave' => '10']);
        App\Zona::create(['zona' => 'Zapopan', 'clave' => '11']);
        App\Zona::create(['zona' => 'Tonala', 'clave' => '12']);
        App\Zona::create(['zona' => 'Tlaquepaque', 'clave' => '13']);
    }
}
