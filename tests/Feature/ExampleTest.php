<?php

namespace Tests\Feature;

use App\BatchTrigger;
use App\Events\BatchedJobEvent;
use App\Events\JobThreeEvent;
use App\Events\JobTwoEvent;
use App\Jobs\BatchedJob;
use App\Jobs\JobThree;
use App\Jobs\JobTwo;
use App\Jobs\NonBatchedJob;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        Bus::fake(NonBatchedJob::class);
        Event::fake();

        Bus::batch([
            new BatchedJob(),
        ])
            ->dispatch();

        Event::assertDispatched(BatchedJobEvent::class);
    }
}
