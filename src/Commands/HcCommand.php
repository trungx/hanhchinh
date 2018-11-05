<?php

namespace HanhChinh\HanhChinh\Commands;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Command;

class HcCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hc:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrate hanhchinh vietnam';

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
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Do you want to install it?', true)) {
            Artisan::call('vendor:publish',['--tag' => 'migrations']);
            Artisan::call('vendor:publish',['--tag' => 'seeds']);
            Artisan::call('migrate');
            exec('composer dump-autoload'); 
            Artisan::call('db:seed', ['--class' => 'RegionsTable']);
            $this->info('Installed successfully!');
        }
    }
    protected function displayOutput()
    {
        $message = "xx";
        $this->line($message);
    }
}
