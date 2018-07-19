<?php

use App\Entities\Produto;
use Illuminate\Database\Seeder;

class ProdutosSeed extends Seeder
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
                'nome' => 'Produto ' . $i,
                'valor' => rand(10, 50),
                'marca_id' => rand(1, 10),
                'categoria_id' => rand(1, 10),
            ];
            DB::table('produtos')->updateOrInsert(['id' => $data['id']], $data);
        }
    }
}
