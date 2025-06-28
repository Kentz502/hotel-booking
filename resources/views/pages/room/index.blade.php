@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rooms</h1>
        <a href="/room/create" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Rooms
        </a>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Hotel</th>
                                    <th>Room Type</th>
                                    <th>Price</th>
                                    <th>Capacity</th>
                                    <th>Facilities</th>
                                    <th>Total Room</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if (count($rooms) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">No Data Found</p>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                @foreach ($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + $rooms->firstItem() - 1 }}</td>
                                        <td>{{ $item->hotel->name }}</td>
                                        <td>{{ $item->room_type }}</td>
                                        <td>Rp {{ $item->price }} per night</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td>
                                            @if ($item->facilities)
                                                <ul class="mb-0">
                                                    @foreach (json_decode($item->facilities) as $facility)
                                                        <li>{{ $facility }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>{{ $item->total_rooms }}</td>
                                         <td>
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <a href="/room/{{ $item->id }}" class="d-inline-block btn btn-sm btn-info">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/room/{{ $item->id }}/edit" class="d-inline-block btn btn-sm btn-warning">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </div>
                                    </td>
                                    </tr>
                                    @include('pages.room.confirmation-delete')
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
