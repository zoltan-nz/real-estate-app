<?php

class PropertyAdminController extends \BaseController {


    protected $layout = 'layouts.admin';

    public function __construct() {
        $this->beforeFilter('auth');
    }


    public function index()
    {
        $properties = Property::all();

        return $this->layout->content = View::make('admin.index', array('properties' => $properties));
    }

    public function create()
    {
        $property = new Property;

        $counties = DB::table('counties')->orderBy('name', 'asc')->lists('name', 'id');
        $sales_types = DB::table('sales_types')->orderBy('name', 'asc')->lists('name', 'id');
        $house_types = DB::table('house_types')->orderBy('name', 'asc')->lists('name', 'id');

        $cities = array('Choose county first', '');

        return $this->layout->content = View::make('admin.create', array('property' => $property, 'action' => 'create', 'house_type_options' => $house_types, 'sales_type_options' => $sales_types, 'county_options' => $counties, 'city_options' => $cities));
    }

    public function store()
    {


        $input = Input::all();
        foreach($input as $key => $value) {
            if ($value == '') {
                $input[$key] = Null;
            }
        }
                
        if (Input::file('picture') !== null) {
            if (Input::file('picture')->getSize()) {
                $fileName = substr(md5(uniqid(mt_rand(), true)), 0, 8).'.jpg';
                $savePathName = public_path()."/uploads/" . $fileName;
                $picture = Image::make(Input::file('picture')->getRealPath())->resize(100, 100)->save($savePathName);            
            }
        }
        
        
        $property = new Property;

        $rules = array(
            'title'         => 'required',
            'price'         => 'required|integer',
            'county_id'     => 'required',
            'city_id'       => 'required',
            'house_type_id' => 'required',
            'sales_type_id' => 'required',
            'address_1'     => '',
            'address_2'     => '',
            'address_3'     => '',
            'number_of_beds' => 'integer',
            'number_of_baths' => 'integer'
        );

        $v =  Validator::make($input, $rules);


        if($v->passes())
        {
            $property->fill($input);
            if (isset($picture)) {
                $property->picture = '/uploads/'.$fileName;
            }
            
            $property->save();
            return Redirect::route('admin.properties.index')->with('flash', 'The property was created');
        }

        return Redirect::route('admin.properties.create')->withInput()->withErrors($v->messages());


    }

    public function edit($id)
    {
        $counties = DB::table('counties')->orderBy('name', 'asc')->lists('name', 'id');
        $sales_types = DB::table('sales_types')->orderBy('name', 'asc')->lists('name', 'id');
        $house_types = DB::table('house_types')->orderBy('name', 'asc')->lists('name', 'id');

        $property = Property::find($id);
        $cities = County::find($property->county_id)->cities->lists('name', 'id');
        return $this->layout->content = View::make('admin.edit', array('property' => $property, 'house_type_options' => $house_types, 'sales_type_options' => $sales_types, 'county_options' => $counties, 'city_options' => $cities, 'action' => 'edit'));
    }

    public function update($id)
    {
      
       $property = Property::find($id);

       $input = Input::except('delete_picture');

        foreach($input as $key => $value) {
            if ($value == '') {
                $input[$key] = Null;
            }
        }


       $delete_picture = Input::get('delete_picture');

       $rules = array(
            'title'         => 'required',
            'price'         => 'required|integer',
            'county_id'     => 'required',
            'city_id'       => 'required',
            'house_type_id' => 'required',
            'sales_type_id' => 'required',
            'address_1'     => '',
            'address_2'     => '',
            'address_3'     => '',
            'number_of_beds' => 'integer',
            'number_of_baths' => 'integer'
        );

       $v =  Validator::make($input, $rules);


       if($v->passes())
       {
            if (Input::file('picture') !== null) {
                if (Input::file('picture')->getSize()) {
                    $fileName = substr(md5(uniqid(mt_rand(), true)), 0, 8).'.jpg';
                    $savePathName = public_path()."/uploads/" . $fileName;
                    $picture = Image::make(Input::file('picture')->getRealPath())->resize(100, 100)->save($savePathName);            
                }
            }

           $property->fill($input);

            if (isset($picture)) {
                $property->picture = '/uploads/'.$fileName;
            }



           if ($delete_picture == '1') {
               $property->picture = Null;
           }           

           $property->save();




           return Redirect::route('admin.properties.index')->with('flash', 'The property was updated');
       }

       return Redirect::route('admin.properties.edit', $id)->withInput()->withErrors($v->messages());
    }

    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        Session::flash('message', 'The property was deleted');
        return Response::json(array('ok', 200));
    }

    public function city_list($county_id)
    {
        $cities = County::find($county_id)->cities->lists('name', 'id');
        $html = View::make('admin.city_list', array('city_options' => $cities))->render();

        return Response::json(array(
                'html' => $html),
            200
        );
    }
}