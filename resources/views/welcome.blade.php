
@extends('layouts.app')
@section('title', 'home')
        
@section('main')

  <div class="container">
       
        <div class="content">
        @if (Session::has('email'))
            <div class="title m-b-md">
                Welcome 
            </div>
            <div class="links">
                <a>welcome, <i>{{ Session::get('email') }}</i> </a>
                
            </div>
        @else
            <div class="title m-b-md">
                 <a>LARAVEL</a>
            </div>
            <div class="links">
                <a>welcome, you are not login!</a>
            </div>

        @endif
        </div>
        
    </div>
@endsection