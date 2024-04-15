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
        // Creamos una nueva instancia del modelo Role
        $role = Role::factory()->create([
            'role' => 'Admin', // Cambia 'role' según tu estructura de datos
            // Agrega más atributos si es necesario
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('Admin', $role->role); // Cambia 'role' según tu estructura de datos
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Agrega más pruebas según sea necesario
}
