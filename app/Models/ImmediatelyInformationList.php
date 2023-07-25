<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmediatelyInformationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function immediately_information()
    {
        return $this->belongsTo(ImmediatelyInformation::class, 'parent_id');
    }
}
