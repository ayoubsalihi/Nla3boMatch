<?php

namespace Database\Seeders\Users;

use App\Models\Users\Admin;
use Database\Factories\Users\AdminFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::fatory()->count(10)->create();
    }
}
