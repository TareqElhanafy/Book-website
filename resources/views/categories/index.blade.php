@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">{{__('trans.category')}}</h3>
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

                <form class="form-horizontal" action="{{route('categories.store')}}" method="post">
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">{{__('trans.addcat')}}</label>
                      <div class="col-sm-5">
                  <input type="text" class="form-control" id="inputEmail3"  name="name" placeholder="{{__('trans.catname')}}">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">

                    <button type="submit" class="btn btn-info pull-right">{{__('trans.add')}}</button>
                  </div><!-- /.box-footer -->
                </form>
              </div>
</div>

  <div class="row">
    <div class="col-xs-12">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{__('trans.category')}}</h3>
  </div>
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
      <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">

<th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.catname')}}</th>
    <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.status')}}</th>
    <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.bookscount')}}</th>
                              </tr>
                              </tr>

                        </thead>
                        <tbody>
                      @foreach($categories as $category)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$category->name}}</td>
                            <td>
                              @if($category->available==='1')
                              {{__('trans.Available')}}
                              @else
                              {{__('trans.unAvailable')}}
                                @endif
                            </td>
                            <td class="sorting_1">{{$category->fbooks()->count()}}</td>

                            <td>
                              <a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning">{{__('trans.Edit')}}</a>
                            </td>
                            @if($category->available==='0')
                            <form class="" action="{{route('makecatavailable',$category->id)}}" method="post">
  @csrf
  @method('PUT')
  <td>
  <button type="submit" class="btn btn-success">{{__('trans.makeavailable')}}</button>

  </td>
  </form>
  @else
  <form class="" action="{{route('makecatunavailable',$category->id)}}" method="post">
  @csrf
  @method('PUT')
  <td>
  <button type="submit" class="btn btn-primary">{{__('trans.makeunavailable')}}</button>
  </td>
  </form>
  @endif
                            <td>
                              <form class="" action="{{route('categories.destroy',$category->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('trans.delete')}}</button>

                              </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>

                      </table>
                    </div>
                  </div>


                  <div class="row">
                    <!-- <div class="col-sm-5">
                      <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                    </div> -->
                    <div class="col-lg-8 text-center">
                      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              {{$categories->links()}}
                  </div>
                </div>
              </div>



            </div>
  </div>
</div>
    </div>
  </div>


@endsection
