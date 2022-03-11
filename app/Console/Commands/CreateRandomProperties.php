<?php

namespace App\Console\Commands;

use App\Models\Property;
use Database\Factories\UserFactory;
use Illuminate\Console\Command;

class CreateRandomProperties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:properties {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will generate random properties';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Property $property)
    {
        $property::factory()->count($this->argument('count'))->create();

        $this->info('Properties created');
    }
}
