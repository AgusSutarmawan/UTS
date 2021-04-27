<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $player=Player::where('name','LIKE','%'.$request->search.'%')->get();
        }else{
            $player=Player::all();
        }
        $title="Real Madrid";
        return view ('admin.player',compact('title','player'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $team = Team::all();

        return view ('admin.inputplayer',compact ('team'));

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
        Player::create($validasi);
        return redirect('player')->with('Success', 'data saved successfully');
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
        $team = Team::all();
        $player=Player::find($id);
        $title="Edit Data Player";
        return view ('admin.inputplayer',compact('title','player','team'));
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
        Player::where('id',$id)->update($validasi);
        return redirect('player')->with('Success', 'data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $player=Player::find($id);
        Player::where('id',$id)->delete();
        return redirect('player')->with('Success', 'data deleted successfully');
    }
}
