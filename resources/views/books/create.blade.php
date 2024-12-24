@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Thêm mới sách</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="author" class="form-label">Tác giả</label>
                <input type="text" name="author" class="form-control" id="author" value="{{ old('author') }}" required>
            </div>
            <div class="form-group">
                <label for="category" class="form-label">Thể loại</label>
                <input type="text" name="category" class="form-control" id="category" value="{{ old('category') }}">
            </div>
            <div class="form-group">
                <label for="year" class="form-label">Năm xuất bản</label>
                <input type="number" name="year" class="form-control" id="year" value="{{ old('year') }}">
            </div>
            <div class="form-group">
                <label for="quantity" class="form-label">Số lượng</label>
                <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}">
            </div>
            <button type="submit" class="btn btn-primary">Thêm sách</button>
        </form>
    </div>
@endsection

