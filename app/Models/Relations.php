<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relations extends Model{
    use HasFactory;
    protected $guarded = [];

    public function humans(){
        return $this->belongsTo(Humans::class);
    }
}
