<?php

namespace App;
use App\Karyawan;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table ='company';
    protected $fillable = [
        'company_id', 'nama_company', 'email', 'logo', 'website'
    ];
    public function karyawan()
    {
        return $this->hasMany(Karyawan::class);
    }
    
}
