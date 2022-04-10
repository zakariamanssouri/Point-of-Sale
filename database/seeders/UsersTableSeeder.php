<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = ['ahmed','karim', 'salim'];


        foreach ($users as $user) {
            User::create([
                'first_name'=>$user,
                'last_name' => $user,
                'email' => $user.'@mypos.ma',
                'password' => bcrypt('123456'),
                'phone'=>'02894988924',
                'cin'=>'I283989',
            ]);
        }

        $admin = User::create([
            'first_name'=>'admin',
            'last_name' => 'admin',
            'email' => 'admin@mypos.ma',
            'password' => bcrypt('123456'),
            'phone'=>'02894988924',
            'cin'=>'I283989',
        ]);



        $admin->attachRole('super_admin');
    }
}
