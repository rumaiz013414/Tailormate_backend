<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'tailor_id', 'description', 'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tailor() {
        return $this->belongsTo(User::class, 'tailor_id');
    }
}
