<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function scopeFavourite(Builder $query): void
    {
        $query->where('favourite',true);
    }
}
