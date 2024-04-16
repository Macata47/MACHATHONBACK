<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use App\Models\Bootcamp;
use App\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /** @test */
    public function it_can_create_a_user_with_coder_role()
    {
        // ID del rol "coder"
        $coderRoleId = Role::where('role', 'coder')->value('id');

        // Crear un usuario con el rol "coder"
        $user = User::factory()->create([
            'role_id' => $coderRoleId,
        ]);

        // Verificar que el usuario se haya creado correctamente
        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'role_id' => $coderRoleId, // Asegúrate de que este ID exista en la base de datos
            'bootcamp_id' => $user->bootcamp_id,
            'active' => $user->active,
        ]);
    }

    /** @test */
    public function it_has_bootcamp_relationship()
    {
        $user = User::factory()->create();
        $this->assertInstanceOf(Bootcamp::class, $user->bootcamp);
    }

    // Agrega más pruebas para otras relaciones según sea necesario
}
