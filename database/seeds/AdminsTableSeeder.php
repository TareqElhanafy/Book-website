<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Admin::where('email','t@2.com')->first();
        if (!$admin) {
          Admin::create([
            'name'=>'Admin',
            'email'=>'t@2.com',
            'password'=>Hash::make('wertyuiop'),
            
          ]);
        }
    }
}
