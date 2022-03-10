<?php

namespace App;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table ='karyawan';
    protected $fillable = [
        'karyawan_id', 'nama', 'email_k', 'company_id'
    ];
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
    
}
