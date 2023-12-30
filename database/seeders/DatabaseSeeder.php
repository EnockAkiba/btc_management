<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        // \App\Models\Message::factory(10)->create();
        


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('users')->insert([
            'name' => 'BTC ADMIN',
            'lastName'=> 'BTC',
            'slug'=>'User01',
            'phone'=>'0973111973',
            'sex'=>'M',
            'email_verified_at'=>now(),
            'email' => 'btcagapd-drc@btcagaped.com',
            'roleUser'=>'2',
            'remember_token'=>'1',
            'password' => Hash::make('AdminBtc@2001'),
        ]);

    }
}
