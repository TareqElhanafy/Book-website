@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <h1 class="display-4">{{$pbook->name}}</h1>

          </div>
        </div>
      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Detail
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <section class="section">
        <div class="container">

          <div class="row">

            <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
              <div class="slider-dots-fill-primary text-center" data-provide="slider" data-dots="true">
                <div><img src="{{asset('/storage/'.$pbook->image)}}"></div>

              </div>
            </div>

            <div class="col-11 mx-auto col-md-5 mx-md-0">
              <p class="text-light my-6">{{$pbook->description}}</p>



              <div class="row gap-y align-items-center text-center bg-light rounded p-5 mt-7">
                <div class="col-md-auto ml-auto order-md-last">
                  <h4 class="lead-5 mb-0 lh-1 fw-500">{{$pbook->price}} EGP</h4>

                </div>

                <div class="col-md-auto">
                  <a class="btn btn-lg btn-primary" href="{{route('cart.index',$pbook->id)}}">Purchase</a>
                </div>
              </div>
            </div>

          </div>

          <hr class="my-8">

      </section>


    </main>


@endsection
