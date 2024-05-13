@extends('layout.parent')

@section('title', 'place')

@section('content')
<button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#createModalPlace">
    Add place
    <i class="bi bi-plus"></i>
</button>
@include('place.modal-create')

<table class="table datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name Place</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($place as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td><button class="btn btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#editModalPlace{{ $row->id }}">
                        Edit
                    </button>
                    @include('place.modal-edit')
                    <form action="{{ route('place.destroy', $row->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center"> Data is Empty</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection