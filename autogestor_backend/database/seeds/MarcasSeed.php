<?php

use App\Entities\Marca;
use Illuminate\Database\Seeder;

class MarcasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'id' => $i,
                'nome' => 'Marca ' . $i,
                'created_at' => now(),
                'updated_at' => now(),

            ];
            DB::table('marcas')->updateOrInsert(['id' => $data['id']], $data);
        }
    }
}
