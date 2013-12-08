<?php

class CountyTableSeeder extends Seeder {

    public function run()
    {
        $COUNTIES = array(
            'Carlow',
            'Cavan',
            'Clare',
            'Cork',
            'Donegal',
            'Dublin',
            'Dun Laoghaire-Rathdown',
            'Fingal',
            'Galway',
            'Kerry',
            'Kildare',
            'Kilkenny',
            'Laois',
            'Leitrim',
            'Limerick',
            'Longford',
            'Louth',
            'Mayo',
            'Meath',
            'Monaghan',
            'Tipperary',
            'Offaly',
            'Roscommon',
            'Sligo',
            'Waterford',
            'Westmeath',
            'Wexford',
            'Wicklow'
        );

        DB::table('counties')->delete();

        foreach($COUNTIES as $county)
        {
            County::create(array(
                'name' => $county.' Co.',
            ));
        }

   }
}