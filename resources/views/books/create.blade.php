@extends('master')
@section('content')
    {{-- content --}}
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="">Sách</a></li>
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
                            <form action = "{{ route('book.store') }}" method = "POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Thể loại</label>
                                    <div class="col-sm-10">
                                        <select name="category" id="" class ="btn btn-primary">
                                            @foreach ($category as $key => $value)
                                                   <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Tác giã</label>
                                    <div class="col-sm-10">
                                        <select name="author" id="" class ="btn btn-primary">
                                            @foreach ($author as $key => $value)
                                                   <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Ngày xuất bản</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name='publication_date'>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Số lượng</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" id="formFile" name = "amount">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Giá bán</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="price">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Giá cho thuê</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="rental_price">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Ảnh</label>
                                    <div class="col-sm-10">
                                        <img type="hidden" width="120px" height="100px" id="blah" src="#"
                                        alt="your image" class="img-fluid rounded-start" />
                                        <input accept="image/*" type='file' id="imgInp" name="image"
                                        class="btn btn-primary" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">mô tả</label>
                                    <div class="col-sm-10">
                                      <textarea class="form-control" style="height: 100px" name="information"></textarea>
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
