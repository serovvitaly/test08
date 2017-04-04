<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StartApp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'startapp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Развертывание приложения';

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
        $driver = config('database.default');
        $schema = config("database.connections.{$driver}.database");

        $this->info('Creating databse ' . $schema);

        try {
            \DB::connection()->statement("CREATE DATABASE $schema");
        } catch (\Illuminate\Database\QueryException $e) {
            //
        }


        $this->info('Run migrations...');
        \Artisan::call('migrate');

        $this->info('Run seeds...');
        \Artisan::call('db:seed');

        $this->info('Done!');
    }
}
