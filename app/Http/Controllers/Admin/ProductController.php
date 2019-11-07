<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('id','desc')->paginate(2);
        return view('admin.product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['vendors'] = Vendor::all();
        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'stock' => 'required|int',
            'status' => 'required|in:'.Product::ACTIVE_STATUS.','.Product::INACTIVE_STATUS,
            'image.*' => 'mimes:jpeg,png',
        ]);
        DB::beginTransaction();
        try {
            $product = Product::create($request->all());

            if ($request->hasFile('image')) {
                foreach ($request->image as $file) {

                    $path = 'image/product';
                    $file->move($path, $file->getClientOriginalName());
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => $path . '/' . $file->getClientOriginalName()
                    ]);
                }
            }
            DB::commit();
        }catch (\Exception $exception)
        {
            DB::rollBack();
            Log::error($exception->getMessage());
        }

        session()->flash('message','Product created successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['categories'] = Category::all();
        $data['vendors'] = Vendor::all();
        $data['product'] = $product;
        $data['product_images'] = ProductImage::where('product_id',$product->id)->get();
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //

        $request->validate([
            'category_id' => 'required',
            'vendor_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'unit_price' => 'required',
            'stock' => 'required|int',
            'status' => 'required|in:'.Product::ACTIVE_STATUS.','.Product::INACTIVE_STATUS,
        ]);

        DB::beginTransaction();
        try{
            $product->update($request->except(['_token']));

            DB::commit();
        }catch (\Exception $exception){

            DB::rollBack();
            Log::error($exception->getMessage());
        }

        session()->flash('message','Product Updated successfully');
        return redirect()->route('product.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = ProductImage::where('product_id',$product->id)->get();
        foreach ($images as $image){
            if(file_exists($image->image))
            {
                unlink($image->image);
            }
            $image->destroy($image->id);
        }
        Product::destroy($product->id);
        session()->flash('message','Product deleted successfully');
        return redirect()->back();
    }

    // displaying all product images
    public function pictures($product_id){
        $data['product_id']=$product_id;
        $data['images'] = ProductImage::where('product_id',$product_id)->get();
        return view('admin.product.images',$data);
    }
    public function ins_p_img($productId){
        $data['product_id']=$productId;
        return view('admin.product.imageAdd',$data);

    }
    //upddating a single product image
    public  function updateImage(Request $request, $imageId){
        $request->validate([
//            'image' => '',
            'image' => 'required|mimes:jpeg,png',
        ]);

        if ($request->hasFile('image')) {
            $old = ProductImage::findOrFail($imageId);
            if(file_exists($old->image))
            {
                unlink($old->image);
            }
            $data['id'] = $imageId;
            $file = $request->file('image');
            $path = 'image/product';
            $file->move($path,$file->getClientOriginalName());
            $data['image'] = $path.'/'.$file->getClientOriginalName();
            $old->update($data);
            session()->flash('message','Image Updated successfully');
            return redirect()->back();
        }

    }
    //deleting a single product image
    public function destroyImage($imageId){
        $image = ProductImage::findOrFail($imageId);
        if(file_exists($image->image))
        {
            unlink($image->image);
        }
        $image->destroy($image->id);
        session()->flash('message','Image deleted successfully');
        return redirect()->back();
    }
}
