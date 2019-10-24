<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['name','email','address','status'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
