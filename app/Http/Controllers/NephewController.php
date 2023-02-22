<?php

namespace App\Http\Controllers;

use App\Models\Humans;
use App\Models\Nephews;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NephewController extends Controller{
    public $manName   = 'man-default.jpg';
    public $womanName = 'woman-default.jpg';

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $uncles = Humans::where('user_id', Auth::user()->id)->whereIn('id', Nephews::select('humans_id')->get())->get();

        return view('nephew.index', compact('uncles'));
    }

    public function create(){
        $uncles = Humans::where('user_id', Auth::user()->id)->get();
        return view('nephew.create', compact('uncles'));
    }

    public function store(Request $request){
        $cek = Nephews::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        if($request->hasFile('image')){
            $file      = $request->file('image');
            $photoName = $cek->id+1 . Carbon::now()->year.Carbon::now()->month.Carbon::now()->day.'_nep_'.$file->getClientOriginalName();
            $file->move('images/', $photoName);
        }else{
            $photoName = ($request->gender == 1 ? $photoName = $this->manName : $photoName = $this->womanName);
        }

        Nephews::create([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'birthday'  => $request->date,
            'humans_id' => $request->parent,
            'image'     => $photoName,
            'user_id'   => Auth::user()->id
        ]);

        return redirect()->route('keponakan.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id){
        $data    = Nephews::findorfail($id);
        $parents = Humans::where('user_id', Auth::user()->id)->get();
        $mahram  = Humans::where('humans_id', $data->humans_id)->get();

        return view('nephew.edit', compact('data', 'parents', 'mahram'));
    }

    public function update(Request $request, $id){
        if($request->hasFile('image')){
            $file      = $request->file('image');
            $photoName = $id.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day.'_nep_'.$file->getClientOriginalName();
            $file->move('images/', $photoName);
            Nephews::whereId($id)->update(['image' => $photoName]);
        }

        Nephews::whereId($id)->update([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'birthday'  => $request->date,
            'humans_id' => $request->parent
        ]);

        return redirect()->route('keponakan.index');
    }

    public function destroy($id){
        $person = Nephews::findorfail($id);

        if($person->image != $this->manName && $person->image != $this->womanName){
            File::delete('images/'.$person->image);
        }
        
        $person->delete();

        return redirect()->route('keponakan.index');
    }
}
