<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodicInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function periodic_information_lists()
    {
        return $this->hasMany(PeriodicInformationList::class, 'parent_id');
    }
}
