<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Создание пользователя и авторизация через Sanctum
        $user = User::factory()->create();
        Sanctum::actingAs($user);
    }

    public function test_it_returns_a_list_of_tasks()
    {
        Task::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/tasks');

        $response->assertOk()
                 ->assertJsonCount(3);
    }

    public function test_it_creates_a_task()
    {
        $data = [
            'title' => 'Test task',
            'description' => 'Test description',
            'status' => 'pending',
        ];

        $response = $this->postJson('/api/v1/tasks', $data);

        $response->assertCreated()
                 ->assertJsonFragment($data);

        $this->assertDatabaseHas('tasks', $data);
    }

    public function test_it_shows_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->getJson("/api/v1/tasks/{$task->id}");

        $response->assertOk()
                 ->assertJson([
                     'id' => $task->id,
                     'title' => $task->title,
                     'description' => $task->description,
                     'status' => $task->status,
                 ]);
    }

    public function test_it_updates_a_task()
    {
        $task = Task::factory()->create();

        $update = [
            'title' => 'Updated title',
            'description' => 'Updated description',
            'status' => 'completed',
        ];

        $response = $this->putJson("/api/v1/tasks/{$task->id}", $update);

        $response->assertOk()
                 ->assertJsonFragment($update);

        $this->assertDatabaseHas('tasks', $update);
    }

    public function test_it_deletes_a_task()
    {
        $task = Task::factory()->create();

        $response = $this->deleteJson("/api/v1/tasks/{$task->id}");

        $response->assertNoContent();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }
}
