<?php

namespace App\Models;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use SoftDeletes;
    protected $fillable = ['titre','body','image','profile_id'];
    public function profile(){
        return $this->belongsTo(Profile::class);
    }
}
