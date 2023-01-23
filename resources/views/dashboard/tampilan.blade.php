@extends('main')

@section('content')
@if (Auth::user()->role == 'user')
<div class="container">
    <div class=" text-center mt-5 ">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card mt-2 mx-auto bg-light">
                    <div class="card-body bg-light">
                        <div class="container">
                            <div class="controls">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="kiri">
                                            <h4>Student</h4>
                                        </div>
                        
                                        <div class="kanan" style="margin-left: 875px;">
                                            <p>Dashboard</p>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row" style="margin-top: 20px; margin-right: 20px;">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-bodyx">
                                                <i class="fa-solid fa-minus"  style="font-size: 60px; margin-right: 875px;"></i>
                                                <h5 style="margin-right: 875px; margin-bottom: 20px;">Hi,</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

<div class="justify">
    <i style="font-size: 35px;"  class="fa-solid fa-minus"></i>
</div>

<div class="dustify">
<h5>Hi, {{ Auth::user()->name }}!</h5>
    <p class="text-secondary">Selamat Datang</p>
</div>

@if (Session::get('successUploadBayar'))
<div class="alert alert-success">
    {{ Session::get('successUploadBayar') }}
</div>
@endif
@endif
<center>
    <div class="card mb-3" style="width: 550px;">
        <div class="row">
          <div class="col-md-4">
            <img style="max-width: 200px;" src="assets/img/nvl-bulan.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">Bulan</h5>
                <p class="card-text">"Dalam novel Bulan petualangan antara Raib dan kedua kawannya masih berlanjut. Miss Selena akhirnya muncul di sekolah saat beberapa bulan setelah kejadian di klan baru."</p>
                <button type="button" class="btn btn-warning">Read More</button>
                <p class="card-text"><small class="text-muted">-Tere Liye</small></p>
                <div class="swiper-pagination"></div>
            </center>
            </div>
          </div>
        </div>
      </div>
{{-- admin penutup --}}
@endsection