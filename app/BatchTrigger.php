<?php

namespace App;

use App\Jobs\JobOne;
use App\Jobs\JobThree;
use App\Jobs\JobTwo;
use Illuminate\Support\Facades\Bus;

class BatchTrigger
{
    public function trigger()
    {
        Bus::batch([
            (new JobOne()),
            (new JobTwo()),
            (new JobThree())
        ])
            ->dispatch();
    }
}
