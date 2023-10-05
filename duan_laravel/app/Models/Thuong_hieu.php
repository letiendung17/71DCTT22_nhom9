<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuong_hieu extends Model
{
    use HasFactory;
    protected $table = 'thuong_hieu';
    protected $primaryKey = 'MA_TH';
    public $timestamps = false;
    protected $thuonghieu = [
       'TEN_TH','ANH_TH',
    ];
  
    public function thongtinchitiet(){
        return $this->hasMany(Thong_tin_ct::class, "MA_TH","MA_TH");
    }
    public function sanpham(){
        return $this->hasMany(San_pham::class,"MA_TH","MA_TH");
    }
    public function quangcao(){
        return $this->belongsTo(Quang_cao::class,"MA_TH","MA_TH");
    }
}
