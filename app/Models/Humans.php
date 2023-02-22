<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Humans extends Model{
    use HasFactory;
    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(Humans::class, 'humans_id', 'id');
    }
}
