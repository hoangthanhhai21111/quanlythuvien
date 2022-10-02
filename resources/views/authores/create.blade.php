@extends('master')
@section('content')
    {{-- content --}}
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="">Tác giả</a></li>
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
                            <form action="{{route('author.store')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name = 'name'>
                                        @error('name')
                                        <p style="color:red">*{{ $message }}</p>
                                    @enderror
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
