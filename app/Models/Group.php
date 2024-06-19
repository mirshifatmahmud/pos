<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public static function arrayForGroupList(){
        $arr = [];
        $all= Group::all();
        foreach($all as $i){
            $arr[$i->id] = $i->title; 
        } 
        return $arr;
    }

    public function user(){
        return $this->hasMany(User::class);
    }

}
