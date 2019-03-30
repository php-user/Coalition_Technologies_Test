@extends('layouts.app')
@section('title', "| Home")

@section('content')

<div class="row">

    <div class="col-sm-12">
        <h3>Create product</h3>

        <product route="{{ route('product.add') }}"></product>
    </div>

    

    @if(!$products)
        <h3>List is empty</h3>
    @else 
        @foreach($products as $product)
        <?php var_dump($product); ?>
            
           
        @endforeach
    @endif

</div>

@endsection