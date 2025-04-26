<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class AdminController extends Controller
{
    public function index(){
        $categories=Category::all();
        $contacts=Contact::with('category')->Paginate(7);
        return view('admin',compact('contacts','categories'));
    }


    //各種検索
    public function search(Request $request){
        $categories=Category::all();

        if($request->input('action')==='reset'){
            $contacts=Contact::with('category')->paginate(7);
        }else{
            $contacts=Contact::with('category')->KeywordSearch($request->keyword)
            ->GenderSearch($request->gender)
            ->CategorySearch($request->category_id)
            ->DateSearch($request->date)->paginate(7)
            ->appends([
                'keyword' => $request->keyword,
                'gender' => $request->gender,
                'category_id' => $request->category_id,
                'date' => $request->date,
            ]);
        }
        return view('admin',compact('contacts','categories'));
    }


    

}