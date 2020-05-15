@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-center text-white" style="background-color: #b9a0c9;">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1 class="display-4">The Store</h1>
            <p class="lead-2 opacity-90 mt-6">You can find a list of our product in this page. We'll deliver your order in less than two days. Try it yourself!</p>

          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">

      <section class="section bg-gray">
        <div class="container">
          <div class="row gap-y">
@foreach($pbooks as $pbook)
@if($pbook->available==='1')
            <div class="col-md-6 col-xl-4">
              <div class="product-3 mb-3">
                <a class="product-media" href="{{route('pbookshow',$pbook->id)}}">
                  <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                  <img src="{{asset('/storage/'.$pbook->image)}}" alt="product">
                </a>

                <div class="product-detail">
                  <h6><a href="{{route('pbookshow',$pbook->id)}}">{{$pbook->category->name}}</a></h6>
                  <div class="product-price">{{$pbook->price}}</div>
                </div>
              </div>
            </div>
            @endif
@endforeach

          </div>


          <nav class="mt-7">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#">
                  <span class="fa fa-angle-left"></span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <span class="fa fa-angle-right"></span>
                </a>
              </li>
            </ul>
          </nav>


        </div>
      </section>

    </main>
@endsection
