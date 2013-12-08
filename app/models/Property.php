<?php

class Property extends Eloquent {    

    protected $table = 'properties';

    protected $guarded = array();


    // public function __construct(array $attributes = array())
    // {
    //     $this->hasAttachedFile('picture', [
    //         'styles' => [
    //             'medium' => '300x300',
    //             'thumb'  => '100x100'
    //         ]
    //     ]);

    //     parent::__construct($attributes);
    // }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function county()
    {
        return $this->belongsTo('County');
    }

    public function house_type()
    {
        return $this->belongsTo('HouseType');
    }

    public function sales_type()
    {
        return $this->belongsTo('SalesType');
    }


}