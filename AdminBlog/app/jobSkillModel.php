<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobSkillModel extends Model
{
    public $table = 'job_skill';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
