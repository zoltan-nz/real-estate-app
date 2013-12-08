<?php

class SalesType extends Eloquent {

    protected $table = 'sales_types';

    public function properties() 
    {
        return $this->hasMany('Property');
    }

}