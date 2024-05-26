<?php

namespace Tests\Feature;

use App\Enums\Status;
use App\Models\User;
use Tests\TestCase;
use Carbon\Carbon;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskDeleteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test creating a task
     *
     */
    public function test_tasks_delete(): void
    {
        $this->actingAs($user = User::factory()->create());

        $this->assertEmpty($user->tasks);
        
        $this->post(route('tasks.add'), [
            'title' => 'Title1',
            'description' => 'Description',
            'status' => Status::PENDING,
            'due_date' => Carbon::now(),
            'user_id' => $user->id,
        ]);
        
        $this->assertNotEmpty($user->fresh()->tasks);

        $this->delete(route('tasks.add', $user->fresh()->tasks[0]->id));

        $this->assertEmpty($user->tasks);
    }
}
