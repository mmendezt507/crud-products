@extends('layout.app')

@section('content')
    <div class="card p-5">
        <div class="card-header">
            <h2>REGISTRAR NUEVO PRODUCTO</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card-body">
            <form action="{{route('products.store')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name" class="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <textarea  name="description" id="description" class="form-control" rows="3"></textarea>
                    <!--<input type="text" name="description" id="description" class="form-control">-->
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>
                <div class="p-3 d-flex flex-row-reverse">
                    <button type ="submit" class="btn btn-success rounded-pill px-3">Guardar</button>
                    <a href={{route('products.index')}} class="btn btn-danger rounded-pill px-3"> Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
