<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public static function arrayForCatetoryList(){
        $arr = [];
        $all = Category::all();
        foreach($all as $i){
            $arr[$i->title] = $i->title;
        }
        return $arr;
    }

    public function product(){
        return $this->HasMany(Product::class);
    }
}
