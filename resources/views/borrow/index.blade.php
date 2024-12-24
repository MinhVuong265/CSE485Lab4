@extends('layouts.app')

@section('content')
<h1>Danh sách mượn trả</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Độc giả</th>
            <th scope="col">Sách</th>
            <th scope="col">Ngày mượn</th>
            <th scope="col">Ngày trả</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach($borrows as $key=>$borrow)
        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{ $borrow->reader->name }}</td>
            <td>{{ $borrow->book->name }}</td>
            <td>{{ $borrow->borrow_date }}</td>
            <td>{{ $borrow->return_date }}</td>
            <td class="fw-bold {{$borrow->status ? 'text-success' : 'text-danger' }}">{{ $borrow->status ? 'Đã trả' : 'Chưa trả' }}</td>
            <td>
                @if (!$borrow->status)
                <form action="{{ route('borrow.return', $borrow->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-primary" type="submit">Trả sách</button>                                                                                    
                </form>
                @endif 
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection