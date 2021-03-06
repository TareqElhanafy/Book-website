<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::where('email','tt@2.com')->first();
        if (!$user) {
          User::create([
            'name'=>'tareq',
            'email'=>'tt@2.com',
            'password'=>Hash::make('wertyuiop'),
            'role'=>'admin'
          ]);
        }
    }
}
