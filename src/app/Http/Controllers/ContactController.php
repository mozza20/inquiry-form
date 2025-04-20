<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;

class ContactController extends Controller
{
    //問い合わせフォームの表示
    public function index(){
         $categories = Category::all();
        return view('index', compact('categories'));
    }
    
    //確認画面表示
    public function confirm(ContactRequest $request){
        $formData=$request->all();
        $categories=Category::all();
        return view('confirm',compact('formData','categories'));
    }

    // category_id含む
    public function store(ContactRequest $request){
    //     $phone=$request->input('tel');
    //     $inquiry=new Contact();
    //     $inquiry->tel=$phone;
    //     $inquiry->save();
        $action=$request->input('action');
        if($action==='submit'){
            $inquiry=$request->only(['category_id','name','gender','email','tel','address','building','detail']);
            Contact::create($inquiry);
            return redirect()->route('contact.thanks');
        }else if(action==='back'){
            return redirect()->route('contact.form')->withInput(); 
        }else{
            return redirect()->route('contact.form');
        }
    }
 
    public function thanks(){
        return view(route('contact.thanks'));
    }

}
