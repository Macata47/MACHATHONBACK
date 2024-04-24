<?php

namespace Tests\Unit;

use App\Models\Bootcamp;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BootcampTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_bootcamp()
    {
        
        $bootcamp = Bootcamp::factory()->create([
            'bootcamp' => 'Full Stack Developer', 
            
        ]);

        
        $this->assertEquals('Full Stack Developer', $bootcamp->bootcamp); 
        
    }

    
}
