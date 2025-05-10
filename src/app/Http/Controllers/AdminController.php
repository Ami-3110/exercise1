<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
    return view('register');
    }

    public function admin(){
        
        $categories = Category::all();
        $contacts = Contact::all();
        return view('admin', compact('categories'));
    }

    public function search(Request $request){

    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
}


}