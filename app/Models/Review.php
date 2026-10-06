<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

protected $fillable = [
    'service_id',
    'customer_id',
    'freelancer_id',
    'rating',
    'comment',
];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function freelancer()
    {
        return $this->belongsTo(User::class, 'freelancer_id');
    }
}
