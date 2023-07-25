<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInformationList extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function other_information()
    {
        return $this->belongsTo(OtherInformation::class, 'parent_id');
    }
}
