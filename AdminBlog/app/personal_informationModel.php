<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personal_informationModel extends Model
{
    public $table =  'personal_infomation';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
