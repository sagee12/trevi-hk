<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image',  'position', 'facebook', 'twitter', 'instagram', 'linkedin'];

    public function posts(){
      return  $this->hasMany(Post::class);
    }
    public function user(){
       return $this->belongsTo(User::class);
    }
}
