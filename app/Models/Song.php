<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'band', 'label_id'];

    public function label()
    {
        return $this->belongsTo(Label::class);
    }
}
