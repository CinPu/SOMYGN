<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Major;
use App\Models\StudentIdPrefix;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::create([
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('SOMygn2020'),
            'name'=>'Admin',
            'phone'=>'09783664278'
         ]);
         StudentIdPrefix::create(['prefix'=>'SOM-B006']);
    }
}
