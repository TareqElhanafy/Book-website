@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-center text-white" style="background-image: linear-gradient(-225deg, #5D9FFF 0%, #B8DCFF 48%, #6BBBFF 100%);">
      <div class="container">

        <div class="row">
          <div class="col-md-8 mx-auto">

            <h1>Find your favourite book</h1>
            <p class="lead-2 opacity-90 mt-6">Read and get updated to be always ready for the future</p>
            <form class="rounded p-5 mt-7" style="background-color: rgba(255, 255, 255, 0.2)"  action="{{route('welcome.index')}}" method="GET">
                          <div class="row">
                            <div class="col">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="ti-search mt-1"></i></span>
                                </div>
                                <input type="text" class="form-control" name="search" placeholder="Search free books">
                              </div>
                            </div>

                            <div class="col-auto">
                              <button class="btn btn-lg btn-primary" type="submit">Start Now</button>
                            </div>
                          </div>
                        </form>
          </div>
        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">
      <div class="section bg-gray">
        <div class="container">
          <div class="row">


            <div class="col-md-8 col-xl-9">
              <div class="row gap-y">

                @foreach($fbooks as $fbook)
                @if($fbook->available==='1')
                                <div class="col-md-6">
                                  <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="{{route('bookshow',$fbook->id)}}"><img class="card-img-top" src="{{asset('storage/'.$fbook->image)}}" alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                      <p><a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="{{route('bookshow',$fbook->id)}}">{{$fbook->category->name}}</a></p>
                                      <h5 class="mb-0"><a class="text-dark" href="{{route('bookshow',$fbook->id)}}">{{$fbook->name}}</a></h5>
                                    </div>
                                  </div>
                                </div>
@endif
                @endforeach
              </div>


              <nav class="flexbox mt-30">
                <a class="btn btn-white disabled"><i class="ti-arrow-left fs-9 mr-4"></i> Newer</a>
                <a class="btn btn-white" href="#">Older <i class="ti-arrow-right fs-9 ml-4"></i></a>
              </nav>
            </div>



            <div class="col-md-4 col-xl-3">
              <div class="sidebar px-4 py-md-0">

                <hr>

                <h6 class="sidebar-title">Categories</h6>
                <div class="row link-color-default fs-14 lh-24">
                  @foreach($categories as $category)
                  @if($category->available==='1')
                  <div class="col-6"><a href="#">{{$category->name}}</a></div>
                  @endif
                  @endforeach
                </div>

                <hr>

                <h6 class="sidebar-title">Top Free Books</h6>
                @foreach($fbooks as $fbook)
                
                <a class="media text-default align-items-center mb-5" href="{{route('bookshow',$fbook->id)}}">
                  <img class="rounded w-65px mr-4" src="{{asset('storage/'.$fbook->image)}}">
                  <p class="media-body small-2 lh-4 mb-0">{{$fbook->name}}</p>
                </a>
@endforeach

                <hr>

                

                <hr>

                <h6 class="sidebar-title">About</h6>
                <p class="small-3">free service for everyone, Go ahead and pick a book</p>


              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection
