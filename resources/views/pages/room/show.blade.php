@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Room Detail</h1>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="mb-3">
                <strong>Hotel</strong>
                <div>{{ $room->hotel->name }}</div>
            </div>
            <div class="mb-3">
                <strong>Room Type</strong>
                <div>{{ $room->room_type }}</div>
            </div>
            <div class="mb-3">
                <strong>Capacity</strong>
                <div>{{ $room->capacity }}</div>
            </div>
            <div class="mb-3">
                <strong>Facility</strong>
                @php
                    $facilities = is_array($room->facilities) ? $room->facilities : json_decode($room->facilities, true);
                @endphp
                @if (!empty($facilities))
                    <ul class="mb-0">
                        @foreach ($facilities as $facility)
                            <li>{{ $facility }}</li>
                        @endforeach
                    </ul>
                @else
                    <div>-</div>
                @endif
            </div>
            <div class="mb-3">
                <strong>Total Room</strong>
                <div>{{ $room->total_rooms }}</div>
            </div>
        </div>
        <div class="card-footer">
                <div class="d-flex justify-content-end" style="gap: 10px;">
                    <a href="/room" class="btn btn-outline-secondary">Back</a>
                </div>
            </div>
    </div>
@endsection
