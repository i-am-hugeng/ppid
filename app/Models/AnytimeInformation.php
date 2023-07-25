<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnytimeInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
    ];

    public function anytime_information_lists()
    {
        return $this->hasMany(AnytimeInformationList::class, 'parent_id');
    }
}
