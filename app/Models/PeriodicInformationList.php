<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodicInformationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function periodic_information()
    {
        return $this->belongsTo(PeriodicInformation::class, 'parent_id');
    }
}
