<?php

use App\Entities\Categoria;
use Illuminate\Database\Seeder;

class CategoriasSeed extends Seeder
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
                    'nome' => 'Categoria ' . $i,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            DB::table('categorias')->updateOrInsert(['id' => $data['id']], $data);
        }
    }
}
