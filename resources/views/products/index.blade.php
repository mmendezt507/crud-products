@extends('layout.app')

@section('title','Lista de productos')

@section('content')
    <div class="container">
        <div class="p-3 d-flex flex-row-reverse">
            <a href={{route('products.create')}} class="btn btn-success rounded-pill px-3"> Agregar Nuevo Producto</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripci&oacute;n</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href={{route('products.delete',$product->id)}} class="btn btn-danger rounded-pill px-3"> Eliminar</a>
                            <a href={{route('products.edit',$product->id)}} class="btn btn-primary rounded-pill px-3">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
