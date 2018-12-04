<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class DbCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create';

    protected $description = 'Creates DB';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $config = App::make('config');
        $connections = $config->get('database.connections');
        $defaultConnection = $connections[$config->get('database.default')];
        $newConnection = $defaultConnection;
        $newConnection['database'] = '';
        App::make('config')->set('database.connections.init', $newConnection);
        DB::connection('init')->statement('CREATE DATABASE IF NOT EXISTS ?');
        $this->call('migrate');
    }
}
