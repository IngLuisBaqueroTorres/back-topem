<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            'name'      => 'Luis Eduardo',
            'email'     => 'eduardobt123@gmail.com',
            'password'  => '$2y$10$zBia1aMSoCM68RfyPeMfK.n6YtNRq1ZhBN6yNF54U7uxffIv3GuqK'
        ]);
    }
}
