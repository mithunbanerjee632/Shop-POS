<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function AddCart(Request $request){
        $invoiceNo = $request->input('invoice_no');
        $invoiceDate = $request->input('invoice_date');
        $productName = $request->input('product_name');
        $productQty = $request->input('product_quantity');
        $productUnitPrice = $request->input('product_unit_price');
        $productTotalPrice = $request->input('product_total_price');
        $sellerName = $request->input('seller_name');
        $productIcon = $request->input('product_icon');

        $result = CartModel::insert([
            'invoice_no'=>$invoiceNo,
            'invoice_date'=>$invoiceDate,
            'product_name'=>$productName,
            'product_quantity'=>$productQty,
            'product_unit_price'=>$productUnitPrice,
            'product_total_price'=>$productTotalPrice,
            'seller_name'=>$sellerName,
            'product_icon'=>$productIcon
        ]);

        return $result;
    }

    function CartItemPlus(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity+1;
        $totalPrice = $newQuantity*$price;

        $result = CartModel::where('id',$id)->update(['product_quantity'=>$newQuantity, 'product_total_price'=>$totalPrice]);
        return $result;
    }

    function CartItemMinus(Request $request){
        $id = $request->id;
        $quantity = $request->quantity;
        $price = $request->price;
        $newQuantity = $quantity-1;
        $totalPrice = $newQuantity*$price;

        $result = CartModel::where('id',$id)->update(['product_quantity'=>$newQuantity, 'product_total_price'=>$totalPrice]);
        return $result;
    }

    function RemoveCartList(Request $request){
        $id = $request->id;
        $result = CartModel::where('id',$id)->delete();
        return $result;
    }

    function CartList(Request $request){
        $invoice = $request->invoice;
        $result = CartModel::where('invoice_no',$invoice)->get();
        return $result;
    }
}
