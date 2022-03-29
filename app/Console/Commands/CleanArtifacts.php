<?php

namespace App\Console\Commands;

use App\Http\Services\OffersCleanerService;
use Illuminate\Console\Command;

class CleanArtifacts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clean:artifacts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean title and description artifacts from Offers';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(OffersCleanerService $offersCleanerService)
    {
        $offersCleanerService->processArtifacts();
        return 0;
    }
}
