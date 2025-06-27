@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hotels</h1>
        <a href="/hotel/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Add Hotel
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
                                    <th>Hotel Name</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @if (count($hotels) < 1)
                            <tbody>
                                <tr>
                                    <td colspan="11">
                                        <p class="pt-3 text-center">No Data Found</p>
                                    </td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                @foreach ($hotels as $item)
                                <tr>
                                    <td>{{ $loop->iteration + $hotels->firstItem() - 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->city }}</td>
                                    <td>{!! wordwrap($item->description, 100, "<br>\n") !!}</td>
                                    <td>
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <a href="/hotel/{{ $item->id }}" class="d-inline-block btn btn-sm btn-warning">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @include('pages.hotel.confirmation-delete')
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
