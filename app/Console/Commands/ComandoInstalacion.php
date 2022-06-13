<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ComandoInstalacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'instalacion:alvaro';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando instala todo lo necesario del proyecto';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this::call('key:generate');
        $this::call('storage:link');
        $this::call('stub:publish');
        $this::call('vendor:publish');
        $this::call('vendor:publish --tag=jetstream-views');
        $this::call('migrate');
        $this::call('db::seed');
    }
}
