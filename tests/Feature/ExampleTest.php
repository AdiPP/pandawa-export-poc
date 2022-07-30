<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testExportProduct(): void
    {
        $response = $this->get('/api/v1/export-products');

        $response->assertDownload('products.csv');
        $response->assertStatus(200);
    }
}
