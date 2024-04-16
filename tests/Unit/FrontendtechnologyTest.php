<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions; 

use App\Models\Frontendtechnology;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FrontendtechnologyTest extends TestCase
{
    //use RefreshDatabase;

    use DatabaseTransactions; 

    /** @test */
    public function it_can_create_a_frontend_technology()
    {
        // Creamos una nueva instancia del modelo Frontendtechnology
        $frontendTechnology = Frontendtechnology::factory()->create([
            'frontendtechnology' => 'React', // Cambia 'frontendtechnology' según tu estructura de datos
            // Agrega más atributos si es necesario
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('React', $frontendTechnology->frontendtechnology); // Cambia 'frontendtechnology' según tu estructura de datos
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Agrega más pruebas según sea necesario
}
