@extends('layout.parent')

@section('title', 'Create  book')

@section('content')
<form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')
        <div class="col-12">
            <label for="bookTitle" class="form-label">Book title</label>
            <input type="text" class="form-control" id="bookTitle" name="title" value="{{ old('title') }}">
        </div>
        <div class="col-12">
            <label for="bookAuthor" class="form-label">Book author</label>
            <input type="text" class="form-control" id="bookAuthor" name="author" value="{{ old('author') }}">
        </div>
        <div class="col-12">
            <label for="bookEdition" class="form-label">Book edition</label>
            <input type="text" class="form-control" id="bookEdition" name="edition" value="{{ old('edition') }}">
        </div>
        <div class="col-12">
            <label for="bookPublishing" class="form-label">Book publishing</label>
            <input type="text" class="form-control" id="bookPublishing" name="publishing" value="{{ old('publishing') }}">
        </div>
        <div class="col-12">
            <label for="bookIsbn" class="form-label">Book isbn</label>
            <input type="text" class="form-control" id="bookIsbn" name="isbn" value="{{ old('isbn') }}">
        </div>
        <div class="col-12">
            <label for="bookImage" class="form-label">Book image</label>
            <input type="file" class="form-control" id="bookImage" name="image" value="{{ old('image') }}">
        </div>
        <div class="col-12">
            <label for="bookPdf" class="form-label">Book pdf</label>
            <input type="file" class="form-control" id="bookPdf" name="pdf" value="{{ old('pdf') }}">
        </div>
        
        <div class="mb-2">
            <label class="col col-form-label">Select</label>
            <div class="col ">
                <select class="form-select" aria-label="Default select example" name="place_id">
                    <option selected>===== Choose place =====</option>
                    @foreach ($place as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>

        <div class="mb-2">
            <label class="col col-form-label">Select</label>
            <div class="col ">
                <select class="form-select" aria-label="Default select example" name="category_id">
                    <option selected>===== Choose Category =====</option>
                    @foreach ($category as $row)
                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
</form>
@endsection