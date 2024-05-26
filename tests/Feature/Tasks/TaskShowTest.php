<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskShowTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Tests tasks index
     *
     */
    public function test_tasks_show(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get('/tasks/show')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Tasks/Show')
            );
    }
}
