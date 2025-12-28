@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Edit Product</h1>
        <div class="breadcrumbs text-xl mt-2">
            <ul>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li><a href="{{ route('products.show', $product) }}">{{ $product->prod_nom }}</a></li>
                <li>Edit</li>
            </ul>
        </div>
    </div>

    <div class="card card-border bg-base-100 shadow-xl">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('products.partials.form')
                
                <div class="card-actions justify-center mt-6">
                    <button type="submit" class="btn btn-primary text-xl">Update Product</button>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-ghost">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
