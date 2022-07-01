<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use VCR\VCR;

class VCRTest extends TestCase
{
    /** @test */
    public function itShouldFetchTodos()
    {

        VCR::insertCassette('todos.yml');

        $todosResponse = Http::get('https://jsonplaceholder.typicode.com/todos');

        $this->assertCount(200, json_decode($todosResponse));
        VCR::eject();
    }
}
