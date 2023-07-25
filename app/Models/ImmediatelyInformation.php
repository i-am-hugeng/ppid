<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmediatelyInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function immediately_information_lists()
    {
        return $this->hasMany(ImmediatelyInformationList::class, 'parent_id');
    }
}
