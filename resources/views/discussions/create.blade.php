@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <h1 class="display-4"></h1>

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
                <div><img src="{{asset('/storage/'.$fbook->image)}}"></div>

              </div>
            </div>

            <div class="col-md-6">
                  <h5>Fill Your discussion Data</h5><br>
<form class="" action="{{route('discussions.store',$fbook->id)}}" method="post">
@csrf

                  <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" placeholder="title">
                  </div>


              <h5>Content</h5><br>

              <div class="form-group">
                <textarea class="form-control" placeholder="Your review" name="content" rows="7"></textarea>
              </div>
            <div class="form-group">
          <button type="submit" class="btn btn-success" name="button">Submit</button>
            </div>
            </form>
          </div>

          </div>

          <hr class="my-8">

      </section>


    </main>


@endsection
