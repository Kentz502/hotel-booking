<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('hotel')->paginate(10);
        return view('pages.room.index', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'hotel_id' => ['required'],
            'room_type' => ['required', 'max:50'],
            'price' => ['required', 'numeric'],
            'capacity' => ['required', 'integer'],
            'facilities' => ['nullable', 'array'],
            'total_rooms' => ['required', 'integer'],
        ]);

        if(isset($validatedData['facilities'])) {
            $validatedData['facilities'] = json_encode($validatedData['facilities']);
        } else {
            $validatedData['facilities'] = json_encode([]);
        }

        Room::create($validatedData);

        return redirect('/room')->with('success', 'Room updated successfully');
    }

    public function create()
    {
        $hotels = Hotel::all();
        return view('pages.room.create', compact('hotels'));
    }


    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('pages.room.show', compact('room'));
    }

    public function edit($id)
    {
        $hotels = Hotel::all();
        $room = Room::findOrFail($id);
        return view('pages.room.edit', compact('room', 'hotels'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'hotel_id' => ['required'],
            'room_type' => ['required', 'max:50'],
            'price' => ['required', 'numeric'],
            'capacity' => ['required', 'integer'],
            'facilities' => ['nullable', 'array'],
            'total_rooms' => ['required', 'integer'],
        ]);

        if(isset($validatedData['facilities'])) {
            $validatedData['facilities'] = json_encode($validatedData['facilities']);
        } else {
            $validatedData['facilities'] = json_encode([]);
        }

        Room::findOrFail($id)->update($validatedData);

        return redirect('/room')->with('success', 'Room updated successfully');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();

        return redirect('/room')->with('success', 'Room deleted successfully');
    }
}
