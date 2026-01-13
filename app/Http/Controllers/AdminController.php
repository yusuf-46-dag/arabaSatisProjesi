<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        return view('panel.admin.index');
    }
    public function carBrandIndex(){
        $user=Auth::user();
        if($user->role == 1){
            return view('panel.admin.carBrand.index');
        }else{
            abort(403);
        }
        
    }
    public function carBrandCreatePage(){
        return view('panel.admin.carBrand.create');
    }
    public function carBrandUpdatePage(){
        return view('panel.admin.carBrand.update');
    }
}
