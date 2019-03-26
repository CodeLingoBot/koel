<?php

namespace App\Observers;

use App\Models\Song;
use App\Services\HelperService;

class SongObserver
{
    private $helperService;

    public function __construct(HelperService $helperService)
    {
        $this->helperService = $helperService;
    }

    public function creating(Song $song): void
    {
        $this->setFileHashAsId($song);
    }

    
}
