@extends('layouts.app')
@section('title', 'python')
@section('main')

<div class="container">
   <div class="mt-3"><br><br></div>
    <div class="row justify-content-center">
        <div class="col-md-12 py-4">
           <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Id</th>
                  <th scope="col">Title</th>
                  <th scope="col">Rating</th>
                  <th scope="col">Detail</th>
                </tr>
              <?php $num = 1  ?>
              @foreach ($listData as $listData)
                <tr>
                  <td scope="col"><?php echo $num ?></td>
                  <td scope="col">{{ $listData -> movie_id}}</td>
                  <td scope="col">{{ $listData -> title}}</td>
                  <td scope="col">{{ $listData -> rating}}</td>
                  <td scope="col"><button type="button" class="btn btn-info">detail</button></td>
                </tr>
                
              <?php $num = $num + 1 ?>
              @endforeach
              </thead>
              <tbody>
              
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
