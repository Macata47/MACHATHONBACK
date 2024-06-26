<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       
        $this->call([
            RoleSeeder::class,
            BootcampSeeder::class,
            BackendtechnologySeeder::class,
            FrontendtechnologySeeder::class,
            ControlversionSeeder::class,
            LevelSeeder::class,
            UserSeeder::class,
            UserBackendtechLevelSeeder::class,
            UserFrontendtechLevelSeeder::class,
            UserControlversionLevelSeeder::class,
            

        ]);

    }
}
