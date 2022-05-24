<?php

namespace Database\Seeders;

use App\Models\SentSms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        SentSms::factory(5000)->create();
    }
}
