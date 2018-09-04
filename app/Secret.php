<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\{Encryptable, Uuids};

class Secret extends Model
{

    public $incrementing = false;

    use Encryptable;
    use Uuids;

    protected $fillable = [
        'label',
        'notes',
        'type',
        'username',
        'data',
        'url',
    ];

    protected $encryptable = [
        'data',
    ];
}
