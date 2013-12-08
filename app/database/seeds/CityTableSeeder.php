<?php

class CityTableSeeder extends Seeder {

    public function run()
    {
        $CITIES = CityTableSeeder::csv_to_array(__DIR__.'/cities.csv');

        DB::table('cities')->delete();

        foreach($CITIES as $city)
        {
            $county = County::where('name', $city['county_name'])->first();
            City::create(array(
                'name' => $city['name'],
                'county_id' => $county->id
            ));
        }

    }

    public function csv_to_array($filename='', $delimiter=',')
    {
        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }

}