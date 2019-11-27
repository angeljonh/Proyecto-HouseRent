<?php

use Illuminate\Database\Seeder;

class PropiedadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Propiedad::create(['user_id' => '1', 'id' => '1', 'zona_id' => '1', 'nombre' => '', 'descripcion' => 'cerca de cucei', 'domicilio' => 'Benjamin Gutierrez', 'numero' => '4283', 'cp' => '44240', 'precio' => '3500', 'area' => '130', 'camas' => '2', 'cuartos' => '3', 'baños' => '2', 'telefono' => '3331300949']);
    }
}
