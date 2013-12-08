<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    protected $layout = 'layouts.master';

	public function index()
	{
        $counties =  DB::table('counties')->orderBy('name', 'asc')->lists('name', 'id');
        $counties = ['All County'] + $counties;
        $house_types = DB::table('house_types')->orderBy('name', 'asc')->lists('name', 'id');
        $house_types = ['All Type'] + $house_types ;

        $this->layout->content = View::make('home', array('counties_options' => $counties, 'house_type_options' => $house_types));
	}

    public function city_list($county_id)
    {
        if ($county_id == 0) {
            $cities = ["Select County First"];
        } else {
            $cities = County::find($county_id)->cities->lists('name', 'id');
            $cities = ['All City'] + $cities;
        }

        $html = View::make('home/city_list', array('cities_options' => $cities))->render();

        return Response::json(array(
                'html' => $html),
            200
        );
    }

    public function search_result()
    {
        if (Request::ajax())
        {
            $input = Input::all();
            $county_id = $input['county'];
            $city_id = $input['city'];
            $price_from = $input['price_from'];
            $price_to = $input['price_to'];
            $house_type_id = $input['house_type_id'];

            $query = Property::with('county', 'city', 'house_type')->where('sold', '<>', '1');

            if ($city_id <> '0') {
                $query = $query->where('city_id', $city_id);
            } elseif ($county_id <> 0) {
                $query = $query->where('county_id', $county_id);
            }

            if ($price_from <> '') {
                $query = $query->where('price', '>=', $price_from);
            }

            if ($price_to <> '') {
                $query = $query->where('price', '<=', $price_to);
            }

            if ($house_type_id <> '0') {
                $query = $query->where('house_type_id', $house_type_id);
            }

            $properties = $query->get();

            $html = View::make('home/search_result', array('properties' => $properties))->render();

            return Response::json(array(
                    'html' => $html),
                    200
            );



        }
    }


}