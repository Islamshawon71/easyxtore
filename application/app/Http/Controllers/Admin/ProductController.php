<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProductImage;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->ProductName = $request->ProductName;
        $product->ProductSlug = $this->slug($request->ProductSlug);
        $product->ProductDetails = $request->ProductDetails;
        $product->ProductSku = $request->ProductSku;
        $product->ProductRegularPrice = $request->ProductRegularPrice;
        $product->ProductSalePrice = $request->ProductSalePrice;
        $result = $product->save();
        $product->categories()->attach($request->ProductCategory);
        if ($result) {
            foreach ($request->productImage as $item) {
                $productImage = new ProductImage();
                $productImage->ImageUrl = $item['fileName'];
                $productImage->product_id = $product->id;
                $productImage->save();
            }
            $response['status'] = 'success';
            $response['message'] = 'Successfully Add Product';

        } else {
            $response['status'] = 'failed';
            $response['message'] = 'Unsuccessful to Add Product';
        }
        return response()->json($response, 201);
        die();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function image(Request $request)
    {
        $image = $request->file('file');
        if (isset($image)) {

            if(!Storage::disk('public')->exists('product')){
                Storage::disk('public')->makeDirectory('product');
            }
            if(!Storage::disk('public')->exists('product/thumbnail')){
                Storage::disk('public')->makeDirectory('product/thumbnail');
            }
            $imageName = uniqid() . '.jpg';
            $product = public_path('product/' . $imageName);
            $thumbnail = public_path('product/thumbnail/' . $imageName);

            $result = Image::make($image)->fit(340, 340)->save($product);
            $result = Image::make($image)->fit(340, 340)->save($thumbnail);

            if ($result) {
                $response['status'] = 'success';
                $response['message'] = 'Successful to upload image';
                $response['url'] = $imageName;

            } else {
                $response['status'] = 'failed';
                $response['message'] = 'Unsuccessful to upload Product';
            }

        }else {
            $response['status'] = 'failed';
            $response['message'] = 'Unsuccessful to upload Product';
        }
        return response()->json($response, 201);
        die();
    }

    public function get()
    {
        return datatables()->of(Product::with('images')->latest()->get())
            ->removeColumn('images')
            ->addColumn('image', function(Product $product) {
                return '<img src="'.url('application/public/product/').'/'.$product->imageUrl().'" alt="image" class="img-fluid avatar-md rounded">';
            })
            ->addColumn('action', function(Product $product) {
                return '<button type="button" value="'. $product->id . '" class="btn btn-edit btn-xs btn-info"> <i class="mdi mdi-square-edit-outline"></i></button>
                        <button type="button" value="'. $product->id . '" class="btn btn-danger btn-delete btn-xs ml-2"  ><i class="mdi mdi-delete"></i></button>';
            })
            ->escapeColumns([])->toJson();
    }

    public function category(Request $request)
    {
        if(isset($request['q'])){
            $couriers = Category::query()->where('CategoryName','like','%'.$request['q'].'%')->get();
        }else{
            $couriers = Category::all();
        }
        $courier = array();
        foreach ($couriers as $item) {
            $courier[] = array(
                "id" => $item['id'],
                "text" => $item['CategoryName']
            );
        }
        return json_encode($courier);
        die();
    }
    public function slug($string)
    {
        return preg_replace('/\s+/u', '-', trim(strtolower($string)));
    }
}
