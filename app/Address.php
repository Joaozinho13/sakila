<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'addresses';

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
    protected $fillable = ['address', 'number', 'complement', 'district', 'city_id', 'postal_code', 'location'];

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function Staff(){
        return $this->hasMany('App\Staff');
    }

    public function store(){
        return $this->hasMany('App\Store');
    }
}
