<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = ['name','description','image','sale_price','price','status','category_id'];

    public  function  relationCate(){
        return $this->belongsTo(Category::class,"category_id","id");
    }

    public function  getBestSale($limit){
        return Product::where('sale_price','>',0)->orderBy('created_at',"DESC")->offset(0)->limit($limit)->get();
    }

    public function search(){

            return  Product::where('name','like','%'.request()->name . '%')->paginate(2)->withQueryString();

    }
}
