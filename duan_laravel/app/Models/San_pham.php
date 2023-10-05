<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class San_pham extends Model
{
    use HasFactory;

    protected $table="san_pham";
    protected $primaryKey ="MA_SP";

    public function setCreatedAtAttribute($value)
{
    $this->attributes['created_at'] = \Carbon\Carbon::now();
}

protected $fillable = [
    'TEN_SP', 'MOTA_SP','created_at'
];

public function nganhhang(){
    return $this->belongsTo(Nganh_hang::class, "MA_NH","MA_NH");
}
public function thuonghieu(){
    return $this->belongsTo(Thuong_hieu::class, "MA_TH","MA_TH");
}
public function anhsp(){
    return $this->hasMany(Anh_sp::class,"MA_SP", "MA_SP");
}
public function chitietsp(){
    return $this->hasMany(Ct_sanpham::class,"MA_SP","MA_SP");
}
public function nhanvien(){
    return $this->hasMany(Nhan_vien::class,"MA_NV","MA_NV");
}
}
