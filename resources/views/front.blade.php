
@extends('layouts.app')
@if (Session::has('Session_email'))
    @section('title', 'login')
@else
    @section('title', 'welcome')
@endif

@section('main')

    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
            @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block mt-2">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{{ $message }}</strong>
                  </div>
            @endif

              @if (Session::has('Session_email'))
              <h2><b>Welcome, <i>{{ Session::get('Session_email') }}</i></b></h2>
              <span class="subheading">Create Something please</span>
              @else
              <h1>Happy Work</h1>
              <span class="subheading">Gain more knowledge, dont <i> dissapoint </i> me</span>
              @endif
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    
    @if (Session::has('Session_email') != 1)
    @if ($message = Session::get('nodata'))
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong>{{ $message }}</strong>
                  </div>
    @else
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach ($listpost as $listpost1)
          <div class="post-preview">
            <a href="{{ route('post', $listpost1->id) }}">
              <h2 class="post-title">
                {{ $listpost1 -> judul }}
              </h2>
              <h4 class="post-subtitle">
                {{ $listpost1 -> subjudul }}  
              </h4>
            </a>
            <p class="post-meta">Posted by
              <a href="#">{{ $listpost1 -> createby }}</a>
              on {{ $listpost1 -> created_at }}</p>
          </div>
          <hr>
          @endforeach
          
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
    <hr>
    @endif
    @endif
    @endsection
   