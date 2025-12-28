<form action="{{ route('products.search') }}" method="POST" class="block mr-auto ml-auto w-fit">
    @csrf
    <div class="input-group border border-primary rounded-md flex">
        <input type="text" name="search" id="srch" class="form-control pl-2 text-xl" placeholder="Search products..." value="{{ old('search',$srch??'') }}">
        <button type="submit" class="btn btn-primary text-xl">Search</button>
    </div>
</form>

<br>
