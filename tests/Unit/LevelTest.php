<?php

namespace Tests\Unit;

use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LevelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_level()
    {
        
        $level = Level::factory()->create([
            'level' => 'Intermediate', 
            
        ]);

        
        $this->assertEquals('Intermediate', $level->level); 
        
    }

    
}
