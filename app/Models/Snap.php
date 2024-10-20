<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Snap extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'snaps';
    protected $guarded = ['created_at', 'updated_at'];
    protected $timestaps = false;
}
