<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(10);
        return view('pages.hotel.index', [
            'hotels' => $hotels
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        Hotel::create($validatedData);

        return redirect('/hotel')->with('success', 'Hotel created successfully');
    }

    public function  create()
    {
        return view('pages.hotel.create');
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('pages.hotel.edit', [
            'hotel' => $hotel,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:50'],
            'address' => ['required', 'max:255'],
            'city' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        Hotel::findOrFail($id)->update($validatedData);

        return redirect('/hotel')->with('success', 'Hotel updated successfully');
    }

    public function destroy($id)
    {

        \Log::info('Destroy called', ['id' => $id, 'request' => request()->all()]);
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect('/hotel')->with('success', 'Hotel deleted successfully');
    }
}
