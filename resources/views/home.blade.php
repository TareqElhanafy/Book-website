@extends('layouts.admin')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
  الملف الشخصي
</h1>

</section>

<!-- Main content -->
<section class="content">

<div class="row">
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <!-- <li class="active"><a href="#activity" data-toggle="tab">الخدمات</a></li> -->
        <li><a href="#timeline" data-toggle="tab">الإشعارات</a></li>

      </ul>
      <div class="tab-content">

        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">

@foreach($notifications as $notification)
            <li>
              <i class="fa fa-user bg-aqua"></i>
            </li>

            <li>
              @if($notification->type==='App\Notifications\NewBookSold')

              <div class="timeline-item">
                <div class="timeline-body">
                Your book {{$notification->data['pbook']['name']}} sold one more time
                </div>
                <div class="timeline-footer">
                  <a class="btn btn-warning btn-flat btn-xs" href="{{route('pbookshow',$notification->data['pbook']['id'])}}">View Book</a>
                </div>
              </div>
              @endif

            </li>
            @endforeach
          </ul>
        </div>

      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>

</div>
<!-- /.row -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
