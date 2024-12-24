@extends('layouts.app')

@section('content')
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <div>{{ session('error') }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
<h1>Mượn sách</h1>
<form action="{{ route('borrow.store') }}" method="post">
    @csrf
    <div>
        <label class="form-label" for="reader_id">Độc giả</label>
        <select class="form-control" name="reader_id" id="reader_id">
            @foreach($readers as $reader)
            <option value="{{$reader->id}}">{{$reader->name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="form-label" for="book_id">Sách</label>
        <select class="form-control" name="book_id" id="book_id">
            @foreach($books as $book)
            <option value="{{$book->id}}">{{$book->name}}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="form-label" for="borrow_date">Ngày mượn</label>
        <input class="form-control" type="date" name="borrow_date" id="borrow_date" required>
    </div>

    <div>
        <label class="form-label" for="return_date">Ngày trả dự kiến</label>
        <input class="form-control" type="date" name="return_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Xong</button>
</form>

@endsection