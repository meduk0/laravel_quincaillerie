@extends('layouts.app')

@section('title', 'Products')

@section('content')


@if(session('success'))
    <div id="success-alert" role="alert" id='success-alert' class="alert alert-success alert-soft shadow-lg max-w-md pointer-events-auto flex items-center gap-4 transition-all duration-500 ease-out transform -translate-y-[200%] opacity-0 w-fit mr-auto ml-auto">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <div>
        <h3 class="font-bold">Success!</h3>
        <div class="text-xs">{{ session('success') }}</div>
      </div>
      <button onclick="hideAlert('success-alert')" class="btn btn-sm btn-circle btn-ghost">✕</button>
    </div>
    <script>
        
    function hideAlert(id) {
      const el = document.getElementById(id);
      // Add hidden state classes
      el.classList.add('-translate-y-[200%]', 'opacity-0');
      // Remove visible state classes
      el.classList.remove('translate-y-0', 'opacity-100');
    }
    function showAlert(id) {
      const el = document.getElementById(id);
      // Remove hidden state classes
      el.classList.remove('-translate-y-[200%]', 'opacity-0');
      // Add visible state classes (optional, as removing the negative translate usually defaults to 0, but being explicit helps)
      el.classList.add('translate-y-0', 'opacity-100');

      // Auto hide after 3 seconds
      setTimeout(() => {
        hideAlert(id);
      }, 3000);
    }
    showAlert('success-alert')
    </script>
@endif

@include("products.search")


@isset($productsS)
@if($productsS->count())
    <ul class="list bg-base-100 rounded-box shadow-md">
        <li class="p-4 pb-2 text-2xl opacity-60 tracking-wide mr-auto ml-auto">Les 20 produits les plus pertinentes à votre recherche</li>
        <br>
        @foreach ($productsS as $product)
            <li class="list-row mr-auto ml-auto" style="width: 1000px;">
                @if($product->img_path)
                            <figure style="margin: auto;">
                                <img src="{{ route('products.image', $product) }}" 
                                    alt="{{ $product->prod_nom }}" 
                                    class="w-full h-48 object-cover">
                            </figure>
                @endif
                <div class="list-col-grow text-3xl">
                <div>{{ $product->prod_nom }}</div>
                <div class="text-xl uppercase font-semibold opacity-60">{{ $product->prix }} Dt</div>
                </div>
                <a href="{{ route('products.show', $product) }}">
                    <button class="btn btn-square btn-ghost">
                    <svg class="size-[2.4em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor"><path d="M6 3L20 12 6 21 6 3z"></path></g></svg>
                    </button>
                </a>
            </li>
        @endforeach
    </ul>
@endif
@endisset

@isset($products)
@if($products->isEmpty())
    <div class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>No products found. Create your first product!</span>
    </div>
@else

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="card card-bordered border-2 border-[#D2D2D2] bg-base-200 shadow-xl">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->prod_nom }}</h1>
                    <div style="max-height:16rem;overflow-y:auto;">
                        {!! trim(str_replace( '><br><','><', str_replace('•','<br>•', $product->descr,)), $characters = " \n\r\t\v\x00") !!}<!--<p></p>Str::limit($product->descr, 100)-->
                    </div>
                    
                    <div class="divider"></div>
                    <div class="block">
                        <div class="flex gap-4 size-fit justify-between items-center mr-auto ml-auto mb-4">
                                <div class="badge badge-primary badge-lg text-xl">${{ number_format($product->prix, 2) }}</div>
                                <div class="badge badge-ghost badge-lg size-fit text-xl ml-2">Stock: {{ $product->qte }}</div>
                        </div>
                        
                        <div class="card-actions justify-end mr-auto ml-auto size-fit mb-4">
                            <a href="{{ route('products.show', $product) }}" class="btn text-xl btn-xl h-11">View</a>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary text-xl btn-xl h-11">Edit</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" id="f{{$product->id}}" class="inline">
                                @csrf
                                @method('DELETE')
                                <input type="text" id="delf{{$product->id}}" name="passwd" class="hidden">
                                <button type="button" class="btn btn-error btn-xl h-11 text-xl" onclick="copyvalue('f{{$product->id}}')">Delete</button>
                            </form>
                        </div>
                    </div>

                        @if($product->img_path)
                            <figure style="margin: auto;">
                                <img src="{{ route('products.image', $product) }}" 
                                    alt="{{ $product->prod_nom }}"
                                    class="w-full h-48 object-cover">
                            </figure>
                        @endif
                </div>
            </div>
        @endforeach
    </div>
        <div style="width: 65vw !important;" class="mr-auto mg-auto mt-8">
            {{ $products->links() }}
        </div>
@endif
@endisset
@endsection
<script>
    function copyvalue(id){
        document.getElementById("del"+id).value=document.getElementById("srch").value
        document.getElementById("srch").value=""
        document.getElementById(id).submit()
    }
</script>