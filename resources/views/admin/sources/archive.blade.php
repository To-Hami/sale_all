@extends('layouts.admin.app')
@section('content')


    <a class="btn btn-success text-center my-5" href="{{route('admin.sources.create')}}">
    @lang('site.create')
    </a>

    <a class="btn btn-danger text-center my-5" href="{{route('admin.sources.archive')}}">
    @lang('site.archive')
    </a>



            <table class=" table table-striped table-hover table-responsive">

                <thead>
                <tr>
                    <th> #</th>
                    <th>@lang('clients.name') </th>
                    <th>@lang('site.description') </th>
                    <th>@lang('site.created_by') </th>
                    <th>@lang('site.actions') </th>
                   
                </tr>
                </thead>

                <tbody>
                @if($sources->count() > 0)
                    @foreach($sources as $sourec)

                        <tr>
                            <td>{{$sourec->id}}</td>
                            <td>{{$sourec->name}}</td>
                            <td>{{$sourec->description}}</td>
                           
                            <td>{{$sourec->created_by ?? '----'}}</td>
                          <td>

                                   <a class=" nodecor mainColor" 
                                      href="{{route('admin.sources.restore',$sourec->id)}}">
                                      <i class="fa fa-edit mainColor"></i> 
                                   </a> 
                            </td> 
                        </tr>
                    @endforeach
                @else()
                    <tr>
                        <h2 class="text-center">Sorry no data found</h2>

                    </tr>
                @endif
                </tbody>

            </table>
    <div class="text-center"> {{$sources->links()}}</div>






@endsection
