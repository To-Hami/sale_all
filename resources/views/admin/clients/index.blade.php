@extends('layouts.admin.app')
@section('content')


    <a class="btn btn-success text-center my-5" href="{{route('admin.clients.create')}}">
        @lang('site.create')
    </a>

    <a class="btn btn-danger text-center my-5" href="{{route('admin.clients.archive')}}">
    @lang('site.archive')
    </a>

    <a class="btn btn-danger text-center my-5" href="{{route('admin.clients.activity')}}">
    @lang('site.activity')
    </a>



            <table class=" table table-striped table-hover table-responsive">

                <thead>
                <tr>
                    <th> #</th>
                    <th>@lang('clients.name')   @lang('clients.workspace') </th>
                    <th> @lang('clients.states')</th>
                    <th>  @lang('clients.kind')  @lang('clients.workspace')</th>
                    <th>   @lang('clients.address')</th>
                    <th>   @lang('clients.cr') </th>
                    <th>   @lang('clients.site')</th>
                    <th>    @lang('clients.iban')</th>
                    <th>    @lang('clients.ap_name') </th>
                    <th>     @lang('clients.ap_mobile')</th>
                    <th>     @lang('clients.ap_email')</th>
                    <th>    @lang('clients.asign_by') </th>
                    <th>     @lang('clients.city')</th>
                    <th>    @lang('clients.source')</th>
                    <th>    @lang('clients.notes') </th>

                    <th> @lang('site.actions')</th>
                </tr>
                </thead>

                <tbody>
                @if($clients->count() > 0)
                    @foreach($clients as $client)

                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->workspace}}</td>
                            <td>{{$client->states == 1 ? 'ساري' :'معلق'}}</td>
                            <td>
                            @if($client->kind == 1)
                            فرد
                            @elseif($client->kind == 2) 
                            مؤسسة
                            @else   
                            قطاع حكومي
                            @endif
                            
                            </td>
                            <td>{{$client->address}}</td>
                            <td>{{$client->cr}}</td>
                            <td>{{$client->site}}</td>
                            <td>{{$client->iban}}</td>
                            <td>{{$client->ap_name}}</td>
                            <td>{{$client->ap_mobile}}</td>
                            <td>{{$client->ap_email}}</td>
                            <td>{{$client->user->name ?? '----'}}</td>
                            <td>{{$client->city}}</td>
                            <td>{{$client->source->name ?? '----'}}</td>
                            <td>{{$client->notes}}</td>

                            <td>

                                    <a class=" nodecor mainColor"   href="{{route('admin.clients.edit',$client->id)}}"><i class="fa fa-edit mainColor"></i>  </a>


                                    <form action="{{route('admin.clients.destroy',$client->id)}}"
                                          method="post" style="display: inline">
                                        {{csrf_field()}}
                                        {{method_field('delete')}}

                                        <button type="submit" class="delete  mainColor" >
                                            <i class="fa fa-trash  "> </i> </button>
                                    </form>

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
    <div class="text-center"> {{$clients->links()}}</div>






@endsection
