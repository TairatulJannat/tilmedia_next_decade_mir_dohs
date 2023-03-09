<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SetTopBoxModel extends Model
{
    use HasFactory;
    protected $table = 'set_top_boxes';

    protected $fillable = [
        'sc_id',
        'stb_id',
        'device_status',
        'customer_id'
    ];

    public function customer(){
        return $this->belongsTo(CustomerModel::class, 'customer_id');
    }
}
