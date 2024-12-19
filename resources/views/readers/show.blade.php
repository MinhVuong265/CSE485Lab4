@extends('readers.app')

@section('content')
    <div class="container">
        <h1>Chi tiết độc giả</h1>
        <p><strong>Họ tên:</strong> {{ $reader->name }}</p>
        <p><strong>Ngày sinh:</strong> {{ $reader->birthday }}</p>
        <p><strong>Địa chỉ:</strong> {{ $reader->address }}</p>
        <p><strong>Số điện thoại:</strong> {{ $reader->phone }}</p>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
