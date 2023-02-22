<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nephews extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function uncle(){
        return $this->belongsTo(Humans::class, 'humans_id', 'id');
    }
}
