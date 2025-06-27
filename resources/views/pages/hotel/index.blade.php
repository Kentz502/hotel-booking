@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hotels</h1>
        <a href="/hotel/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-plus fa-sm text-white-50"></i> Add Hotel </a>
    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Hotel Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hotels as $item)
                            <tr>
                                <td>{{ $item->name  }}</td>
                                <td>{{ $item->address  }}</td>
                                <td>{{ $item->city  }}</td>
                                <td>{!!  wordwrap($item->description, 50, "<br>\n") !!}</td>
                                <td>
                                    <div class="d-flex align-items-center" style="gap: 10px;">
                                        <a href="/hotel/ {{ $item->id }} " class="d-inline-block mr-2 btn btn-sm btn-warning mr-2">
                                            <i class="fas fa-pen"></i></a>
                                        <button type="button" class="btn btn-sm btn-danger">
                                            <i class="fas fa-eraser"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
