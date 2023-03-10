<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $fillable=['photo','name','surname','email','profession','data','language','adress','hobbi'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function resumePost()
    {
        return $this->belongsToMany(Post::class,'resume_vacancies')
            ->withTimestamps();
    }
}
