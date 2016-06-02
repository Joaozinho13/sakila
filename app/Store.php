<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stores';

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
    protected $fillable = ['manager_staff_id', 'address_id'];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function manager_staff()
    {
        return $this->belongsTo('App\Staff');
    }
    
    
}
