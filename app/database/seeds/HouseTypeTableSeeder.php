<?php

class HouseTypeTableSeeder extends Seeder {

    public function run()
    {
        $HOUSETYPES = array(
            'detached',
            'semi-detached',
            'terraced'
        );

        DB::table('house_types')->delete();

        foreach($HOUSETYPES as $housetype)
        {
            HouseType::create(array(
                'name' => $housetype
            ));
        }

    }
}