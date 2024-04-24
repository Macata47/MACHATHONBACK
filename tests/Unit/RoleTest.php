<?php

namespace Tests\Unit;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_role()
    {
        
        $role = Role::factory()->create([
            'role' => 'Admin', 
            
        ]);

       
        $this->assertEquals('Admin', $role->role); 
        
    }

    
}
