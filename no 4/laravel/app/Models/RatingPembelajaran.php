<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratingpembelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['rating', 'balasan_admin', 'komentar', 'user_id', 'pembelajaran_id'];
    protected $table = "rating_pembelajarans";
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }
}
