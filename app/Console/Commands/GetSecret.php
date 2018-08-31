<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Secret;

class GetSecret extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:get {uuid?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get secret by uuid';

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

        if (!empty($uuid)) {
            $secret = Secret::where('id', '=', $uuid)->firstOrFail();
            $this->info($secret->data);

        } else {
            $this->error("uuid is required");
        }

    }
}
