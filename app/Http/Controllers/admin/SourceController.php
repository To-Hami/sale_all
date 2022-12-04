<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SourcesRequest;
use App\Models\Client;
use App\Models\Source;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SourceController extends Controller
{

   

    public function index()
    {
        $sourecs = Source::paginate(5);
        return view('admin.sources.index',compact('sourecs'));
    }
    

    public function create()
    {
      
        return view('admin.sources.create');
    }

    public function store(SourcesRequest $request)
    {
        Source::create($request->validated());
        session()->flash('success', __('site.created_succufully'));

        return redirect()->route('admin.sources.index');
    }


    public function edit(Source $source)
    {
        return view('admin.sources.edit',compact('source'));
    }

    public function update(SourcesRequest $request ,Source $source)
    {
        $source->update($request->validated());
        session()->flash('success',  __('site.Updated_succufully'));

        return redirect()->route('admin.sources.index');

    }


    public function bulkDelete(){

    }

    public function destroy(Source  $source)
    {        
        $source->delete();
        session()->flash('success',  __('site.dleted_succufully'));

        return redirect()->route('admin.sources.index');

    }

    public function archive(){
        $sources = Source::onlyTrashed()->paginate(5);
        return view('admin.sources.archive',compact('sources'));
    }

    public function restore( $source){

      $modeel = Source::class;
      $source = Source::whereId($source);
      dd($modeel);


    session()->flash('success', __('تم استعادة البيانات بنجاح'));
    return redirect()->route('admin.sources.index');


    }
}
