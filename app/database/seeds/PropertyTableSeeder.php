<?php

class PropertyTableSeeder extends Seeder {

    public function run()
    {
        $PROPERTIES = array(
            array(
                'title'     => 'Nice house in Dublin',
                'details'   => 'Amazing panorama with a big garden.',
                'price'     => 230000,
                'county_id' => County::where('name', 'like', 'Dublin Co.')->first()->id,
                'city_id'   => City::where('name', 'like', 'Dublin')->first()->id,
                'sales_type_id' => SalesType::all()->first()->id,
                'house_type_id' => HouseType::all()->first()->id
                ),

            array(
                'title'     => 'Nice house in Sandyford',
                'details'   => 'Amazing panorama with a big garden.',
                'price'     => 250000,
                'county_id' => County::where('name', 'like', 'Dublin Co.')->first()->id,
                'city_id'   => City::where('name', 'like', 'Dublin')->first()->id,
                'sales_type_id' => SalesType::all()->first()->id,
                'house_type_id' => HouseType::all()->first()->id
        ));



        DB::table('properties')->delete();

        foreach($PROPERTIES as $property)
        {
            Property::create($property);
        }

    }
}