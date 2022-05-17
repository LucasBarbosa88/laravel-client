<?php

use App\User;
use Artesaos\Defender\Facades\Defender;
use Illuminate\Database\Seeder;
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
        $roleAdmin = Defender::createRole('admin');
        
        // Admin
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.dev',
            'password' => Hash::make('admin123'),
        ]);

        $admin->attachRole($roleAdmin);
    }
}
