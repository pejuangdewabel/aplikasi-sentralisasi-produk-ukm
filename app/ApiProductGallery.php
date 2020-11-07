<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiProductGallery extends Model
{
    protected $table = 'product_galleries';

    protected $fillable = [
        'photos',
        'products_id'        
    ];

    protected $hidden = [
        
    ];
    public function product(){
        return $this->belongsTo(ApiProduct::class,'products_id','id');
    }   
    public function getPhotosAttribute($value){
        return url('storage/'.$value);
    }    
}
