<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\Resume;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ResumePolicy
{
    use HandlesAuthorization;

    public function resView(){
        return(Auth::user()->resumes);
    }
}
