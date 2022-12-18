<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $allResumes= Resume::all();
        $user = User::all();
       return view('resume.indexresume',['resumes'=>$allResumes, 'users' => $user]);
    }


    public function create()
    {
        return view('resume.createresume');
    }


    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'profession'=>'required',
            'data'=>'required',
            'language'=>'required',
            'adress'=>'required',
            'hobbi'=>'required'
        ]);

        $fillname = time().$request->file('photo')->getClientOriginalName();
        $image_path = $request->file('photo')->storeAs('resume', $fillname, 'public');
        $validated ['photo'] = '/storage/'.$image_path;

        Auth::user()->resumes()->create($validated);
        return redirect()->route('resumes.index')->with('message',' РЕЗЮМЕ УСПЕШНО СОХРАНЕН !!!');
    }

    function show(Resume $resume)
    {
        return view('resume.showresume',['resume'=>$resume]);
    }

    public function edit(Resume $resume)
    {
        return view('resume.editresume',['resume'=>$resume]);
    }


    public function update(Request $request, Resume $resume)
    {
        $resume->update([
            'name'=>$request->input('name'),
            'surname'=>$request->input('surname'),
            'email'=>$request->input('email'),
            'profession'=>$request->input('profession'),
            'data'=>$request->input('data'),
            'language'=>$request->input('language'),
            'adress'=>$request->input('adress'),
            'hobbi'=>$request->input('hobbi'),
        ]);

        $fillname = time().$request->file('photo')->getClientOriginalName();
        $image_path = $request->file('photo')->storeAs('resume', $fillname, 'public');
        $validated ['photo'] = '/storage/'.$image_path;

        Auth::user()->resumes()->update($validated);

        return redirect()->route('resumes.index')->with('message','Резюме изменён!!!');

    }


    public function destroy(Resume $resume)
    {
        $resume->delete();
        return redirect()->route('resumes.index');
    }
}
