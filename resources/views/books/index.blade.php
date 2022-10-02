@extends('master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sách</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Các thể loại sách</h5>
                        <a href="{{ route('book.create') }}" class="btn btn"style="color:rgb(52, 136, 245)">Thêm sách</a>
                        <br>
                        <br>
                        <!-- Primary Color Bordered Table -->
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên </th>
                                    <th scope="col">thể loại</th>
                                    <th scope="col">tách giả</th>
                                    <th scope="col">ngày xuất bản</th>
                                    <th scope="col">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">
                                @foreach ($book as $key => $value)
                                    <tr class="item-{{ $value->id }}">
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->category_id }}</td>
                                        <td>{{ $value->author_id }}</td>
                                        <td>{{ $value->publication_date }}</td>
                                        <td>
                                            <a href="{{ route('book.edit', $value->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-arrow-counterclockwise"></i>
                                            </a>
                                            <a href="{{ route('book.show', $value->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-eye"></i>
                                            </a>
                                            <a data-url="{{ route('book.destroy', $value->id) }}"
                                                id="{{ $value->id }}"class="btn btn-light deleteIcon"> <i
                                                    style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Primary Color Bordered Table -->
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
