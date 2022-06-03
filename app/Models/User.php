<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Sortable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'campaign_id',
        'designation_id',
        'reporting_to',
        'hrms_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getSupervisor()
    {
        return $this->hasOne(User::class, 'id', 'reporting_to');
    }


    public function campaign()
    {
        return $this->hasOne(Campaign::class, 'id', 'campaign_id');
    }

  
    /**
     * The attributes that should be sorted 
     */

     public $sortable = ['id','name','email','created_at', 'updated_at'];
}
