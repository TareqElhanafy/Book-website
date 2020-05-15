@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-white" style="background-color: #b9a0c9;">
      <div class="container">
        <div class="row">
          <div class="col-md-8">

            <h1 class="display-4">{{$discussion->title}}</h1>

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
                <div>
                  <h1>The discussion's Book is <br/>
                 {{$discussion->fbook->name}}
                  </h1>
                  <img src="{{asset('/storage/'.$discussion->fbook->image)}}">
                </div>

              </div>
            </div>

            <div class="col-11 mx-auto col-md-5 mx-md-0">
              
              <p class="text-light my-6">{{$discussion->content}}</p>



              <div class="row gap-y align-items-center text-center bg-light rounded p-5 mt-7">
                <div class="col-md-auto ml-auto order-md-last">
                  <h4 class="lead-5 mb-0 lh-1 fw-500"></h4>

                </div>


              </div>
            </div>

          </div>

          <hr class="my-8">

      </section>
      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">
              <p>Replies</p>
@foreach($discussion->replies as $reply)
              <div class="media-list">

                <div class="media">
                  <!-- <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="..."> -->

                  <div class="media-body">
                    <div class="small-1">
                      <strong>{{$reply->user->name}}</strong>
                      <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">{{$reply->created_at}}</time>
                    </div>
                    <p class="small-2 mb-0">{{$reply->content}}</p>
                  </div>
                </div>

              </div>
@endforeach

              <hr>

@auth
              <form action="{{route('replies.store',$discussion->id)}}" method="POST">
                @csrf
                @if($errors->any())
                <div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                          {{$error}}
                  @endforeach
               </div>
                @endif
                <div class="form-group">
                  <textarea class="form-control" name="content" placeholder="Comment" rows="4"></textarea>
                </div>

                <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
              </form>
@endauth
            </div>
          </div>

        </div>
      </div>


    </main>


@endsection
