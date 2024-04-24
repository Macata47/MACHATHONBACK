<?php

namespace Tests\Unit;

use App\Models\Frontendtechnology;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontendtechnologyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_frontend_technology()
    {
        
        $frontendTechnology = Frontendtechnology::factory()->create([
            'frontendtechnology' => 'React', 
            
        ]);

        
        $this->assertEquals('React', $frontendTechnology->frontendtechnology); 
        
    }

    
}
