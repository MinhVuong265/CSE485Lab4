@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sửa thông tin độc giả</h1>
        <form action="{{ route('readers.update', $reader->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Họ tên:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $reader->name }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="birthday">Ngày sinh:</label>
                <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $reader->birthday }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="address">Địa chỉ:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $reader->address }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="phone">Số điện thoại:</label>
                <input type="tel" class="form-control" id="phone" name="phone" value="{{ $reader->phone }}" required pattern="[0-9]{10,15}" title="Vui lòng nhập chữ số!!!">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu</button>
            <a href="{{ route('readers.index') }}" class="btn btn-primary mt-3">Quay lại</a>
        </form>
    </div>
    <script>
        document.getElementById('phone').addEventListener('input', function (e) {
            this.value = this.value.replace(/[^0-9]/g, ''); // Loại bỏ ký tự không phải số
        });
    </script>
@endsection
