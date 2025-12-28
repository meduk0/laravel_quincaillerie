<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private function fix_entry($ch) : string {
        $unwanted_array = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E','Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U','Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y');
        $ch=strtr(trim($ch), $unwanted_array);
        $replacementMap = [
            "\0" => "\\0",
            "\n" => "\\n",
            "\r" => "\\r",
            "\t" => "\\t",
            chr(26) => "\\Z",
            chr(8) => "\\b",
            '"' => '\"',
            "'" => "\'",
            '_' => "\_",
            "%" => "\%",
            '\\' => '\\\\'
        ];
        return strtr($ch, $replacementMap);
    }

    /*public function redirect_search(Request $request){
            
            return redirect()->route('products.search', $req['search']);
        }*/

    public function search(Request $request){
        $req=$request->validate(['search' => ['required', 'string', 'max:255']]);

        $search = $this->fix_entry($req['search']);

        $words = explode(' ', $search);

        // Start with all products
        $query = Product::query();

        // If a search term is present, add the where clause
        if ($search) {
            $query->where(function ($query) use ($words){
                for ($i=count($words); $i > 0 ; $i--) {
                    $w=implode(' ' ,array_slice($words,0,$i));
                    $query->orWhere('prod_nom', 'LIKE', "$w%");
                }
            });#'prod_nom', 'LIKE', "%{$words[$i]}%")->orWhere('descr', 'LIKE', "%{$search}%");

        }

        $products = $query->limit(20)->get();
        return view('products.index', [
            'productsS' => $products,
            'srch' => $search,
        ]);
    }

    /**
     * Serve product image. Tries DB `products_images` table first,
     * then local `public/product_images`, then falls back to external host.
     */
    public function image(Product $product)
    {
        // Try DB table first (if present)
        try {
            $img = DB::table('products_images')
                ->where('product_id', $product->id)
                ->orWhere('id', $product->img_id)
                ->first();
        } catch (\Exception $e) {
            $img = null;
        }

        if ($img) {
            if (isset($img->data) && $img->data) {
                $mime = $img->kind ?? ($product->kind ?? 'image/jpeg');
                return Response::make($img->data, 200, ['Content-Type' => $mime]);
            }

            $pathField = $img->path ?? $img->img_path ?? null;
            if ($pathField) {
                $local = public_path('product_images/' . basename($pathField));
                if (File::exists($local)) {
                    return Response::file($local);
                }
            }
        }

        // Local public folder
        if ($product->img_path) {
            $local = public_path('product_images/' . $product->img_path);
            if (File::exists($local)) {
                return Response::file($local);
            }
        }

        // Final fallback: external host (disabled here — handled by redirect if needed)
        /*$external = 'https://achserver.servehttp.com/other/Stage/product_images/' . ($product->img_path ?? '');
        return redirect()->away($external);*/
    }

    public function index(){
        $products = Product::latest()->paginate(51);
        /*foreach ($_SERVER as $key => $value) {
            Log::info("she did enter: ".$key ."=>". $value);
        }*/
        // Log::info("she did enter: ". $_SERVER['HTTP_X_REAL_IP']);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Log::info("she did cr: ". $_SERVER['HTTP_X_REAL_IP']);
        $categories=Category::all();
        return view('products.create', compact('categories'));
    }

    private function confirmpasswd($psw):bool{
        return !Hash::check( $psw,'$2y$12$xNztLbkyoAW2qY6u2wEIZOI6bo39JULBbJOcI/9EAm5ol6hjY74aC');    }

    private function sift(Request $request){
        $validated = $request->validate([
            'prod_nom' => 'required|max:255|min:3',
            'descr' => 'nullable',
            'prix' => 'required|numeric|between:.1,50000',
            'qte' => 'required|integer|between:1,50000',
            'cat_id' => 'required|exists:categories,id',
            'passwd' => 'required|string',
            'img_path' => 'image|mimes:png,jpeg,jpg|max:2048|dimensions:min_width:100,min_height:100,max_width:2000,max_height:1000'
        ]);
        if($this->confirmpasswd($validated['passwd']))return ['passwd' => 'wrong password'];

        if ($request->hasFile('img_path')) {
            try {
            $path = $validated['prod_nom'] . '~' . rand(1000,9999) . '.' . $request->file('img_path')->extension();
            $request->file('img_path')->move(public_path('product_images'), $path);
            } catch (Exception $e) {
                //Log::error("Error uploading image: " . $e->getMessage());
                return ['img_path' => 'Failed to upload image'];
            }
        $validated['ref'] = rand(100, 999).strtoupper(substr($validated['prod_nom'], 0, 3)).rand(100, 999);
        $validated['img_path']=pathinfo($path, PATHINFO_BASENAME);
            switch (pathinfo($path, PATHINFO_EXTENSION)) {
                case 'jpg':
                case 'jpeg':
                    $mime='jpeg';
                    break;
                case 'png':
                    $mime='png';
                    break;
                default: return ['img_path' => 'Failed to upload image /mime:'.$path." ".pathinfo($path, PATHINFO_EXTENSION)];
            }
            $validated['kind']=$mime;
            // You can also use the following method to store the image at a specific directory:
            // $path = $request->file('img_upload')->move(public_path('other/Stage/product_images'), 'image.jpg');
        }
        unset($validated['passwd']);
        return $validated;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Log::info("she did c: ". $_SERVER['HTTP_X_REAL_IP']);
        $validated=$this->sift($request);
        if (!isset($validated['qte'])){
            return redirect()->back()->withErrors($validated);
        }
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product created!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //Log::info("she did u: ". $_SERVER['HTTP_X_REAL_IP']);
        $validated=$this->sift($request);
        
        if (!isset($validated['qte'])){
            return redirect()->back()->withErrors($validated);
        }

        $nm=$product->prod_nom;
        $product->update($validated);
        return redirect()->route('products.index')->with('success', "\"$nm\" updated!");
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Request $request, Product $product)
    {
        //Log::info("she did d: ". $_SERVER['HTTP_X_REAL_IP']);
        $validated=$request->validate(['passwd' => 'required|string']);
        if($this->confirmpasswd($validated['passwd']))return back();
        $nm=$product->prod_nom;
        $product->delete();
        return redirect()->route('products.index')->with('success', "\"$nm\" deleted!");
    }
}
