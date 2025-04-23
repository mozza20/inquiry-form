<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable=['category_id','name','gender','email','tel','address','building','detail'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    //キーワード検索
    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('first_name', 'like', '%' . $keyword . '%')
                ->orwhere('last_name', 'like', '%' . $keyword . '%')
                ->orWhere('email', 'like', '%' . $keyword . '%');
            });
        }
        return $query;
    }

    //性別検索
    public function scopeGenderSearch($query,$gender){
        if(!empty($gender)){
            $query->where('gender',$gender);
        }
        return $query;
    }

    //カテゴリ検索
    public function scopeCategorySearch($query,$category_id){
        if(!empty($category_id)){
            $query->where('category_id',$category_id);
        }
        return $query;
    }

    //日付検索
    public function scopeDateSearch($query,$date){
        if(!empty($date)){
            $query->where('created_at',$date);
        }
        return $query;
    }

 }
