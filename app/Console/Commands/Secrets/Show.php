<?php

namespace App\Console\Commands\Secrets;

use Illuminate\Console\Command;
use App\Secret;

class Show extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:show {uuid?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show secret by uuid';

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
            $header = ['id', 'label', 'notes', 'type', 'username', 'data', 'url',  'created_at', 'updated_at'];
            $secret = Secret::where('id', '=', $uuid)->firstOrFail();
            $secretArray = array();

            array_push($secretArray, [
                'id' => $secret->id,
                'label' => $secret->label,
                'notes' => $secret->notes,
                'type' => $secret->type,
                'username' => $secret->username,
                'data' => $secret->data,
                'url' => $secret->url,
                'created_at' => $secret->created_at,
                'updated_at' => $secret->updated_at,
            ]);

            $this->table($header, $secretArray);

        } else {
            $this->error("uuid is required");
        }

    }
}
