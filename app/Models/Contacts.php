<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "name",
        "phone_number"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
