<?php

namespace App\Console\Commands\Secrets;

use Illuminate\Console\Command;
use App\Secret;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:create {label?} {notes?} {type?} {username?} {data?} {url?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new secret';

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

        $label = $this->argument('label');
        $notes = $this->argument('notes');
        $type = $this->argument('type');
        $username = $this->argument('username');
        $data = $this->argument('data');
        $url = $this->argument('url');

        if (empty($label)) {
            $label = $this->ask('What is the secret label?');
        }


        if (empty($notes)) {
            $notes = $this->ask('What is the secret note?');
        }


        if (empty($type)) {
            $type = $this->choice('What is the secret type?', ['credential', 'secret'], 1);
        }

        if (empty($username)) {
            $username = $this->ask('What is the secret username?');
        }

        if (empty($data)) {
            $data = $this->secret('What is the secret?');
        }

        if (empty($url)) {
            $url = $this->ask('What is the secret url?');
        }

        Secret::create([
            'label' => $label,
            'notes' => $notes,
            'type' => $type,
            'username' => $username,
            'data' => $data,
            'url' => $url,
        ]);

        $this->info("Secret created");
    }
}
