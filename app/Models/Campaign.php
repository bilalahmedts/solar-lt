<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Sanctum\HasApiTokens;

class Campaign extends Model
{
    use HasApiTokens, HasFactory, Sortable;

    protected $fillable = [
        'hrms_id',
        'name',
        'status'
    ];
    public $sortable = ['hrms_id','name'];
}
