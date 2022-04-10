<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    public function run()
    {
        $clients = ['zakaria','bob', 'jessica'];

        foreach ($clients as $client) {
            Client::create([
                'name' => $client,
                'phone'=>'02874892498',
                'address'=>'rue 3 n 27 paris'
        ]);
        }

    }
}
