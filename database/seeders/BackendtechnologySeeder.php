<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backendtechnology;
use Carbon\Carbon;

class BackendtechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $now = Carbon::now();

        Backendtechnology::create(['backendtechnology' => 'Laravel', 'created_at' => $now, 'updated_at' => $now]);
        Backendtechnology::create(['backendtechnology' => 'Node.js', 'created_at' => $now, 'updated_at' => $now]);
        Backendtechnology::create(['backendtechnology' => 'Django', 'created_at' => $now, 'updated_at' => $now]);
        Backendtechnology::create(['backendtechnology' => 'Spring', 'created_at' => $now, 'updated_at' => $now]);
    }
    }


