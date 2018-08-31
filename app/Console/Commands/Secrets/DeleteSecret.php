<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Secret;

class DeleteSecret extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:delete {uuid?} {--y}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a secret';

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
        $uuid = $this->argument('uuid');
        if (empty($uuid)) {
            $uuid = $this->ask('What is the secret uuid?');
        }

        $secret = Secret::where('id', '=', $uuid)->firstOrFail();

        if ($this->option('y') != null || $this->confirm('Are you sure you want to delete this secret? This cannot be undone.')) {
            $secret->delete();
            $this->info("Secret deleted.");
        } else {
            $this->error("Operation Aborted.");
        }

    }
}
