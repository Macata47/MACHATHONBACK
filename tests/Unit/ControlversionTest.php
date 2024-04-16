<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions; 

use App\Models\Controlversion;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ControlversionTest extends TestCase
{
    //use RefreshDatabase;

    use DatabaseTransactions; 

    /** @test */
    public function it_can_create_a_control_version()
    {
        // Creamos una nueva instancia del modelo Controlversion
        $controlVersion = Controlversion::factory()->create([
            'controlversion' => 'Git', // Cambia 'controlversion' según tu estructura de datos
            // Agrega más atributos si es necesario
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('Git', $controlVersion->controlversion); // Cambia 'controlversion' según tu estructura de datos
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Agrega más pruebas según sea necesario
}
