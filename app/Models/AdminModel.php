<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = [
        'name',
        'mobile',
        'email',
        'password',
        'role_id',
        'status',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class);
    }


    public function customers()
    {
        return $this->hasMany(CustomerModel::class, 'created_by', 'id');
    }
}
