@extends('master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">chức vụ</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách các chức vụ trong công ty</h5>
                        @can('create', App\Models\position::class)
                            <a href="{{ route('position.create') }}" class="btn btn"style="color:rgb(52, 136, 245)">Thêm chức
                                vụ</a>
                        @endcan
                        <br>
                        <br>
                        <!-- Primary Color Bordered Table -->
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">
                                @foreach ($position as $key => $value)
                                    <tr class="item-{{ $value->id }}">
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            @can('update', App\Models\position::class)
                                                <a href="{{ route('position.edit', $value->id) }}"class="btn btn-light">
                                                    <i style="font-size:20px; color:rgb(48, 13, 250)"
                                                        class="bi bi-arrow-counterclockwise"></i>
                                                </a>
                                            @endcan
                                            @can('view', App\Models\position::class)
                                                <a href="{{ route('position.show', $value->id) }}"class="btn btn-light">
                                                    <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-eye"></i>
                                                </a>
                                            @endcan
                                            @can('delete', App\Models\position::class)
                                                <a data-url="{{ route('position.destroy', $value->id) }}"
                                                    id="{{ $value->id }}"class="btn btn-light deleteIcon"> <i
                                                        style="font-size:20px; color:rgb(48, 13, 250)"
                                                        class="bi bi-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <!-- End Primary Color Bordered Table -->
                    </div>
                </div>
            </div>
            </div>
        </section>


    </main><!-- End #main -->
@endsection
