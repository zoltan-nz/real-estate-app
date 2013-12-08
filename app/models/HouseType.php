<?php

class HouseType extends Eloquent {

    protected $table = 'house_types';

    public function properties()
    {
        return $this->hasMany('Property');
    }

}