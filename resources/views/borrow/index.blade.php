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
        @foreach($borrows as $index=>$borrow)
        <tr>
            <th scope="row">{{($borrows->currentPage() - 1) * $borrows->perPage() + $index + 1}}</th>
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
<nav aria-label="Page navigation example">
  <ul class="pagination">
    @if($borrows->onFirstPage())
    <li class="page-item disabled">
      <span class="page-link">Previous</span>
    </li>
    @else
    <li class="page-item">
      <a class="page-link" href="{{ $borrows->previousPageUrl() }}" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    @endif
    @foreach ($borrows->links()->elements[0] as $page => $url)
        @if ($page == $borrows->currentPage())
        <li class="page-item active" aria-current="page">
            <span class="page-link">{{ $page }}</span>
          </li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
    @endforeach

    @if ($borrows->hasMorePages())
        <li>
        <a class="page-link" href="{{ $borrows->nextPageUrl() }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
        </a>
        </li>
    @else
    <li class="page-item disabled">
        <span class="page-link">Next</span>
      </li>
    @endif
  </ul>
</nav>

@endsection