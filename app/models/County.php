<?php

class County extends Eloquent {

    protected $table = 'counties';

    public function cities()
    {
        return $this->hasMany('City')->orderBy('name');
    }

}