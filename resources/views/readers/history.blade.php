@extends('layouts.app')

@section('content')
    <h1>Lịch sử mượn sách của {{ $reader->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>Sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date ?? 'Chưa trả' }}</td>
                    <td>{{ $borrow->status ? 'Đã trả' : 'Chưa trả' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection