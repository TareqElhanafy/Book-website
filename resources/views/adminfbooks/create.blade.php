@extends('layouts.admin')
@section('content')
<form role="form" action="{{isset($fbook)?route('adminfbooks.update',$fbook->id):route('adminfbooks.store')}}" method="post" enctype="multipart/form-data">
  @csrf
@if(isset($fbook))
@method('PUT')
@endif
  @if($errors->any())
  <div class="callout callout-danger">
<h4>Warning!</h4>
@foreach($errors->all() as $error)

<p>{{$error}}</p>
@endforeach
</div>
  @endif
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name">{{__('trans.Bookname')}}</label>
                      <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="{{__('trans.entername')}}" value="{{isset($fbook)?$fbook->name:''}}">
                    </div>
@if (App::isLocale('en'))
    <input type="hidden" name="en" value="">

@endif
<div class="form-group">
  <label for="name">{{__('trans.writer')}}</label>
  <input type="text" name="writer_name" class="form-control" id="exampleInputEmail1" placeholder="{{__('trans.enterwriternae')}}" value="{{isset($fbook)?$fbook->writer_name:''}}">
</div>
<div class="form-group">
  <label for="name">{{__('trans.bookcat')}}</label>
<select class="form-control" name="category_id">
  @foreach($categories as $category)
  @if($category->available==='1')
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endif
  @endforeach
</select>
</div>
                    <div class="box ">
                      <div class="box-body pad">
                        <label for="name">{{__('trans.Bookdescription')}}</label>

                          <textarea id="editor1" class="form-control" name="description" placeholder="{{__('trans.enterdescription')}}" name="editor1" rows="10" cols="80">{{isset($fbook)?$fbook->description:''}}</textarea>

                      </div>
                    </div><!-- /.box -->
                    @if(isset($fbook))
                    <div class="form-group">
                      <label for="exampleInputFile">{{__('trans.bookimage')}}</label>
                      <br>
                      <img src="{{asset('storage/' . $fbook->image)}}" style="width:50px;" alt="">
                      <input type="file" name="image" id="exampleInputFile">
                    </div>
                    @else
                    <div class="form-group">
                      <label for="exampleInputFile">{{__('trans.bookimage')}}</label>
                      <input type="file" name="image" id="exampleInputFile">
                    </div>
                    @endif
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">{{isset($fbook)?__('trans.update'):__('trans.add')}}</button>
                    </div>
                    </div>
                </form>
                @endsection
