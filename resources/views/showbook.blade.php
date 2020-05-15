@extends('layouts.welcome')
@section('content')

    <!-- Header -->
    <header class="header text-white h-fullscreen pb-80" style="background-image: url({{asset('storage/'.$fbook->image)}});" data-overlay="9">
      <div class="container text-center">

        <div class="row h-100">
          <div class="col-lg-8 mx-auto align-self-center">


            <h1 class="display-4 mt-7 mb-8">{{$fbook->name}}</h1>
            <p><span class="opacity-70 mr-1">author</span> <a class="text-white" href="">{{$fbook->writer_name}}</a></p>
            <p><img class="avatar avatar-sm" src="{{asset('storage/'.$fbook->image)}}" alt="..."></p>
@if(Auth::id() === $fbook->user->id)
            <p><a href="{{route('discussions.create',$fbook->id)}}" class="btn btn-dark">Start a discussion</a></p>
@endif
          </div>

          <div class="col-12 align-self-end text-center">
            <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
          </div>

        </div>

      </div>
    </header><!-- /.header -->


    <!-- Main Content -->
    <main class="main-content">


      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Blog content
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section" id="section-content">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">
              @if($fbook->discussion->count()>0)
   <p> <a class="btn btn-success" href="{{route('discussions.show',[$fbook->id,$fbook->discussion->id])}}">See the book's discussion</a></p>
    @endif
              <p class="lead">{{$fbook->description}}</p>

            </div>
          </div>
            </div>
          </div>

      <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
      <div class="section bg-gray">
        <div class="container">

          <div class="row">
            <div class="col-lg-8 mx-auto">
              <p>Comments</p>
@foreach($fbook->comments as $comment)
              <div class="media-list">

                <div class="media">
                  <!-- <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="..."> -->

                  <div class="media-body">
                    <div class="small-1">
                      <strong>{{$comment->user->name}}</strong>
                      <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">{{$comment->created_at}}</time>
                    </div>
                    <p class="small-2 mb-0">{{$comment->content}}</p>
                  </div>
                </div>

              </div>
@endforeach

              <hr>

@auth
              <form action="{{route('comments.store',$fbook->id)}}" method="POST">
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
