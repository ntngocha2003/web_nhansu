<?php


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker=Faker::create();
        for($i=0;$i<1;$i++){
            Admin::create([
                'name' => 'Nguyễn Hà',
                'email' => 'ha2003@gmail.com',
                'password'=> Hash::make('ha0806'),
            ]);
        }
    }
}
