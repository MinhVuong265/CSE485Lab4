<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý thư viện</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('readers.index') }}">Quản lý thư viện</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('readers.index') }}">Danh sách độc giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('books.index') }}">Danh sách Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('books.create') }}">Thêm sách</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow.index') }}">Danh sách mượn trả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('borrow.create') }}">Mượn sách</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if (session('success'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="width: 50%;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    

</body>
</html>
