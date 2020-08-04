<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
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
        $category = new Category();
        $category->CategoryName = $request->CategoryName;
        $category->CategorySlug = $this->slug($request->CategoryName);
        $category->CategoryImage = $request->categoryImage;
        $result = $category->save();
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Successfully Add Category';

        } else {
            $response['status'] = 'failed';
            $response['message'] = 'Unsuccessful to Add Category';
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
        $category = Category::find($id);
        $image = $category->CategoryImage;
        $result = $category->delete();
        if($result){
            $image_path = public_path('category/' . $image);
            if(File::exists($image_path) && $image != 'default.jpg') {
                File::delete($image_path);
            }
            $response['status'] = 'success';
            $response['message'] = 'Successfully Delete City';
        }else{
            $response['status'] = 'failed';
            $response['message'] = 'Unsuccessful to Delete City';
        }
        return json_encode($response);
    }

    public function image(Request $request)
    {
        $image = $request->file('file');
        if (isset($image)) {
            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }
            $imageName = uniqid() . '.jpg';
            $category = public_path('category/' . $imageName);
            $result = Image::make($image)->fit(340, 340)->save($category);

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
        return datatables()->of(Category::latest()->get())
            ->addColumn('image', function(Category $data) {
                return '<img src="'.url('application/public/category/').'/'.$data->CategoryImage.'" alt="image" class="img-fluid avatar-md rounded">';
            })
            ->addColumn('action', function(Category $data) {
                return '<button type="button" value="'. $data->id . '" class="btn btn-edit btn-xs btn-info"> <i class="mdi mdi-square-edit-outline"></i></button>
                        <button type="button" value="'. $data->id . '" class="btn btn-danger btn-delete btn-xs ml-2"  ><i class="mdi mdi-delete"></i></button>';
            })
            ->editColumn('status', function(Category $data) {
                if($data->status == 'Active'){
                    return '<button type="button" class="btn btn-success btn-xs btn-status" data-status="Inactive" name="status" value="'. $data->id . '">Active</button>';
                }else{
                    return '<button type="button" class="btn btn-warning btn-xs btn-status" data-status="Active" name="status" value="'. $data->id . '" >Inactive</button>';
                }
            })
            ->escapeColumns([])->toJson();
    }

    public function status(Request $request)
    {
        $category = Category::find($request->id);
        $category->status = $request->status;
        $result = $category->save();
        if($result){
            $response['status'] = 'success';
            $response['message'] = 'Successfully Update Status to '.$request['status'];
        }else{
            $response['status'] = 'failed';
            $response['message'] = 'Unsuccessful to update Status '.$request['status'];
        }
        return response()->json($response, 201);
        die();
    }

    public function slug($string)
    {
        return preg_replace('/\s+/u', '-', trim(strtolower($string)));
    }
}
