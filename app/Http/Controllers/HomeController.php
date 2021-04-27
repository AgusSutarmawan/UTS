<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title="Data Mahasiswa";
        $data["mahasiswa"]=array(
            'nim'=>'1915101016',
            'nama'=>'Agus Sutarmawan');
        $data['user']= '';
        return view('admin/beranda', compact('title','data'));
    }

    public function dashboard(){
        $title="Dashboard";
        return view('admin/dashboard', compact('title'));
    }
}

