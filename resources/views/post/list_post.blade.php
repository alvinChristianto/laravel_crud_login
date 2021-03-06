@extends('layouts.app')
@section('title', 'List Post')
@section('main')

<div class="container">
   <div class="mt-3"><br><br></div>
    <div class="row justify-content-center">
        <div class="col-md-12 py-4">
            @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                  </div>
            @endif

            @if ($message = Session::get('nodata'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                  </div>
            @else
                <div class="list-group">
                @foreach ($listpost as $listpost)
                <a href="{{ route('preview', $listpost->id) }} " class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" >{{ $listpost->judul }}</h5>
                        <small>{{ $listpost->id }}</small>
                    </div>
                    <p class="mb-1">{{ $listpost->subjudul }}</p>
                    <small><i>{{ $listpost->created_at }} - <b>{{ $listpost->createby }}</b></i></small>
                </a>
                @endforeach
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
