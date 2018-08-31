<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Secret;

class ListSecret extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'secret:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lists secret';

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
        $header = ['id', 'created_at', 'updated_at'];
        $secrets = Secret::all(['id', 'created_at', 'updated_at'])->toArray();
        $this->table($header, $secrets);
    }
}
