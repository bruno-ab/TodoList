<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name','description','date'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'task';

}
