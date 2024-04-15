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
        // Creamos una nueva instancia del modelo Backendtechnology
        $backendTechnology = Backendtechnology::factory()->create([
            'backendtechnology' => 'Laravel',
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertDatabaseHas('backendtechnologies', [
            'backendtechnology' => 'Laravel',
        ]);
    }

    // Agrega más pruebas según sea necesario
}
