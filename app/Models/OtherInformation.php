<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function other_information_lists()
    {
        return $this->hasMany(OtherlyInformationList::class, 'parent_id');
    }
}
