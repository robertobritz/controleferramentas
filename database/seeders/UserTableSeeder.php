<?php

namespace Database\Seeders;

use App\Models\Machine;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Roberto',
            'email' => 'roberto.britz@hotmail.com',
            'password' => bcrypt('123456'),
        ]);

        Machine::create([
            'name' => 'Máquina 01',
            'description' => 'Máquina Mortal',
            'positions_magazine' => 10,
        ]);

        Machine::create([
            'name' => 'Máquina 02',
            'description' => 'Máquina Mortal2',
            'positions_magazine' => 20,
        ]);

        Tool::create([
            'description' => 'Ferramenta 01',
            'code_system' => '0001',
            'supplier' => 'Zé da esquina',
        ]);
    }
}
