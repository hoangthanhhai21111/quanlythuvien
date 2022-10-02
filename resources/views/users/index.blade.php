@extends('master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Nhân viên</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách nhân viên</h5>
                        <a href="{{ route('user.create') }}" class="btn btn"style="color:rgb(52, 136, 245)">Thêm nhân
                            viên</a>
                        <br>
                        <br>
                        <!-- Primary Color Bordered Table -->
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên </th>
                                    <th scope="col">cửa hàng</th>
                                    <th scope="col">chức vụ</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tùy chỉnh</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">
                                @foreach ($users as $key => $user)
                                    <tr class="item-{{ $user->id }}">
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->shop_id }}</td>
                                        <td>{{ $user->position_id }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a href="{{ route('user.edit', $user->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-arrow-counterclockwise"></i>
                                            </a>
                                            <a href="{{ route('user.show', $user->id) }}"class="btn btn-light">
                                                <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-eye"></i>
                                            </a>

                                            <a data-url="{{ route('user.destroy', $user->id) }}"
                                                id="{{ $user->id }}"class="btn btn-light deleteIcon"> <i
                                                    style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Primary Color Bordered Table -->
                    </div>
                    {{ $users->onEachSide(5)->links() }}
                </div>
            </div>
            </div>

        </section>
    </main><!-- End #main -->
@endsection
