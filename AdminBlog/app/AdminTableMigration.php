<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminTableMigration extends Model
{
    public $table = 'admin_table';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = 'false';
}
