@extends('layouts.admin')
@section('content')

  <div class="row">
    <div class="col-xs-12">
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{__('trans.users')}}</h3>
  </div>
  <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                        <thead>
                          <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" aria-sort="descending">{{__('trans.username')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">{{__('trans.useremail')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.role')}}</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">{{__('trans.status')}}</th>
                        </thead>
                        <tbody>
                      @foreach($users as $user)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                              
                            <td>

                              @if($user->isOnline())
                              {{__('trans.status1')}}
                              @else
                              {{__('trans.status2')}}
                              @endif

                            </td>
                           
                             @if($user->role==='regular')
                            <td><a href="{{route('make.admin',$user->id)}}" class="btn btn-success">{{__('trans.makeadmin')}}</a></td>
                               @endif
                               @if($user->role==='admin')
                            <td><a href="{{route('remove.admin',$user->id)}}"class="btn btn-warning">{{__('trans.removeadmin')}}</a></td>
                            @endif
                            
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
              {{$users->links()}}
                  </div>
                </div>
              </div>
            </div>
  </div>
</div>
    </div>
  </div>



@endsection
