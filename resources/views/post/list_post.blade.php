@extends('layouts.app')
@section('main')
<div class="container">
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
                <a href="{{ route('create') }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1" >{{ $listpost->judul }}</h5>
                        <small>3 days ago</small>
                    </div>
                    <p class="mb-1">{{ $listpost->subjudul }}</p>
                    <small><i>{{ $listpost->created_at }}</i></small>
                </a>
                @endforeach
                </div>
            @endif
            
        </div>
    </div>
</div>
@endsection
