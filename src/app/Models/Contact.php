<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable =['last_name','first_name','gender','email','tel','address','building','category_id','detail'];

    public function category(){
        return $this -> belongsTo(Category::class);
    }

     public function scopeGenderSearch($query, $gender){
        if (!empty($gender)) {
        $query->where('gender', $gender);
        }
    }
       public function scopeCategorySearch($query, $category_id){
        if (!empty($category_id)) {
        $query->where('category_id', $category_id);
        }
    }

    public function scopeKeywordSearch($query, $keyword){
        if (!empty($keyword)) {
        $query->where('detail', 'like', '%' . $keyword . '%');
        }
    }

       public function scopeDateSearch($query, $created_at){
        if (!empty($created_at)) {
        $query->where('created_at', $created_at);
        }
    }
}
