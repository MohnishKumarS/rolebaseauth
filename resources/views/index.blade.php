@extends('layouts.main')

@section('content')
    <section>
       <div class="container">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="5000">
                <img src="{{asset('image/slider/s3.jpg')}}" class="d-block w-100 img-fluid" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="4000">
                <img src="{{asset('image/slider/s2.avif')}}" class="d-block w-100 img-fluid" alt="...">
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
       </div>
    </section>
@endsection