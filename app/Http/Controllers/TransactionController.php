<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    function CartSell(Request $request){
       $invoice = $request->invoice;
       $cartList = CartModel::where('invoice_no',$invoice)->get();

       $cartInsertDeleteResult = "";
       foreach($cartList as $cartListItem){
           $resultInsert= TransactionModel::insert([
               'invoice_no'=>$cartListItem['invoice_no'],
               'invoice_date'=>$cartListItem['invoice_date'],
               'product_name'=>$cartListItem['product_name'],
               'product_quantity'=>$cartListItem['product_quantity'],
               'product_unit_price'=>$cartListItem['product_unit_price'],
               'product_total_price'=>$cartListItem['product_total_price'],
               'seller_name'=>$cartListItem['seller_name'],
               'product_icon'=>$cartListItem['product_icon'],
           ]);

           if($resultInsert==1){
               $resultDelete = CartModel::where('id',$cartListItem['id'])->delete();
               if($resultDelete==1){
                   $cartInsertDeleteResult=1;
               }else{
                   $cartInsertDeleteResult=0;
               }
           }
       }
       return $cartInsertDeleteResult;
    }

    function TransactionList(){
        $result = TransactionModel::orderById('id','desc')->get();
        return $result;
    }

    function RecentTransactionList(){
        $result = TransactionModel::orderById('id','desc')->limit(20)->get();
        return $result;
    }
}
