<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    public function run()
    {
        Mail::factory()->count(3)->create();
    }
}
