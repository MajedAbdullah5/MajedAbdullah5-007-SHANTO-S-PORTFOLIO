<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class emergency_contact extends Model
{
    public $table =  'emergency_contact';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
