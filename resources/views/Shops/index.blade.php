@extends('master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Cữa hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách các cữa hàng</h5>
                        @can('create', App\Models\Shop::class)
                        <a href="{{route('shop.create')}}" class="btn btn"style="color:rgb(52, 136, 245)">Thêm cữa hàng</a>
                        @endcan
                        <br>
                        <br>
                        <!-- Primary Color Bordered Table -->
                        <table class="table table-bordered border-primary">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên cơ sở</th>
                                    <th scope="col">địa chỉ</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Tùy chỉnh</th>
                                </tr>
                            </thead>
                            <tbody id="addRow" class="addRow">
                                @foreach($shops as $key => $shop)
                                <tr class="item-{{ $shop->id }}">
                                    <th scope="row">{{++$key}}</th>
                                    <td>{{$shop->name}}</td>
                                    <td>{{$shop->address}}</td>
                                    <td>{{$shop->hotline}}</td>
                                    <td>{{$shop->email}}</td>
                                    <td>
                                        @can('update', App\Models\Shop::class)
                                        <a href="{{route('shop.edit',$shop->id )}}"class="btn btn-light">
                                            <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-arrow-counterclockwise"></i>
                                        </a>
                                        @endcan
                                        @can('view', App\Models\Shop::class)
                                        <a href="{{route('shop.show',$shop->id )}}"class="btn btn-light">
                                            <i style="font-size:20px; color:rgb(48, 13, 250)" class="bi bi-eye"></i>
                                        </a>
                                        @endcan
                                        @can('delete', App\Models\Shop::class)
                                            <a data-url="{{ route('shop.destroy', $shop->id) }}"
                                                id="{{ $shop->id }}"class="btn btn-light deleteIcon"> <i
                                                    style="font-size:20px; color:rgb(48, 13, 250)"
                                                    class="bi bi-trash"></i></a>
                                                    @endcan
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
