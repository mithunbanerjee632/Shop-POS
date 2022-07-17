<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
   function AddCategory(Request $request){
       $catName = $request->input('catName');
       $imagePath = $request->file('image')->store('public');
       $catCode = time();

       $result = CategoryModel::insert([
           'cat_name'=>$catName,
           'cat_code'=>$catCode,
           'cat_icon'=>$imagePath
       ]);

       return $result;
   }

   function SelectCategory(){
       $result = CategoryModel::all();
       return $result;
   }

   function DeleteCategory(Request $request){
       $id = $request->id;
       $imageName = CategoryModel::where('id',$id)->get('cat_icon');
       Storage::delete($imageName[0]['cat_icon']);
       $result = CategoryModel::where('id',$id)->delete();
       return $result;

   }

   function UpdateCategoryWithImage(Request $request){
       $id = $request->input('id');
       $name = $request->input('name');

       //New Image Upload
       $imagePath = $request->file('image')->store('public');

       //Old Image Delete
       $imageName = CategoryModel::where('id',$id)->get('cat_icon');
       Storage::delete($imageName[0]['cat_icon']);

       $result = CategoryModel::where('id',$id)->update(['cat_name'=>$name,'cat_icon'=>$imagePath]);
       return $result;
   }

    function UpdateCategoryWithoutImage(Request $request){
       $id = $request->input('id');
       $name = $request->input('name');

       $result = CategoryModel::where('id',$id)->update(['cat_name'=>$name]);
       return $result;
    }

}
