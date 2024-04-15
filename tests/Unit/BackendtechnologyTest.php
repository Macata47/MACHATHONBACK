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
            'backendtechnology' => 'Laravel', // Cambiar de 'name' a 'backendtechnology'
            // No incluimos la columna 'version' en esta prueba
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('Laravel', $backendTechnology->backendtechnology); // Cambiar a 'backendtechnology'
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Puedes agregar más pruebas según sea necesario para cubrir otros métodos y casos de uso del modelo Backendtechnology.
}


