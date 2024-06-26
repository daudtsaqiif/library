@extends('layout.parent')

@section('title', 'book')

@section('content')

    <a href="{{ route('book.create') }}" class="btn btn-primary m-2">
        Add Product
        <i class="bi bi-plus"></i>
    </a>

            @forelse ($book as $row)
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('/storage/book', $row->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Judul: {{ $row->title }}</h5>
                        <p class="card-text">Quantitiy: {{ $row->quantitiy }}</p>
                        <p class="card-text">Category: {{ $row->category->name }}</p>
                        <p class="card-text">ISBN: {{ $row->isbn }}</p>

                        <a href="{{ route('book.edit', $row->id) }}" class="btn btn-primary m-2">
                            Edit Product
                            <i class="bi bi-plus"></i>
                        </a>

                        <form action="{{ route('book.destroy', $row->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                
            @empty

                    <td class="text-center"> Data is Empty</td>

            @endforelse

@endsection
