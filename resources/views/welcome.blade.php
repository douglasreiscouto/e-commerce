@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-deck">
            @foreach ($products as $product)             
            
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{$product->url}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$product->title}}</h5>
                            <p class="card-text">{{$product->description}}</p>  
                            <p class="card-text">R$ {{$product->amount}}</p> 
                            <div class = "d-flex justify-content-between aling-items-center">
                                <div class = "btn-group">
                                <a href="{{ route('store.products.show', ['product' => $product->id])}}" class = "btn btn-sm btn-outline-secundary">Visualizar</a>
                                    <a href="{{route('cart.store', ['product' => $product->id])}}" class = "btn btn-sm btn-outline-success">Comprar</a>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection