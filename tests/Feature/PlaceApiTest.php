<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Place;

class PlaceApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_places()
    {
        $response = $this->getJson('/api/places');

        $response->assertStatus(200)
            ->assertJsonCount(Place::count());
    }

    public function test_can_create_place()
    {
        $data = [
            'name' => 'Test Place',
            'slug' => 'test-place',
            'city' => 'Test City',
            'state' => 'Test State'
        ];

        $response = $this->postJson('/api/places', $data);

        $response->assertStatus(201)
            ->assertJson($data);
    }

    public function test_can_get_specific_place()
    {
        $place = Place::factory()->create();

        $response = $this->getJson('/api/places/' . $place->id);

        $response->assertStatus(200)
            ->assertJson($place->toArray());
    }

    public function test_can_update_place()
    {
        $place = Place::factory()->create();
        $newData = [
            'name' => 'Updated Place Name',
            'slug' => 'updated-slug',
            'city' => 'Updated City',
            'state' => 'Updated State'
        ];

        $response = $this->putJson('/api/places/' . $place->id, $newData);


        $response->assertStatus(200)
            ->assertJson($newData);
    }
    public function test_can_delete_place()
    {
        $place = Place::factory()->create();

        $response = $this->deleteJson('/api/places/' . $place->id);

        $response->assertStatus(204);
    }
}
