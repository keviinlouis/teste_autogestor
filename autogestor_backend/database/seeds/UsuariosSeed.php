<?php

use Illuminate\Database\Seeder;

class UsuariosSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $data =  [
                'id' => $i,
                'email' => 'usuario_'.$i.'@mail.com',
                'senha' => '123456'
            ];
            $usuario = \App\Entities\Usuario::create($data);

            $usuario->permissoes()->attach(\App\Entities\Permissao::inRandomOrder()->limit(rand(1,3))->pluck('id')->toArray());
        }
    }
}
