<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class language_model extends Model
{
    public $table =  'language';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
