@extends('layouts.app')
@section('title', 'Create post')
@section('main')
<main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 py-4">
                    <div class="card">
                        <div class="card-header text-capitalize">tambah data</div>
                           
                        <div class="card-body">
                           <form name="createBlogForm" method="POST" action="{{ url(action('createController@sendPost')) }}" onsubmit="return validateForm()" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="formGroupExampleInput">Judul </label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="judul" value="{{old('judul')}}">
                            @foreach ($errors->get('judul') as $message) 
                                <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                            @endforeach    
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">SubJudul (entry summary)</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="subjudul"  value="{{old('subjudul')}}">
                            @foreach ($errors->get('subjudul') as $message) 
                                <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                            @endforeach    
                            
                            </div>
                            <div class="form-group">
                                @if (Session::has('Session_email')) 
                                <label for="formGroupExampleInput2">diterbitkan oleh</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="" name="by"  value="{{ Session::get('Session_username') }}" readonly="readonly">
                                @endif
                            </div>
                            <hr style="border-top: 3px solid rgb(249, 105, 105);">
                            <div class="form-group">
                                <label for="formGroupExampleInput2">paragrap 1</label>
                                <textarea rows="7"type="text" class="form-control" id="formGroupExampleInput2" placeholder="paragrap 1" name="para1"></textarea>
                            @foreach ($errors->get('para1') as $message) 
                                <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                            @endforeach    
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">paragrap 2</label>
                                <textarea rows="7"type="text" class="form-control" id="formGroupExampleInput2" placeholder="paragrap 2" name="para2" >{{old('p2')}}</textarea>
                            @foreach ($errors->get('para2') as $message) 
                                <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                            @endforeach    
                               
                            </div> 
                            <div class="form-group">
                                <label for="formGroupExampleInput2">paragrap 3</label>
                                <textarea rows="7" type="text" class="form-control" id="formGroupExampleInput2" placeholder="paragrap 3" name="para3"  ></textarea>
                            @foreach ($errors->get('para3') as $message) 
                                <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                            @endforeach    
                                
                            </div>
                            <hr style="border-top: 3px solid rgb(249, 105, 105);">
                            
                            <div class="form-group">
                                <label>Upload Image</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default">
                                            <input type="file" name="image" accept=".jpg,.jpeg,.png">
                                        </span>
                                        @foreach ($errors->get('image') as $message) 
                                            <span class="error-span text-danger text-weight-bold">{{ $message }} </span>
                                        @endforeach    
                                    </span>

                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-primary text-capitalize">
                                     Post
                                 </button>
                             </div>
                         </div>

                     </form>

                 </div>
                </div>
            </div>
        </div>
</main>
@endsection
