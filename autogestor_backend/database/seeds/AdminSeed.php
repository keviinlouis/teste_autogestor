<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
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
                'email' => 'master@master.com',
                'senha' => Hash::make('123456'),
            ]
        ];

        foreach ($data as $item) {
            DB::table('admins')->updateOrInsert(['id' => $item['id']], $item);
        }
    }
}
