<?php

namespace Tests\Feature;

use App\BatchTrigger;
use App\Events\JobOneEvent;
use App\Events\JobThreeEvent;
use App\Events\JobTwoEvent;
use App\Jobs\JobOne;
use App\Jobs\JobThree;
use App\Jobs\JobTwo;
use App\Jobs\UnrelatedJob;
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
        Bus::fake(UnrelatedJob::class);
        Event::fake();

        Bus::batch([
            new JobOne(),
        ])
            ->dispatch();

        Event::assertDispatched(JobOneEvent::class);
    }
}
