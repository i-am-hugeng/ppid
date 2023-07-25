<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function regulation_lists()
    {
        return $this->hasMany(RegulationList::class, 'regulation_id');
    }
}
