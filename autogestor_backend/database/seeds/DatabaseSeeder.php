<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeed::class);
        $this->call(CategoriasSeed::class);
        $this->call(MarcasSeed::class);
        $this->call(ProdutosSeed::class);
        $this->call(PermissoesSeed::class);
        $this->call(UsuariosSeed::class);

        if(env('APP_ENV') != 'production'){
//            $this->call(TestesSeed::class);
        }
    }
}
