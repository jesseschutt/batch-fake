<?php

namespace App;

use App\Jobs\BatchedJob;
use App\Jobs\JobThree;
use App\Jobs\JobTwo;
use Illuminate\Support\Facades\Bus;

class BatchTrigger
{
    public function trigger()
    {
        Bus::batch([
            (new BatchedJob()),
            (new JobTwo()),
            (new JobThree())
        ])
            ->dispatch();
    }
}
