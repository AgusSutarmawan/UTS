<?php

namespace App\Http\Controllers;

use App\Models\Barca;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $barca=Barca::where('name','LIKE','%'.$request->search.'%')->get();
        }else{
            $barca=Barca::all();
        }
        $title="FC Barcelona";
        return view ('admin.barca',compact('title','barca'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::all();

        return view ('admin.inputbarca',compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required'=> 'Field :attribute must be completed!',
            'date'    => 'Field :attribute must be Date!',
            'numeric' => 'Field :attribute must be Angka!',
        ];
        $validasi=$request->validate([
            'name'=>'required|unique:players|max:255',
            'nationality'=>'required',
            'team'=>'required',
            'position'=>'required',
            'age'=>'required',
        ],$message);
        $validasi['user_id']=Auth::id();
        Barca::create($validasi);
        return redirect('barca')->with('Success', 'data saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team=Team::all();
        $barca=Barca::find($id);
        $title="Edit Data Player";
        return view ('admin.inputbarca',compact('title','barca','team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $message=[
            'required'=> 'Field :attribute must be completed!',
            'date'    => 'Field :attribute must be Date!',
            'numeric' => 'Field :attribute must be Angka!',
        ];
        $validasi=$request->validate([
            'name'=>'required|max:255',
            'nationality'=>'required',
            'team'=>'required',
            'position'=>'required',
            'age'=>'required',
        ],$message);
        $validasi['user_id']=Auth::id();
        Barca::where('id',$id)->update($validasi);
        return redirect('barca')->with('Success', 'data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barca=Barca::find($id);
        Barca::where('id',$id)->delete();
        return redirect('barca')->with('Success', 'data deleted successfully');
    }
}
