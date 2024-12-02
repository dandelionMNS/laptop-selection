<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laptop extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'id',
        'brand',
        'model',
        'price',
        'desc',
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
