<?php

namespace App\Http\Controllers;

use App\Models\Humans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller{
    public $manName   = 'man-default.jpg';
    public $womanName = 'woman-default.jpg';

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $one       = Humans::where('user_id', Auth::user()->id)->where('humans_id', null)->first();
        $relations = null;

        if($one != null){
            $relations = Humans::where('user_id', Auth::user()->id)->where('humans_id', $one->id)->get();
        }

        $setWidth = Humans::where('user_id', Auth::user()->id)->get();

        return view('home', compact('one', 'relations', 'setWidth'));
    }

    public function create(){
        $parents = Humans::where('user_id', Auth::user()->id)->get();

        return view('create', compact('parents'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'date' => 'required',
        ]);

        $cek = Humans::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();

        if($cek != null && $request->parent == null){
            return redirect()->back();
        }

        $level = $cek == null ? '1' : Humans::findorfail($request->parent)->level + 1;

        if($request->hasFile('image')){
            if($cek){
                $file      = $request->file('image');
                $photoName = $cek->id+1 .Carbon::now()->year.Carbon::now()->month.Carbon::now()->day.'_'.$file->getClientOriginalName();
                $file->move('images/', $photoName);
            }else{
                $file      = $request->file('image');
                $photoName = Carbon::now()->year.Carbon::now()->month.Carbon::now()->day.'_'.$file->getClientOriginalName();
                $file->move('images/', $photoName);
            }
        }else{
            $photoName = ($request->gender == 1 ? $photoName = $this->manName : $photoName = $this->womanName);
        }

        Humans::create([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'birthday'  => $request->date,
            'phone'     => $request->phone,
            'address'   => $request->address, 
            'humans_id' => $request->parent,
            'level'     => $level,
            'image'     => $photoName,
            'user_id'   => Auth::user()->id
        ]);

        return redirect()->route('dashboard.index');
    }

    public function edit($id){
        $data    = Humans::findorfail($id);
        $parents = Humans::where('user_id', Auth::user()->id)->get();
        $mahramOrtu = [];
        $mahramGran = [];
        $mahramOne  = [];

        if($data->humans_id != null){
            $mahramOrtu = Humans::where('user_id', Auth::user()->id)
                                ->where('id', '!=', $id)
                                ->where('gender', '!=', $data->gender)
                                ->where('humans_id', $data->humans_id)
                                ->get();

            if($data->level > 2){
                $parent     = Humans::findorfail($data->humans_id);
                $mahramGran = Humans::where('user_id', Auth::user()->id)
                                ->where('id', '!=', $parent->id)
                                ->where('humans_id', $parent->humans_id)
                                ->get();
            }
        }else{
            $mahramOne = Humans::where('user_id', Auth::user()->id)
                                ->where('humans_id', $data->id)
                                ->get();
        }

        if($data->gender == 1){
            $couple  = 'Istri';
            $upLevel = 'paman';
        }else{
            $couple  = 'Suami';
            $upLevel = 'bibi';
        }
        
        return view('edit', compact('data', 'parents', 'mahramOrtu', 'mahramGran', 'mahramOne', 'couple', 'upLevel'));
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'gender' => 'required',
            'date' => 'required',
        ]);
        if($request->hasFile('image')){
            $file      = $request->file('image');
            $photoName = $id.Carbon::now()->year.Carbon::now()->month.Carbon::now()->day.'_'.$file->getClientOriginalName();
            $file->move('images/', $photoName);
            Humans::whereId($id)->update(['image' => $photoName]);
        }

        $cek = Humans::findorfail($id);

        $level = $cek->humans_id == null ? '1' : Humans::findorfail($cek->humans_id)->level + 1;

        Humans::whereId($id)->update([
            'name'      => $request->name,
            'gender'    => $request->gender,
            'birthday'  => $request->date,
            'phone'     => $request->phone,
            'address'   => $request->address, 
            'humans_id' => $request->parent,
            'level'     => $level
        ]);
        
        if($cek->image == $this->manName && $request->gender == 2){
            Humans::whereId($id)->update(['image' => $this->womanName]);
        }else if($cek->image == $this->womanName && $request->gender == 1){
            Humans::whereId($id)->update(['image' => $this->manName]);
        }

        return redirect()->route('dashboard.index');
    }

    public function destroy($id){
        $this->looper($id);

        $person = Humans::findorfail($id);

        if($person->image != $this->manName && $person->image != $this->womanName){
            File::delete('images/'.$person->image);
        }
        
        $person->delete();

        return redirect()->route('dashboard.index');
    }

    public function looper($id){
        $datas = Humans::where('humans_id', $id)->get();

        foreach($datas as $data){
            $this->looper($data->id);

            if($data->image != $this->manName && $data->image != $this->womanName){
                File::delete('images/'.$data->image);
            }
            
            $data->delete();
        }
    }

    public function search(Request $request){
        $one       = Humans::where('user_id', Auth::user()->id)->where('name', 'LIKE', '%'.$request->search.'%')->first();
        $relations = null;

        if($one != null){
            $relations = Humans::where('user_id', Auth::user()->id)->where('humans_id', $one->id)->get();
        }

        $setWidth = Humans::where('user_id', Auth::user()->id)->get();

        return view('dashboard', compact('one', 'relations', 'setWidth'));
    }
}
