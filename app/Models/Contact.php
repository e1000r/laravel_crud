<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'contact', 'email'];

    public function getFormattedContactAttribute()
    {
        return substr($this->contact, 0, 3) . ' ' .
            substr($this->contact, 3, 3) . ' ' .
            substr($this->contact, 6, 3);
    }
}
