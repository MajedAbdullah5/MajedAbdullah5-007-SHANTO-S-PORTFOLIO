<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education_model extends Model
{
    public $table =  'education';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
