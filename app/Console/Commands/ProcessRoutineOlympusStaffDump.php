<?php

namespace App\Console\Commands;

use App\Services\Dumps\EcmService;
use App\Services\Dumps\OlympusStaffDetailsService;
use Illuminate\Console\Command;

class ProcessRoutineOlympusStaffDump extends Command
{
    protected $signature = 'process-olympus-staff-dump';

    protected $description = 'Upload olympus staff dump and update olympus_staff_dump table.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected OlympusStaffDetailsService $olympusStaffDetailsService)
    {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->olympusStaffDetailsService->processRoutineOlympusStaffDetailsDump();
    }
}