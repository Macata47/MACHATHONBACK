<?php

namespace Tests\Unit\Models;

use App\Models\Backendtechnology;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BackendtechnologyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_backend_technology()
    {
       
        $backendTechnology = Backendtechnology::factory()->create([
            'backendtechnology' => 'Laravel', 
            
        ]);

        
        $this->assertEquals('Laravel', $backendTechnology->backendtechnology); 
        
    }

    
}


