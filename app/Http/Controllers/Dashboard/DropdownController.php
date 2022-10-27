<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dashboard\City;
use App\Models\Dashboard\State;
use Illuminate\Http\Request;

class DropdownController extends Controller
{

    public function fetchState($id)
    {
        $states = State::where('country_id',$id)->pluck('name','id');

        return response()->json($states);

    }

    public function fetchCity($id)
    {

        $cities = City::where('state_id',$id)->pluck('name','id');

        return response()->json($cities);

    }
}
