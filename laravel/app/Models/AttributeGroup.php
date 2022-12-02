<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    use HasFactory;
    protected $table='attributesgroup';

    public function AttributeValue()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
