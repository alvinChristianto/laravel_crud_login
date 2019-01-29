@extends('layouts.app')
@section('title', 'List Post')
@section('main')

<div class="container">
   <div class="mt-3"><br><br></div>
    <div class="row justify-content-center">
        <div class="col-md-12 py-4">
           <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Role id</th>
                </tr>
              </thead>
              <tbody>
              <?php $num = 1  ?>
              @foreach ($alluser as $alluser1)
                <tr>
                  <th scope="row"><?php echo $num ?></th>
                  <td>
                      <a href="{{ $alluser1 -> id }}"> 
                        {{ $alluser1 -> username }} 
                      </a>
                  </td>
                  <td>{{ $alluser1 -> email }}</td>
                  <td>{{ $alluser1 -> role_id }}</td>
                </tr>
                <?php $num = $num + 1 ?>
              @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
