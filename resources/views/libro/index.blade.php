   @extends('app')
   @section('content')
    <div class="card">
       @if (session('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ session('success') }}</p> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
         
       @endif
        <div class="card-header">
            <form class="row row-cols-auto g-1" method="GET" action="">
                <div class="col">
                    <input class="form-control" type="text" name="q" value="{{ $q }}" id="" placeholder="Search here...">
                </div> 
                
                <div class="col">
                    <button class="btn btn-success">Refresh</button>
                    <a class="btn btn-danger" href="{{route('libro.create')}}">Add</a>
                </div>
            </form>
        </div>

        <div class="card-body">
           
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    
                    <th>Actions</th>
                </thead>
                <?php $no = 1;?>
             @foreach ($libro as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td> {{number_format($item->precio, 0, ',', '.');}}</td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="{{ route('libro.edit', $item->id) }}">Edit</a>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Delete
                          </button>

                    </td>
                </tr>
            @endforeach
            
            </table>

            <!-- Button trigger modal -->

  
  <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
                  <div class="modal-body">
                       Are you ready?
                 </div>
                 <div class="modal-footer">
                      <form action="{{route('libro.destroy', $item)  }}" method="post">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
            </form>
               </div>
            </div>
        </div>
  </div>
          
        </div>

    </div>


   
    

@endsection