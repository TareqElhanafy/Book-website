@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">{{__('trans.Edit')}}</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                @if($errors->any())
                <div class="callout callout-danger">
              <h4>Warning!</h4>
              @foreach($errors->all() as $error)

              <p>{{$error}}</p>
              @endforeach
            </div>
                @endif

                <form class="form-horizontal" action="{{route('categories.update',$category->id)}}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">{{__('trans.editcat')}}</label>
                      <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputEmail3"  name="name" value="{{$category->name}}">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-info pull-right">{{__('trans.update')}}</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
</div>
@endsection
