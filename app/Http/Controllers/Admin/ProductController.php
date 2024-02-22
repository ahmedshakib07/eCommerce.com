<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;
use App\Models\ProductSizeModel;
use App\Models\ProductImageModel;
use Auth;
use Str;

class ProductController extends Controller
{
    public function list(){
        $data['getRecord'] = ProductModel::getRecord();
        $data['header_title'] = 'Product';
        return view('admin.product.list', $data);
    }

    public function add(){
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request){
        $title = trim($request->title);
        $product = new ProductModel;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();

        $slug = Str::slug($title, "-");

        $checkSlug = ProductModel::checkSlug($slug);
        if(empty($checkSlug)){
            $product->slug = $slug;
            $product->save();
        }
        else{
            $new_slug = $slug.'-'.$product->id;
            $product->slug = $new_slug;
            $product->save();
        }

        return redirect('admin/product/edit/'.$product->id);
    }

    public function edit($product_id){
        $product = ProductModel::getSingle($product_id);
        if(!empty($product)){
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getBrand'] = BrandModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $product;

            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($product->category_id);

            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }
    }

    public function update($product_id, Request $request){

        // dd($request->all());
        $product = ProductModel::getSingle($product_id);
        if(!empty($product)){

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            $product->old_price = trim($request->old_price);
            $product->price = trim($request->price);
            $product->short_description = trim($request->short_description);
            $product->description = trim($request->description);
            $product->additiona_information = trim($request->additiona_information);
            $product->shipping_return = trim($request->shipping_return);
            $product->status = trim($request->status);
            $product->save();

            ProductColorModel::DeleteRecord($product->id);
            if(!empty($request->color_id)){
                foreach($request->color_id as $color_id){
                    $color = new ProductColorModel;
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }
            }

            ProductSizeModel::DeleteRecord($product->id);
            if(!empty($request->size)){
                foreach($request->size as $size){
                    if (!empty($size['name'])){
                        // dd($size['name']);
                        $saveSize = new ProductSizeModel;
                        $saveSize->name = $size['name'];
                        $saveSize->price = !empty($size['price']) ? $size['price'] : 0;
                        $saveSize->product_id = $product->id;
                        $saveSize->save();
                    }
                }
            }

            if(!empty($request->file('image'))){
                foreach($request->file('image') as $value){
                    if($value->isValid()){
                        $ext = $value->getClientOriginalExtension();
                        $randomStr = $product->id.Str::random(20);
                        $filename = strtolower($randomStr).'.'.$ext;

                        $value->move('upload/product/', $filename);

                        $imageupload = new ProductImageModel;
                        $imageupload->image_name = $filename;
                        $imageupload->image_extension = $ext;
                        $imageupload->product_id = $product->id;
                        $imageupload->save();
                    }
                }
            }
            
            return redirect()->back()->with('success', "Product successfully updated");
        }
        else{
            abort(404);
        }
    }

    public function image_delete($id){
        $image = ProductImageModel::getSingle($id);

        if(!empty($image->getLogo())){
            unlink('upload/product/'.$image->image_name);
        }
        $image->delete();
        return redirect()->back()->with('success', "Product Image Successfully Deleted");
    }

    public function product_image_sortable(Request $request){
        // dd($request->all());
        if(!empty($request->photo_id)){
            $i = 1;
            foreach($request->photo_id as $photo_id){
                $image = ProductImageModel::getSingle($photo_id);
                $image->order_by = $i;
                $image->save();
                $i++;
            }
        }
        $json['success'] = true;
        echo json_encode($json);
    }

    public function delete($id){
        $product = ProductModel::getSingle($id);
        $product->is_delete = 1;
        $product->save();

        return redirect()->back();
    }
}
