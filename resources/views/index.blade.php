@extends('layouts.app')
@section('title', "| Home")

@section('content')

<div class="mb-5">
    <product route="{{ route('product.add') }}"></product>
</div>

<div class="col-sm-12" ref="products">

    @if(!$products)
        <h3>List is empty</h3>
    @else 
        
        @foreach($products as $product)

        <div class="card shadow mb-4">
            <h4 class="card-header">Product:{{ $product['name'] }}</h4>
            <div class="card-body">
                <div>Quantity: {{ $product['quantity'] }}</div>
                <div>Price: {{ $product['price'] }}</div>
                <div>Total: {{ $product['total'] }}</div>
                <div>Date: {{ $product['datetime'] }}</div>
            </div>
        </div>
        
        @endforeach
        
    @endif

</div>

@endsection