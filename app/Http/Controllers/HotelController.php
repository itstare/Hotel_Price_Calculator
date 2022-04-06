<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function create(){
        return view('hotel.create');
    }

    public function input(Request $request){
        $rules = [
            'name' => ['string', 'required', 'unique:hotels'],
            'location' => ['string', 'nullable'],
        ];
        $request->validate($rules);

        Hotel::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return back()->with('status', 'Hotel created');
    }

    public function index(){
        $hotels = Hotel::latest()->simplePaginate(20);

        return view('home', compact('hotels'));
    }

    public function edit($id){
        $hotel = Hotel::where('id', $id)->first();

        return view('hotel.edit', compact('hotel'));
    }

    public function update(Request $request, $id){
        $hotel = Hotel::where('id', $id)->first();

        $rules=[
            'name' => ['string', 'required',
            Rule::unique('hotels')->ignore($hotel->id),
            ],
            'location' => ['string', 'nullable'],
        ];
        $request->validate($rules);

        $hotel->update([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return back()->with('status', 'Hotel updated');
    }

    public function delete($id){
        Hotel::where('id', $id)->first()->delete();

        return back()->with('status', 'Hotel deleted');
    }

    public function searchByLocation(){
        $locations = DB::table('hotels')->select('location')->distinct()->get();

        return view('hotel.search-by-location', compact('locations'));
    }

    public function searchByLocationQuery(Request $request){
        $hotels = Hotel::where('location', $request->location)->latest()->simplePaginate(20);

        return view('hotel.search')->with([
            'hotels' => $hotels,
            'location' => $request->location,
        ]);
    }

    public function searchEngine(Request $request){
        $search = $request->term;

        $hotels = Hotel::query()->where('name', 'LIKE', "%{$search}%")->simplePaginate(20);

        return view ('hotel.search')->with([
            'hotels' => $hotels,
            'term' => $search,
        ]);
    }
}
