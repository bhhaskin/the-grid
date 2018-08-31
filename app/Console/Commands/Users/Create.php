<?php

namespace App\Console\Commands\Users;

use Illuminate\Console\Command;
use App\User;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {secret?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new user';

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
        // $data = $this->argument('user');
        // if (empty($data)) {
        //     $data = $this->secret('What is the user');
        // }

        // Secret::create(['data' => $data]);
    }
}
