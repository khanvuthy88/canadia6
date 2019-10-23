<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    public function Account()
    {
    	return $this->hasMany(Account::class);
    }
}
