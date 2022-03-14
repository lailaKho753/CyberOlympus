<?php

namespace App;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    protected $table ='users';
    protected $fillable = [
        'id', 'name', 'email', 'phone', 'created_at'
    ];   

    public function Customer()
    {
        return $this->hasOne(App\Customer::class);
    } 

    public function POST($data){
        return DB::table('users')->insert([$data]);
    }

}
