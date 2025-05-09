<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
    return view('register');
    }

    public function store(Request $request){
    $admin = $request -> only (['name','email','password']);
    $contacts = Contact::all();
    return view('/admin',compoct('contacts')) ; 
    }

}
