@extends('layouts.admin.app')
@section('content')





<div class="container-fluied mainsheet">
    <div class="box-body   ">
        <!-- {{-- @include('admin.partials._errors') --}} -->

        <form action="{{route('admin.sources.store')}}" method="post">
            {{csrf_field()}}
            {{method_field('post')}}
            
            <div class="row my-1">   

                    <div class="col-3">  
                        <label class=" ">@lang('site.name')  
                              <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control"
                            name="name" value="{{old('name')}}"
                            required>

                            @error('name')
                            <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                           @enderror

                            <input type="hidden"  class="form-control"
                            name="created_by" 
                            >
                    </div>

                  

                    <div class="col-6">  
                        <label class=" ">@lang('site.description') </label>
                            <input type="text" 
                            class="form-control"
                            name="description"
                            value="{{old('description')}}"
                            >

                            @error('description')
                            <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                           @enderror
                    </div>
          </div>   
        

           
            <button type="submit" class="btn btn-primary ">
                <i class="fa fa-plus mx-2"></i>@lang('site.create')
            </button>
              
        </form>
        

    </div>



</div>


@endsection
