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
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts','categories'));
    }

    public function search(Request $request){
    $contacts = Contact::with('category') -> KeywordSearch($request -> keyword) -> GenderSearch($request -> gender) -> CategorySearch($request -> category_id) -> DateSearch($request -> created_at)->get();
    $categories = Category::all();
    return view('admin', compact('contacts', 'categories'));
}


}