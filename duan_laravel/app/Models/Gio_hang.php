<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gio_hang extends Model
{
    use HasFactory;

    protected $table="gio_hang";
    protected $primaryKey="ID_GH";
    public $timestamps = false;
    public function khachhang(){
        return $this->belongsTo(Khach_hang::class,"MA_KH","MA_KH");
    }
}
