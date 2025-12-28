@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Create New Product</h1>
        <div class="breadcrumbs text-sm mt-2">
            <ul>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li>Create</li>
            </ul>
        </div>
    </div>

    <div class="card card-border bg-base-100 shadow-xl">
        <div class="card-body">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('products.partials.form')
                
                <div class="card-actions justify-center mt-6">
                    <button type="submit" class="btn btn-primary text-xl">Create Product</button>
                    <a href="{{ route('products.index') }}" class="btn btn-ghost text-xl">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
