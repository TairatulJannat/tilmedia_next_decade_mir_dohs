<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'roles';

     protected $fillable = [
        'name',
        'slug',
    ];

    public function admins()
    {
        return $this->hasMany(AdminModel::class);
    }
}
