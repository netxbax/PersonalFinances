<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    //
    protected $table = "movements";
    protected $fillable = [
        'type',
        'movement_date',
        'category_id',
        'description',
        'money'
    ];

    protected $dates = ['movements_date'];

    public function getMoneyDecimalArttribute(){
        return $this->attributes['money'] / 1000;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
