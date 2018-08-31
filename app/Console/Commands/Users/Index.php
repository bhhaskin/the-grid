<?php

namespace App\Console\Commands\Users;

use Illuminate\Console\Command;
use App\User;

class Index extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List users';

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
        $header = ['id', 'name', 'email', 'created_at', 'updated_at'];
        $users = User::all($header)->toArray();
        $this->table($header, $users);
    }
}
