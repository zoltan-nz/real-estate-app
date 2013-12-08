<?php

class City extends Eloquent {

    protected $table = 'cities';

    public function county()
    {
        return $this->belongsTo('County');
    }

    public function properties()
    {
        return $this->hasMany('Property');
    }

}