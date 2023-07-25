<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegulationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'regulation_number',
        'regulation_about',
        'regulation_url',
    ];

    public function regulations()
    {
        return $this->belongsTo(Regulation::class, 'regulation_id');
    }
}
