<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requestd extends Model
{
    use HasFactory;

    protected $table = 'requestd';

    protected $fillable = [
        'tiket_id',
        'user_id',
        'note',
        'notes',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Tiket()
    {
        return $this->hasMany(Tiket::class);
    }
}
