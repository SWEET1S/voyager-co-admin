<?php

namespace Sweet1s\VoyagerCoAdmin\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'co-admin:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Co-Admin package';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $this->call('vendor:publish', [
            '--provider' => "Sweet1s\VoyagerCoAdmin\Providers\VoyagerCoAdminServiceProvider"
        ]);

        $this->call('co-admin:role-permission');

        $this->info('Voyager-Co-Admin installed successfully.');

        return CommandAlias::SUCCESS;
    }
}
