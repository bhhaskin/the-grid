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
    protected $signature = 'user:create {name?} {email?} {password?}';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        if (empty($name)) {
            $name = $this->ask('What is the user name?');
        }


        if (empty($email)) {
            $email = $this->ask('What is the user email?');
        }

        if (empty($password)) {
            $password = $this->secret('What is the password?');
        }

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
