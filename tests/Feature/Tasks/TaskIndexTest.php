<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests tasks index
     *
     */
    public function test_tasks_index(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get('/tasks')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Tasks/Index')
                ->has('tasks')
            );
    }
}
