@extends('layout.app')

@section('content')
    <div class="card p-5">
        <div class="card-header">
            <h2>MODIFICAR PRODUCTO</h2>
        </div>
        <div class="card-body">
            <form action="{{route('products.update',$product->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value={{$product->name}}>
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" name="description" id="description" class="form-control" value={{$product->description}}>
                </div>
                <div class="form-group">
                    <label>Precio</label>
                    <input type="text" name="price" id="price" class="form-control" value={{$product->price}}>
                </div>
                <div class="p-3 d-flex flex-row-reverse">
                    <button type ="submit" class="btn btn-success rounded-pill px-3">Guardar</button>
                    <a href={{route('products.index')}} class="btn btn-danger rounded-pill px-3"> Cancelar</a>
                </div>
            </form>
        </div>
    </div>

@endsection
