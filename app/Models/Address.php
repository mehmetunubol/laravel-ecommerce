<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $table = 'addresses';

    protected $fillable = [
        'user_id','address_name', 'firm_name','first_name','last_name', 'address', 'district', 'city', 'country', 'phone', 'cell_phone','tax_administration','tax_no', 'is_default'
    ];

    public function user()
    {
    	$this->belongsTo('\App\Models\User');
    }

}
