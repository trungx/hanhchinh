<?php

namespace HanhChinh\HanhChinh\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
	protected $table = 'regions';
    //
    public function beQuan() {
    	return $this->hasMany(Region::class,'thanh_pho','id');
    }
    public function bePhuong() {
    	return $this->hasMany(Region::class,'quan','id');
    }
}
