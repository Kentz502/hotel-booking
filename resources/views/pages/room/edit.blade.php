@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Rooms</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="/room/{{ $room->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="hotel_id">Hotel</label>
                        <select name="hotel_id" id="hotel_id" class="form-control @error('hotel_id') is-invalid @enderror" value="{{ old('hotel_id') }}">
                                <option value="">Choose Hotel</option>
                                @foreach ($hotels as $hotel)
                                    <option value="{{ $hotel->id }}" {{ old('hotel_id', $room->hotel_id) == $hotel->id ? 'selected' : '' }}>{{ $hotel->name }}</option>
                                @endforeach
                        </select>
                        @error('hotel_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="room_type">Room Type</label>
                        <input type="text" name="room_type" id="room_type" class="form-control @error('room_type') is-invalid @enderror" value="{{ old('room_type', $room->room_type) }}">
                        @error('room_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $room->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="capacity">Capacity</label>
                        <input type="number" name="capacity" id="capacity" class="form-control @error('capacity') is-invalid @enderror" value="{{ old('capacity', $room->capacity) }}">
                        @error('capacity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        @php
                            $roomFacilities = is_array(old('facilities')) ? old('facilities') : (is_array($room->facilities) ? $room->facilities : []);
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="TV"  {{ is_array(old('facilities')) && in_array('TV', old('facilities')) ? 'checked' : '' }}>
                            <label class="form-check-label">TV</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="WiFi"  {{ is_array(old('facilities')) && in_array('WiFi', old('facilities')) ? 'checked' : '' }}>
                            <label class="form-check-label">WiFi</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="Hot Water"  {{ is_array(old('facilities')) && in_array('Hot Water', old('facilities')) ? 'checked' : '' }}>
                            <label class="form-check-label">Hot Water</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="facilities[]" value="Bathub"  {{ is_array(old('facilities')) && in_array('Bathub', old('facilities')) ? 'checked' : '' }}>
                            <label class="form-check-label">Bathub</label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="total_rooms">Total Rooms</label>
                        <input type="number" name="total_rooms" id="total_rooms" class="form-control @error('total_rooms') is-invalid @enderror" value="{{ old('total_rooms', $room->total_rooms) }}">
                        @error('total_rooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                    <div class="d-flex justify-content-end" style="gap: 10px;">
                        <a href="/room" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
