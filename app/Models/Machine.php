<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'positions_magazine',
        'magazine_id',
    ];

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    
}
