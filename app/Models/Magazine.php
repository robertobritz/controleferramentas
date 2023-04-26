<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = ['position', 'machine_id', 'machine_name', 'tool_name', 'tool_id' ];

    public function machine()
    {
        return $this->belongsTo(Machine::class, 'machine_id', 'id');
    }

}
