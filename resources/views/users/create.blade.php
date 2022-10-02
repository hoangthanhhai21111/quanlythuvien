@extends('master')
@section('content')
    {{-- content --}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="">Cữa hàng</a></li>
                    <li class="breadcrumb-item active">Thêm</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Elements</h5>
                            <!-- General Form Elements -->
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name='name'>
                                        @error('name')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Ngày sinh</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name='day_of_birth'>
                                        @error('day_of_birth')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Cở cở</label>
                                    <div class="col-sm-10">
                                        <select name="shop" id="" class="form-select" size="1"
                                            aria-label="size 3 select example">
                                            @foreach ($shop as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('shop_id')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Chức vụ</label>
                                    <div class="col-sm-10">
                                        <select name="position" id="" class="form-select" size="1"
                                            aria-label="size 3 select example">
                                            @foreach ($position as $key => $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('position_id')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"name='address'>
                                        @error('address')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control"name='email'>
                                        @error('email')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Số ĐT</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name='phone'>
                                        @error('phone')
                                            <p style="color:red">*{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                    <div class="col-sm-10">
                                        <input accept="image/*" type='file' id="imgInp" name="image"
                                            class="form-control" />
                                        <img type="hidden" width="120px" height="100px" id="blah" src="#"
                                            alt="your image" class="img-fluid rounded-start" /> <br>
                                    </div>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Submit Button</label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
            </div>
        </section>

    </main><!-- End #main -->
    {{-- End Content --}}
@endsection
