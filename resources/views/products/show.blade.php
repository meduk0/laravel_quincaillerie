@extends('layouts.app')

@section('title', $product->prod_nom)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('products.index') }}">Products</a></li>
                <li>{{ $product->prod_nom }}</li>
            </ul>
        </div>
    </div>

    <div class="card card-border bg-base-100 shadow-xl">
        <div class="card-body">
            <div class="flex justify-between items-start">
                <h1 class="card-title text-4xl">{{ $product->prod_nom }}</h1>
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow">
                        <li><a href="{{ route('products.edit', $product) }}" class="text-xl">Edit</a></li>
                        <li>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-error w-full text-left text-xl">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="divider"></div>

            <div class="grid grid-cols-1 gap-6">
                <div>
                    <h3 class="text-lg font-semibold text-xl mb-2">Description</h3>
                    <p class="text-md">{!! trim(str_replace( '><br><','><',$product->descr,), $characters = " \n\r\t\v\x00") ?: 'No description provided' !!}</p>
                </div>

                <div class="space-y-4 mr-auto ml-auto">
                    <div class="stats stats-vertical lg:stats-horizontal shadow">
                        <div class="stat">
                            <div class="stat-title text-xl">Price</div>
                            <div class="stat-value text-primary">${{ number_format($product->prix, 2) }}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-title text-xl">Stock</div>
                            <div class="stat-value text-secondary">{{ $product->qte }}</div>
                        </div>
                    </div>

                    <div class="alert alert-info mr-auto ml-auto w-fit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <div class="text-xl">
                            <div>Created: {{ $product->created_at->format('M d, Y') }}</div>
                            <div>Updated: {{ $product->updated_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-actions justify-end mt-6 mr-auto ml-auto">
                <a href="{{ route('products.index') }}" class="btn btn-ghost">Back to List</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Edit Product</a>
            </div>
        </div>
    </div>
</div>
@endsection
