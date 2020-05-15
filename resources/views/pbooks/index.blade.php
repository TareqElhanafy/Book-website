@extends('layouts.admin')
@section('content')

  <div class="row">
    <div class="col-xs-12">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{__('trans.paidBooks')}}</h3>
  </div>
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.Bookname')}}</th>
  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.writer')}}</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.bookcat')}}</th>
<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.price')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.Bookdescription')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.bookimage')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.status')}}</th>
                        </thead>
                        <tbody>
                      @foreach($pbooks as $pbook)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$pbook->name}}</td>
                              <td>{{$pbook->writer_name}}</td>
                              <td>{{$pbook->category->name}}</td>
                              <td>{{$pbook->price}}</td>
                            <td>{{$pbook->description}}</td>
                            <td>
                              <img src="{{asset('storage/' . $pbook->image)}}" style="width:70px;" alt="">

                            </td>

                            <td>
                              @if($pbook->available==='1')
                              {{__('trans.Available')}}
                              @else
                              {{__('trans.unAvailable')}}
                                @endif
                            </td>
                            @if($pbook->available==='0')
                            <form class="" action="{{route('makepavailable',$pbook->id)}}" method="post">
@csrf
@method('PUT')
  <td>
<button type="submit" class="btn btn-warning">{{__('trans.makeavailable')}}</button>

</td>
</form>
@else
<form class="" action="{{route('makepunavailable',$pbook->id)}}" method="post">
@csrf
@method('PUT')
<td>
<button type="submit" class="btn btn-warning">{{__('trans.makeunavailable')}}</button>
</td>
</form>
@endif
<form class="" action="{{route('pbooks.destroy',$pbook->id)}}" method="post">
  @csrf
  @method('DELETE')
  <td>
    <input type="hidden" name="en" value="">
    <button type="submit" class="btn btn-danger">{{__('trans.delete')}}</button>
  </td>

</form>
<td>
  <a href="{{route('pbooks.edit',$pbook->id)}}" class="btn btn-primary">{{__('trans.Edit')}}</a>
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
              {{$pbooks->links()}}
                  </div>
                </div>
              </div>
            </div>
  </div>
</div>
    </div>
  </div>



@endsection
