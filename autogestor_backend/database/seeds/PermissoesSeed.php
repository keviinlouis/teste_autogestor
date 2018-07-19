<?php

use Illuminate\Database\Seeder;

class PermissoesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'nome' => 'Criar Produto',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nome' => 'Criar Marca',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nome' => 'Criar Categoria',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($data as $item) {
            DB::table('permissoes')->updateOrInsert(['id' => $item['id']], $item);
        }
    }
}
