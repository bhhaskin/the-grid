<?php

namespace App\Console\Commands\Secrets;

use Illuminate\Console\Command;
use App\Secret;

class Index extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secrets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List secrets';

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
        $header = ['id', 'label', 'notes', 'type', 'username', 'data', 'url',  'created_at', 'updated_at'];
        $secretsArray = array();
        $secrets = Secret::all($header);
        foreach ($secrets as $secret) {
            array_push($secretsArray, [
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
        }
        $this->table($header, $secretsArray);
    }
}
