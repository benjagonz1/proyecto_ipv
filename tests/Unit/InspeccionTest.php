<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Inspeccion;

class InspeccionTest extends TestCase
{
    /** @test */
    public function puede_crear_una_inspeccion()
    {
        $inspeccion = Inspeccion::factory()->create([
            'direccion' => 'Av. Italia 123',
        ]);

        $this->assertDatabaseHas('inspecciones', [
            'direccion' => 'Av. Italia 123'
        ]);
    }
}
//Test Unitario – Modelo Inspección