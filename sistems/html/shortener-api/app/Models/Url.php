<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $table = 'url';

    public $fillable = [
        'id',
        'url_original',
        'url_shortened',
        'date_expiration',
        'created_at'
    ];

    protected $appends = [
        'isValid'
    ];

    public function getIsValidAttribute()
    {
        return date('Y-m-d') <= $this->date_expiration;
    }

    /**
     * Scope a query to only include active URL.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->whereRaw("date_expiration > NOW()");
    }
}
