<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    use HasFactory;

    protected $fillable = ['properties_name', 'address', 'building_age', 'rent'];

    public function findAllProperties()
    {
        return Properties::all();
    }
}
