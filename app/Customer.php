<?php

namespace App;
use App\Users;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    protected $table='customer';
    protected $fillable = [
        'id', 'address'
    ];  
    public $timestamps= false;

    public function alldata(){
        return DB::table('customer')->get();
    }

    public function Users()
    {
        return $this->hasOne(App\Users::class);
    } 

    public function POST($data){
        return DB::table('customer')->insert([$data]);
    }
}
