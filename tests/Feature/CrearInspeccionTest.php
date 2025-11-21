<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Inspeccion;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CrearInspeccionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_autenticado_puede_crear_inspeccion()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/inspecciones', [
            'direccion' => 'San Martín 200',
            'estado' => 'Pendiente'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('inspecciones', [
            'direccion' => 'San Martín 200'
        ]);
    }
}
//Test de Integración – Registro de inspección