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
        $contact = $request -> only(['name','gender','email','tel','address','building','category_id','detail']);
        Contact::create($contact);         
        return view('confirm', compact('contact','categories'));
        }

}
