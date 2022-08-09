<?php

namespace Database\Seeders;

use Carbon\Factory;
use App\Models\person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::factory(50)->create();  
    }
}
