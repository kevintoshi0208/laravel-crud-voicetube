<?php

namespace Tests\Feature;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class TodoListTest extends TestCase
{
    /**
     * @before
     */
    public function setUp(): void
    {
        parent::setUp();
        $token=JWTAuth::fromUser(User::first());
        $this->withToken($token);
        $this->withHeader("Accept","application/json");
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $response = $this->postJson('/api/todoLists',[
            'title' => 'This is a test data',
            'content' => 'This is a test Content',
        ]);

        $response->assertStatus(201);

        $data = $response->json();

        $this->assertEquals(
            $data['title'] ,
            'This is a test data',
            'Failed to add title of TodoLists'
        );

        $this->assertEquals(
            $data['content'] ,
            'This is a test Content',
            'Failed to add content of TodoLists'
        );

        return $data['id'];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     *
     * @depends testAdd
     */
    public function testUpdate($id)
    {
        $response =  $this->putJson('/api/todoLists/'.$id,[
            'title' => 'This is a updated test data',
            'content' => 'This is a updated test Content',
        ]);

        $response->assertOk();

        $data = $response->json();

        $this->assertEquals(
            $data['title'] ,
            'This is a updated test data',
            'Failed to update title of TodoLists'
        );

        $this->assertEquals(
            $data['content'] ,
            'This is a updated test Content',
            'Failed to update content of TodoLists'
        );

        return $data['id'];
    }

    /**
     * A basic feature test example.
     *
     * @return void
     *
     * @depends testAdd
     */
    public function testShow($id)
    {
        $response =  $this->getJson('/api/todoLists/'.$id);

        $response->assertOk();

        $data = $response->json();

        $this->assertEquals(
            $data['title'] ,
            'This is a updated test data',
            'Failed to show title of TodoLists'
        );

        $this->assertEquals(
            $data['content'] ,
            'This is a updated test Content',
            'Failed to show content of TodoLists'
        );
        return $data['id'];
    }


    /**
     * A basic feature test example.
     *
     * @return void
     *
     * @depends testAdd
     */
    public function testList()
    {
        $response = $this->get('/api/todoLists');

        $response->assertStatus(200,'TodoList list failed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     *
     * @depends testUpdate
     */
    public function testDelete($id)
    {
        $response = $this->deleteJson('/api/todoLists/'.$id);

        $response->assertStatus(204,'TodoList deleted failed');
    }
}
