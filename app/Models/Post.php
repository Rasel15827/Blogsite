<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $gurded = ['created_at', 'updated_at'];
    protected $fillable = ['title','slug','image','description','catagory_id', 'user_id'];

    protected $dates = [
        'published_at',
    ];

    public function catagory(){
        return $this->belongsTo('App\Models\Catagory');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
