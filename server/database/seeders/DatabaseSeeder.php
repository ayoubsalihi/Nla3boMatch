<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Teams\TeamChatSeeder;
use Database\Seeders\Teams\TeamSeeder;
use Database\Seeders\Terrains\AcademySeeder;
use Database\Seeders\Terrains\ReservationSeeder;
use Database\Seeders\Terrains\TerrainSeeder;
use Database\Seeders\Users\AdminSeeder;
use Database\Seeders\Users\ChatSeeder;
use Database\Seeders\Users\FriendshipSeeder;
use Database\Seeders\Users\GoalkeeperSeeder;
use Database\Seeders\Users\InsidePlayerSeeder;
use Database\Seeders\Users\MessageSeeder;
use Database\Seeders\Users\PlayerSeeder;
use Database\Seeders\Users\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * The seeders would be called in order by folders structure
         * Users
         * Terrains
         * Teams
         * Competitions
         * Posts
         */
        $this->call([
            UserSeeder::class,
            PlayerSeeder::class,
            MessageSeeder::class,
            InsidePlayerSeeder::class,
            GoalkeeperSeeder::class,
            FriendshipSeeder::class,
            ChatSeeder::class,
            AdminSeeder::class,
        ]);

        $this->call([
            TerrainSeeder::class,
            ReservationSeeder::class,
            AcademySeeder::class,
        ]);

        $this->call([
            TeamChatSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
