<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request){
        $tel = $request->tel1. $request->tel2. $request->tel3;
        $contact = $request -> only(['last_name','first_name','gender','email','address','building','detail']);
        $category = Category::find($request->category_id);
        return view('confirm', compact('tel','contact','category'));
        }

    public function store(Request $request){
        $contact = $request -> only(['category_id','last_name','first_name','gender','email','tel','address','building','detail']);
        Contact::create($contact);
        return view('thanks');
    }


    public function admin(){
        $contacts = Contact::all();
        return view('admin', compact('contacts'));
    }

    public function search(Request $request){
        $todos =Contact::with('category')->CategorySearch($request -> category_id) -> KeywordSearch($request -> keyword)->get();
        $genders = Contact::
        $categories = Category::all();
        
        return view('index', compact('todos', 'categories'));
    }



}
