<?php

namespace App\Observers;

use App\Models\Album;
use Exception;
use Illuminate\Log\Logger;

class AlbumObserver
{
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function deleted(Album $album): void
    {
        $this->deleteAlbumCover($album);
    }

    
}
