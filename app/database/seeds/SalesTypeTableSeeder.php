<?php

class SalesTypeTableSeeder extends Seeder {

    public function run()
    {
        $SALESTYPES = array(
            'sale',
            'rent',
            'share'
        );

        DB::table('sales_types')->delete();

        foreach($SALESTYPES as $salestype)
        {
            SalesType::create(array(
                'name' => $salestype
            ));
        }

    }
}