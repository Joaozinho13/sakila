<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'staff';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'address_id', 'picture', 'email', 'store_id', 'active', 'username', 'password'];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function store(){
        return $this->hasMany('App\Store');
    }
    

}
