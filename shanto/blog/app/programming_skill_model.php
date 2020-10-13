<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class programming_skill_model extends Model
{
    public $table =  'programming_skills';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
