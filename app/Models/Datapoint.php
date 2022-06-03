<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datapoint extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','name','question','category_id'
     ];
     public function category()
     {
         return $this->hasOne(Category::class, 'id', 'category_id');
     }
}
