<label class="form-control w-full">
    <input 
        type="text" 
        name="prod_nom" 
        value="{{ old('prod_nom', $product->prod_nom ?? '') }}" 
        placeholder="Enter product name" 
        class="input-xl input-bordered w-full @error('prod_nom') input-error @enderror"
        required
    />
    @error('prod_nom')
        <div class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror
</label>
<br>
<br>
<label class="form-control w-full col-start-1 col-end-3">
    <br>
    <textarea 
        name="descr" 
        placeholder="Text or HTML code"
        class="textarea textarea-bordered h-24 @error('descr') textarea-error @enderror w-full col-start-1 col-end-3">
{{ old('descr', $product->descr ?? '') }}</textarea>
    @error('descr')
        <div class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
        </div>
    @enderror
</label>

<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
    <label class="form-control w-full">
        <div class="label">
            <span class="label-text text-xl">Price</span>
        </div>
        <input 
            type="number" 
            name="prix" 
            value="{{ old('prix', $product->prix ?? '') }}" 
            placeholder="0.00" 
            step="0.01" 
            min="0"
            class="input-xl input-bordered w-full @error('prix') input-error @enderror"
            required
        />
        @error('prix')
            <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
        @enderror
    </label>

    <label class="form-control w-full">
        <div class="label">
            <span class="label-text text-xl">Stock</span>
        </div>
        <input
            type="number" 
            name="qte" 
            value="{{ old('qte', $product->qte ?? '') }}" 
            placeholder="0" 
            min="0"
            class="input-xl input-bordered w-full @error('qte') input-error @enderror"
            required
        />
        @error('qte')
            <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
        @enderror
    </label>

    <select class="select" name="cat_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
            @selected ($category->id == old('cat_id', isset($product)?$product->cat_id:''))>
                {{ $category->prod_type }}
            </option>
        @endforeach
    </select>

        <input
            type="password" 
            name="passwd" 
            value="{{ old('passwd', '') }}"
            placeholder="password"
            class="input input-bordered w-full @error('passwd') input-error @enderror"
            required
        />
        
        @error('passwd')
            <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
        @enderror

        <fieldset class="fieldset w-full col-start-1 col-end-3">
            <legend class="fieldset-legend text-xl">Pick a file</legend>
            <input type="file" name="img_path" class="file-input w-full text-xl" />
            <p class="label text-md">Max size 2MB</p>
        </fieldset>

        @error('img_path')
            <div class="label">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
        @enderror
</div>
