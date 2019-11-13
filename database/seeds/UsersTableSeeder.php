<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'       => 'Administrador',
            'email'      => 'admin@admin.com',
            'password'   =>  bcrypt('admin@admin.com'),
            'status'     => '1',
            'type'       => 'admin',
            'created_at' => '2019-06-18 18:37:19',
            'updated_at' => '2019-06-18 18:37:19',
         ]);
    }
}
