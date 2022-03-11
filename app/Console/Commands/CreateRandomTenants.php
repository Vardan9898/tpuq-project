<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;

class CreateRandomTenants extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:tenants {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will generate random tenants';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Tenant $tenant)
    {
        $tenant::factory()->count($this->argument('count'))->create();

        $this->info('Tenants created');
    }
}
