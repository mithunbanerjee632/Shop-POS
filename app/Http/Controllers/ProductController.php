<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   function AddProduct(Request $request){
       $productName = $request->input('product_name');
       $productCode = $request->input('product_code');
       $productImage = $request->file('product_icon')->store('public');
       $productPrice = $request->input('product_price');
       $productCategory = $request->input('product_category');
       $productRemarks = $request->input('product_remarks');

       $result = ProductModel::insert([
           'product_name'=>$productName,
           'product_code'=>$productCode,
           'product_icon'=>$productImage,
           'product_price'=>$productPrice,
           'product_category'=>$productCategory,
           'product_remarks'=>$productRemarks,
       ]);

       return $result;

   }

   function SelectProduct(){
       $result = ProductModel::all();
       return $result;
   }

    function SelectProductByCategory(Request $request){
        $Category = $request->Category;
        $result = ProductModel::where('product_category',$Category)->get();
        return $result;
    }

   function DeleteProduct(Request $request){
       $id = $request->id;
       $result = ProductModel::where('id',$id)->delete();
       return $result;
   }

   function UpdateProductWithImage(Request $request){
       $id = $request->input('id');

       //Old Image Delete
         $imageName = ProductModel::where('id',$id)->get(['product_icon']);
         Storage::delete($imageName[0]['product_icon']);

         //new Image Upload
       $productImage = $request->file('product_icon')->store('public');


       $productName = $request->input('product_name');
       $productPrice = $request->input('product_price');
       $productCategory = $request->input('product_category');
       $productRemarks = $request->input('product_remarks');

       $result = ProductModel::where('id',$id)->update([
           'product_name'=>$productName,
           'product_icon'=>$productImage,
           'product_price'=>$productPrice,
           'product_category'=>$productCategory,
           'product_remarks'=>$productRemarks,
       ]);
       return $result;

   }

    function UpdateProductWithoutImage(Request $request){
        $id = $request->input('id');

        $productName = $request->input('product_name');
        $productPrice = $request->input('product_price');
        $productCategory = $request->input('product_category');
        $productRemarks = $request->input('product_remarks');

        $result = ProductModel::where('id',$id)->update([
            'product_name'=>$productName,
            'product_price'=>$productPrice,
            'product_category'=>$productCategory,
            'product_remarks'=>$productRemarks,
        ]);
        return $result;

    }
}
