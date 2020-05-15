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

                <h6 class="sidebar-title">Top posts</h6>
                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/4.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Thank to Maryam for joining our team</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/3.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Best practices for minimalist design</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/5.jpg">
                  <p class="media-body small-2 lh-4 mb-0">New published books for product designers</p>
                </a>

                <a class="media text-default align-items-center mb-5" href="blog-single.html">
                  <img class="rounded w-65px mr-4" src="../assets/img/thumb/2.jpg">
                  <p class="media-body small-2 lh-4 mb-0">Top 5 brilliant content marketing strategies</p>
                </a>

                <hr>

                <h6 class="sidebar-title">Tags</h6>
                <div class="gap-multiline-items-1">
                  <a class="badge badge-secondary" href="#">Record</a>
                  <a class="badge badge-secondary" href="#">Progress</a>
                  <a class="badge badge-secondary" href="#">Customers</a>
                  <a class="badge badge-secondary" href="#">Freebie</a>
                  <a class="badge badge-secondary" href="#">Offer</a>
                  <a class="badge badge-secondary" href="#">Screenshot</a>
                  <a class="badge badge-secondary" href="#">Milestone</a>
                  <a class="badge badge-secondary" href="#">Version</a>
                  <a class="badge badge-secondary" href="#">Design</a>
                  <a class="badge badge-secondary" href="#">Customers</a>
                  <a class="badge badge-secondary" href="#">Job</a>
                </div>

                <hr>

                <h6 class="sidebar-title">About</h6>
                <p class="small-3">TheSaaS is a responsive, professional, and multipurpose SaaS, Software, Startup and WebApp landing template powered by Bootstrap 4. TheSaaS is a powerful and super flexible tool for any kind of landing pages.</p>


              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
@endsection
