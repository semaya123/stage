<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends User
{

    use HasFactory;
    use SoftDeletes;
    protected $date = ['created_at'];
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image',
    ];

    public function getRouteKeyName(){
        return 'id';
    } 
    
    protected $table = 'profiles';
    public function publications(){
      return $this->hasMany(Publication::class);  
    }
}
