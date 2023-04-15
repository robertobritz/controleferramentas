<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = ['positions', 'machine_id'];

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
