<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';

    protected $fillable = ['name','email','address','status'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
