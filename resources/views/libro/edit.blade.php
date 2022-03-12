@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if ($errors->any())
            @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
        @endif

        <form action="{{route('libro.update', $libro) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name <span class="text-danger"></span></label>
                    <input type="text" class="form-control" name="name" id="" value="{{old('name', $libro->name) }}" >
                </div>

                 <div class="mb-3">
                    <label for="">Precio <span class="text-danger"></span></label>
                    <input type="number" class="form-control" name="precio" id="" value="{{old('precio', $libro->precio) }}" >
                </div> 
                
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-danger" href="{{route('libro.index')}}">Back</a>
                </div>
       
        </form>
    </div>
</div>
@endsection