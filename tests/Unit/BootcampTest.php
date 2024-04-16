<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions; 

use App\Models\Bootcamp;
//use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BootcampTest extends TestCase
{
    //use RefreshDatabase;

    use DatabaseTransactions; 

    /** @test */
    public function it_can_create_a_bootcamp()
    {
        // Creamos una nueva instancia del modelo Bootcamp
        $bootcamp = Bootcamp::factory()->create([
            'bootcamp' => 'Full Stack Developer', // Cambia 'bootcamp' según tu estructura de datos
            // Agrega más atributos si es necesario
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('Full Stack Developer', $bootcamp->bootcamp); // Cambia 'bootcamp' según tu estructura de datos
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Agrega más pruebas según sea necesario
}
