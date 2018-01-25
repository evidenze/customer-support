<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = "tickets";

    protected $fillable = [
        'description','subject','status','priority','department','ticket_id',
    ];
}
