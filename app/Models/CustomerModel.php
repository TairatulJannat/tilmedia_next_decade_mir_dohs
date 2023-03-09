<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'name',
        'contact_no',
        'email',
        'password',
        'address',
        'status',
        'created_by',
        'connection_to',
        'connection_from',
    ];

    public function role()
    {
        return $this->belongsTo(RoleModel::class);
    }


    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'id');
    }

    public function set_top_boxs()
    {
        return $this->hasMany(SetTopBoxModel::class, 'id');
    }

    public function package()
    {
        return $this->belongsTo(PackageModel::class, 'package_id');
    }
}
