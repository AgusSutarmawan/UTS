<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $team=Team::where('team','LIKE','%'.$request->search.'%')->get();
        }else{
            $team=Team::all();
        }

        $title="Teams";
        return view ('admin.team',compact('title','team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title="Input Data Player";
        return view ('admin.inputteam',compact('title'));
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
            'team'=>'required',
        ],$message);
        $validasi['user_id']=Auth::id();
        Team::create($validasi);
        return redirect('team')->with('Success', 'data saved successfully');
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

        $team=Team::find($id);
        $title="Edit Team";
        return view ('admin.inputteam',compact('title','team'));
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
            'team'=>'required',
        ],$message);
        $validasi['id']=Auth::id();
        Team::where('id',$id)->update($validasi);
        return redirect('team')->with('Success', 'data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team=Team::find($id);
        Team::where('id',$id)->delete();
        return redirect('team')->with('Success', 'data deleted successfully');
    }
}
