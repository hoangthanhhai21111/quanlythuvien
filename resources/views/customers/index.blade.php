@extends('master')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Khách hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách khách hàng</h5>
                        <a href="{{ route('customer.create') }}" class="btn btn"style="color:rgb(52, 136, 245)">Thêm Khách hàng</a>
                        <br>
                        <br>
                        <!-- Primary Color Bordered Table -->
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Số ĐT</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr class="item-{{ $customer->id }}">
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td>
                                            <a href="{{ route('customer.edit', $customer->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-arrow-counterclockwise"></i>
                                            </a>
                                            <a href="{{ route('customer.show', $customer->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-eye"></i>
                                            </a>

                                            <a data-url="{{ route('customer.destroy', $customer->id) }}"
                                                id="{{ $customer->id }}"class="btn btn-light deleteIcon"> <i
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
