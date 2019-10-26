<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';

    protected $fillable = ['name','description','status'];

    public function product(){
        return $this->hasMany(Product::class);
    }
}
