<?php

namespace Tests\Unit;

use App\Models\Controlversion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ControlversionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_control_version()
    {
        $controlVersion = Controlversion::factory()->create([
            'controlversion' => 'Git', 
            
        ]);

        
        $this->assertEquals('Git', $controlVersion->controlversion); 
        
    }

    
}
