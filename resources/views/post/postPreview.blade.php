@extends('layouts.app')

@section('main')

    <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>{{ $listpost -> judul }}</h1>
              <h2 class="subheading">{{ $listpost -> subjudul }}</h2>
              <span class="meta">Posted by
                <a href="#">{{ $listpost -> createby }}</a>
                on {{ $listpost -> created_at }}</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p>{{ $listpost -> para1 }}</p>
            <p>{{ $listpost -> para2 }}</p>
            
            <h2 class="section-heading">The Final Frontier</h2>

            <blockquote class="blockquote">The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote>

            <p>{{ $listpost -> para3 }}</p>


            <a href="#">
              <img class="img-fluid" src="img/post-sample-image.jpg" alt="">
            </a>
            <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>

            
            <p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there’s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>

            </div>
        </div>
      </div>
    </article>
    <hr>

    @endsection
   