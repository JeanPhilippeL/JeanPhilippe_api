<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeasureTest extends TestCase
{
    use DatabaseTransactions;

    public function testGetMeasureTest()
    {
        $response = $this->get('/api/stations/1/measure');
        $response->assertStatus(200);
    }


}
