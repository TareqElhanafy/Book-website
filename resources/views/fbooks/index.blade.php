@extends('layouts.profile')
@section('content')

  <div class="row">
    <div class="col-xs-12">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{__('trans.FreeBooks')}}</h3>
  </div>
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.Bookname')}}</th>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.writer')}}</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.bookcat')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.Bookdescription')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.bookimage')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.status')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.commnumber')}}</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.discussion')}}</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.Bookviews')}}</th>

</thead>
                        <tbody>
                      @foreach($fbooks as $fbook)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                              @if($fbook->available=='1')
                              <a href="{{route('bookshow',$fbook->id)}}">
                              {{$fbook->name}}
                              </a>
                              @else 
                              {{$fbook->name}}
@endif
                            </td>
                              <td>{{$fbook->writer_name}}</td>
                              <td>{{$fbook->category->name}}</td>
                            <td>{{$fbook->description}}</td>
                            <td>
                              <img src="{{asset('storage/' . $fbook->image)}}" style="width:70px;" alt="">

                            </td>

                            <td>

                              @if($fbook->available==='1')
                              {{__('trans.Available')}}
                              @else
                              {{__('trans.unAvailable')}}
                                @endif
                            </td>
                            <td>{{$fbook->comments->count()}}</td>

                            
                            <td>
                                        @if(isset($fbook->discussion))
                              <a href="{{route('discussions.show',[$fbook->id,$fbook->discussion->id])}}">
                              {{$fbook->discussion->title}}
                                 </a>
                                 </td>
                            @endif
                            <td>{{$fbook->views}}</td>

                            <td>
  <a href="{{route('fbooks.edit',$fbook->id)}}" class="btn btn-primary">{{__('trans.Edit')}}</a>
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
              {{$fbooks->links()}}
                  </div>
                </div>
              </div>
            </div>
  </div>
</div>
    </div>
  </div>



@endsection
