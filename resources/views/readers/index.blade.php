@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Danh sách độc giả</h1>
        <a href="{{ route('readers.create') }}" class="btn btn-primary">Thêm mới</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($readers as $reader)
                    <tr>
                        <td>{{ $reader->id }}</td>
                        <td>{{ $reader->name }}</td>
                        <td>{{ $reader->birthday }}</td>
                        <td>{{ $reader->address }}</td>
                        <td>{{ $reader->phone }}</td>
                        <td>
                            <a href="{{ route('readers.show', $reader->id) }}" class="btn btn-info">Xem</a>
                            <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-warning">Sửa</a>
                            <form action="{{ route('readers.destroy', $reader->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân trang tùy chỉnh -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{-- Liên kết "Previous" --}}
                @if ($readers->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $readers->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                @endif

                {{-- Các số trang --}}
                @foreach ($readers->getUrlRange(1, $readers->lastPage()) as $page => $url)
                    <li class="page-item {{ $page == $readers->currentPage() ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                {{-- Liên kết "Next" --}}
                @if ($readers->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $readers->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
