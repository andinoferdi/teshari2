<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use Uuid;
    protected $fillable = ['nama_kategori'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kategori_id');
    }
}
