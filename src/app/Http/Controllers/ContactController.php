<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use Symfony\Component\HttpFoundation\StreamedResponse;


class ContactController extends Controller
{
    //問い合わせフォームの表示
    public function index(){
         $categories = Category::all();
        return view('index', compact('categories'));
    }
    
    //確認画面表示(一旦削除)
    public function confirm(ContactRequest $request){
        $formData = $request->all();
        $category = Category::find($formData['category_id']);
        $categoryName = $category ? $category->content : '';
        return view('confirm', compact('formData', 'categoryName'));
    }

    // ボタンごとの処理(一旦削除)
    public function store(ContactRequest $request){
        $action=$request->input('action');
        if($action==='submit'){
            $inquiry=$request->only(['category_id','name','gender','email','tel','address','building','detail']);
            Contact::create($inquiry);
            return redirect()->route('contact.thanks');
        }else if($action==='back'){
            return redirect()->route('contact.form')->withInput(); 
        }else{
            return redirect()->route('contact.form');
        }
    }
    
 
    public function thanks(){
        return view(route('contact.thanks'));
    }

    //データ削除
    public function destroy(Contact $contact){
        $contact->delete();
        return redirect()->route('admin.search')->with('success', 'データが削除されました');
    }

    //エクスポート
    public function downloadCsv(){
        $contacts=Contact::select(['last_name','first_name','gender','no1','no2','no3','address','building','category_id','detail'])->with('category')->get();
        $categories=Category::all();
        $csvHeader=['last_name','first_name','gender','tel','address','building','category','detail'];
        $csvData = $contacts->map(function ($contact) {
    return [
        $contact->last_name,
        $contact->first_name,
        $contact->gender,
        $contact->no1.$contact->no2.$contact->no3,
        $contact->address,
        $contact->building ??'',
        $contact->category->content ?? '',
        $contact->detail,
    ];
})->toArray();

        $response = new StreamedResponse(function() use($csvHeader,$csvData){
            $handle=fopen('php://output','w');
            fwrite($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, $csvHeader);

            foreach($csvData as $row){
                fputcsv($handle,$row);
            }

            fclose($handle);
        },200,[
            'Content-Type'=>'text/csv',
            'Content-Disposition'=>'attachment;filename="contacts.csv"',
        ]);

        return $response;
    }
}
