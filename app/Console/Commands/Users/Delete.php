<?php

namespace App\Console\Commands\Users;

use Illuminate\Console\Command;
use App\User;

class Delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:delete {uuid?} {--y}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deletes a user';

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
            $uuid = $this->ask('What is the user uuid?');
        }

        $user = User::where('id', '=', $uuid)->firstOrFail();

        if ($this->option('y') != null || $this->confirm('Are you sure you want to delete this user? This cannot be undone.')) {
            $user->delete();
            $this->info("User deleted.");
        } else {
            $this->error("Operation Aborted.");
        }

    }
}
