<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioPhotoModel extends Model
{
    public $table ='portfolio_photo';
    public $primaryKey ='id';
    public $incrementing = true;
    public $keyType ='int';
    public $timestamps ='false';
}
