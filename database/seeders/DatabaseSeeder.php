<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        if (config('app.env') != 'production') {
            User::factory()->count(5)->create();

            $this->call([
//                UserSeeder::class,
                MailSeeder::class,
                RecipientSeeder::class,
            ]);
        }
    }
}
