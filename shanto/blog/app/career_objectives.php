<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class career_objectives extends Model
{
    public $table =  'career_objectives';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
