<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call( SalarioSeeder::class);
        $this->call( CategoriaSeeder::class);
        $this->call( RolesSeeder::class);
        $this->call( AdminSeeder::class);
        $this->call( DepartamentoSeeder::class);
        $this->call( PlanSeeder::class);
    }
}
