<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnytimeInformationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'url',
    ];

    public function anytime_information()
    {
        return $this->belongsTo(AnytimeInformation::class, 'parent_id');
    }
}
