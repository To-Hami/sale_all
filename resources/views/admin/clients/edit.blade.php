@extends('layouts.admin.app')
@section('content')





<div class="container-fluied mainsheet">
    <div class="box-body   ">
        <!-- @include('admin.partials._errors') -->

        <form action="{{route('admin.clients.update',$client->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('put')}}
            
            <div class="row my-1">   

                    <div class="col-3">  
                        <label class=" ">@lang('clients.name')   @lang('clients.workspace') 
                              <span class="text-danger">*</span></label>
                            <input type="text"  class="form-control"
                            name="workspace" value="{{old('workspace',$client->workspace)}}"
                            required>

                            @error('workspace')
                            <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                            @enderror
                    </div>

                    <div class="col-3">
                        <label class=" ">@lang('clients.states')</label>
                        <select name="states" class="form-control">
                            <option value="">@lang('clients.select')  @lang('clients.states') </option>

                            <option value="1" {{old('states',$client->states) == 1 ? 'selected' : ''}}> @lang('clients.onwork')</option>
                            <option value="2" {{old('states',$client->states) == 2 ? 'selected' : ''}}>@lang('clients.stoped')</option>

                        </select>

                        @error('states')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class=" ">@lang('clients.kind')  @lang('clients.workspace')</label>
                        <select name="kind" class="form-control">
                            <option value="">@lang('clients.select') </option>

                            <option value="1" {{old('kind',$client->kind) == 1 ? 'selected' : ''}}> @lang('clients.one')</option>
                            <option value="2" {{old('kind',$client->kind) == 2 ? 'selected' : ''}}>@lang('clients.manywork')</option>
                            <option value="3" {{old('kind',$client->kind) == 3 ? 'selected' : ''}}>@lang('clients.goverment')</option>

                        </select>

                        @error('kind')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                    </div>

                    <div class="col-3">  
                        <label class=" ">@lang('clients.address') </label>
                            <input type="text" 
                            class="form-control"
                            name="address"
                            value="{{old('address',$client->address)}}"
                            >

                            @error('address')
                            <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                            @enderror
                    </div>
          </div>   
        

            <div class="row my-1">   

                <div class="col-3">  
                    <label class=" ">@lang('clients.cr')  </label>
                        <input type="number"  class="form-control"
                        name="cr" value="{{old('cr',$client->cr)}}"
                        >

                        @error('cr')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.site')  </label>
                        <input type="text"  class="form-control"
                        name="site" value="{{old('site',$client->site)}}"
                        >

                        @error('site')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.iban')  </label>
                        <input type="number"  class="form-control"
                        name="iban" value="{{old('iban',$client->iban)}}"
                        >

                        @error('iban')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.ap_name')  </label>
                        <input type="text"  class="form-control"
                        name="ap_name" value="{{old('ap_name',$client->ap_name)}}"
                        >

                        @error('ap_name')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.ap_mobile')  </label>
                        <input type="number"  class="form-control"
                        name="ap_mobile" value="{{old('ap_mobile',$client->ap_mobile)}}"
                        >

                        @error('ap_mobile')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.ap_email')  </label>
                        <input type="email"  class="form-control"
                        name="ap_email" value="{{old('ap_email',$client->ap_email)}}"
                        >

                        @error('ap_email')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>


                <div class="col-3">  
                    <label class=" ">@lang('clients.p_o_box')  </label>
                        <input type="text"  class="form-control"
                        name="p_o_box" value="{{old('p_o_box',$client->p_o_box)}}"
                        >
                        @error('p_o_box')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.asign_by')  </label>
                    <select name="user_id" class="form-control">
                        <option value="">@lang('clients.asign_by') </option>
                        @foreach($users as $user)
                             <option value="{{$user->id}}" {{$user->id  == $client->user_id ? 'selected' : ''  }} > {{$user->name}}</option>
                        @endforeach
                    </select> 
                    
                    @error('user_id')
                    <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                    @enderror
                </div>

            </div>

            <div class="row my-1">   

              

                <div class="col-3">  
                    <label class=" ">@lang('clients.city')  </label>
                        <input type="text"  class="form-control"
                        name="city" value="{{old('city',$client->city)}}"
                        >

                        @error('city')
                        <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                        @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.source')  </label>
                    <select name="source_id" class="form-control">
                        <option value="">@lang('clients.select_source') </option>
                        @foreach($sources as $source)
                             <option value="{{$source->id}}" {{$source->id  == $client->source_id ? 'selected' : ''  }} > {{$source->name}}</option>
                        @endforeach
                    </select> 
                    
                    @error('source_id')
                    <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                    @enderror
                </div>

                <div class="col-3">  
                    <label class=" ">@lang('clients.notes')  </label>
                        <textarea type="text" 
                         class="form-control"
                         name="notes"  >
                       
                         {{old('notes',$client->notes)}}
                       </textarea>

                       @error('notes')
                       <span class="alert alert-danger p-0 m-0"> {{$message}} </span>
                       @enderror
                   
                </div>




            </div>
           
            <button type="submit" class="btn btn-primary ">
                <i class="fa fa-plus mx-2"></i>Update
            </button>
              
        </form>
        

    </div>



</div>


@endsection
