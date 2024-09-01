<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'industry';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'keys',
    ];

    /**
     * Get the keys as an array.
     *
     * @return array
     */
    public function getKeysArrayAttribute()
    {
        return explode(',', $this->keys);
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
