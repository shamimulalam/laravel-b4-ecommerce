<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const ACTIVE_STATUS = 'active';
    const INACTIVE_STATUS = 'inactive';

    protected $fillable = ['name','category_id','vendor_id','description','unit_price','stock','brand','status','is_featured'];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class);
    }
}
