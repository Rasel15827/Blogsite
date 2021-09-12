<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $gurded = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = ['name','slug','description'];
}
