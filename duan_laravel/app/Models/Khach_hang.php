<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khach_hang extends Model
{
    use HasFactory;
    protected $table = 'khach_hang';
    protected $primaryKey = 'MA_KH';
    public $timestamps = false;


  
    public function users(){
        return $this->hasMany(User_kh::class,"MA_KH","MA_KH");
    }
public function giohang(){
    return $this->hasMany(Gio_hang::class, "MA_KH","MA_KH");
}

}
