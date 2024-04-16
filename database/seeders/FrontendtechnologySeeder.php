<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Frontendtechnology;
use Carbon\Carbon;

class FrontendtechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $now = Carbon::now();

        Frontendtechnology::create(['frontendtechnology' => 'React', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Angular', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Vue.js', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Ember.js', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Backbone.js', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Svelte', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Bootstrap', 'created_at' => $now, 'updated_at' => $now]);
        Frontendtechnology::create(['frontendtechnology' => 'Foundation', 'created_at' => $now, 'updated_at' => $now]);
    }
    }


