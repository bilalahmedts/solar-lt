<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Designation extends Model
{
    use HasFactory, Sortable;
    protected $fillable = ['name','status',];
    public $sortable = [
        'id',
        'name',
        'status',
        'created_at',
        'updated_at'
    ];
}
