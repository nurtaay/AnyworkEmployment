<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Tournoment;
use App\Models\User;
use GuzzleHttp\Exception\TooManyRedirectsException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TournomentController extends Controller
{
    public function index(){
        $all = Tournoment::all();
        return view('adm.tournoments.index',['tours'=>$all]);
    }

    public function create(){
        return view('adm.tournoments.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'string|max:255',
            'content' => 'string|max:255',
        ]);

        $fillname = time().$request->file('image')->getClientOriginalName();
        $image_path = $request->file('image')->storeAs('tour', $fillname, 'public');
        $validated ['image'] = '/storage/'.$image_path;
        Tournoment::create($validated);
        return redirect()->route('adm.tournoments.index')->with('message', 'Added a new tournoment');
    }

    public function edit(Tournoment $tournoment){
        return view('adm.tournoments.edit', ['tours' => $tournoment]);
    }

    public function update(Request $request, $id){

        $avatar = Tournoment::find($id);
        $avatar->name = $request->input('name');
        $avatar->content = $request->input('content');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $fillname = time() . '.' .$ex;
            $file->move('storage/tours', $fillname);
            $avatar->image = $fillname;
        }

        $avatar->update();
        return redirect()->route('adm.tournoments.index', ['tours' => $avatar]);
    }

    public function destroy(Tournoment $tournoment){
        $tournoment->delete();
        return redirect()->route('adm.tournoments.index')->withErrors('Destroyed successfully');
    }

    public function show(){
    }
}
