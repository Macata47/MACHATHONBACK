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
        // Creamos una nueva instancia del modelo Level
        $level = Level::factory()->create([
            'level' => 'Intermediate', // Cambia 'level' según tu estructura de datos
            // Agrega más atributos si es necesario
        ]);

        // Verificamos que se haya creado correctamente
        $this->assertEquals('Intermediate', $level->level); // Cambia 'level' según tu estructura de datos
        // Puedes agregar más afirmaciones según sea necesario
    }

    // Agrega más pruebas según sea necesario
}
