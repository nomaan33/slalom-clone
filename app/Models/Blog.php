<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'id','service_id', 'industry_id', 'name', 'description', 'image'
    ];


    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class);
    }
}

