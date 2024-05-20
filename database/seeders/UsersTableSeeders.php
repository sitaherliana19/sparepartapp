<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;


class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed users
        $this->seedUsers();

        // Seed admins
        $this->seedAdmins();
    }

        private function seedUsers(): void
        {
            User::create([
                'name' => 'Lia',
                'email' => 'email5@gmail.com',
                'password' => Hash::make('sita199'),
                'alamat' => 'Madiun',
                'nomor_handphone' => '08123456789',
                'role' => 'user',
            ]);
        }
        private function seedAdmins(): void
        {
            User::create([ 
                'name' => 'ana',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin11'),
                'alamat'=> 'Madiun21',
                'nomor_handphone' => '0895367053631',
                'role' => 'admin',
            ]);
    
        }

        
}
