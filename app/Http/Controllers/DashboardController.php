<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function CountProduct(){
       return ProductModel::count();
    }

    function CountCategory(){
        return CategoryModel::count();
    }

      function CountTransaction(){
          return TransactionModel::count();
      }

      function CountTotalIncome(){
          $transaction = TransactionModel::all();
          $totalIncome = 0;

          foreach($transaction as $transactionList){
              $totalIncome=$totalIncome+$transactionList['product_total_price'];
          }
          return $totalIncome;
      }

      function IncomeLast7Days(){
        date_default_timezone_set('m/d/y');

        //Day1
          $myDate1 = date('m/d/y');
          $transaction1 = TransactionModel::where('invoice_date',$myDate1)->get();
          $totalIncome1 = 0;

          foreach ($transaction1 as $transactionList1){
              $totalIncome1 = $totalIncome1+$transactionList1['product_total_price'];
          }

        //Day2
          $myDate2 = date('m/d/y');
          $transaction2 = TransactionModel::where('invoice_date',$myDate2)->get();
          $totalIncome2 = 0;
          foreach ($transaction2 as $transactionList2){
              $totalIncome2 = $totalIncome2+$transaction2['product_total_price'];
          }

        //Day3
          $myDate3=date('m/d/y');
          $transaction3 = TransactionModel::where('invoice_date',$myDate3)->get();
          $totalIncome3=0;
          foreach ($transaction3 as $transactionList3){
              $totalIncome3=$totalIncome3+$transactionList3['product_total_price'];
          }

          //Day4
          $myDate4=date('m/d/y');
          $transaction4 = TransactionModel::where('invoice_date',$myDate4)->get();
          $totalIncome4=0;
          foreach ($transaction4 as $transactionList4){
              $totalIncome4=$totalIncome4+$transactionList4['product_total_price'];
          }

          //Day5
          $myDate5=date('m/d/y');
          $transaction5 = TransactionModel::where('invoice_date',$myDate5)->get();
          $totalIncome5=0;
          foreach ($transaction5 as $transactionList5){
              $totalIncome5=$totalIncome5+$transactionList5['product_total_price'];
          }

          //Day6
          $myDate6=date('m/d/y');
          $transaction6 = TransactionModel::where('invoice_date',$myDate6)->get();
          $totalIncome6=0;
          foreach ($transaction6 as $transactionList6){
              $totalIncome6=$totalIncome6+$transactionList6['product_total_price'];
          }

          //Day7
          $myDate7=date('m/d/y');
          $transaction7 = TransactionModel::where('invoice_date',$myDate7)->get();
          $totalIncome7=0;
          foreach ($transaction7 as $transactionList7){
              $totalIncome7=$totalIncome7+$transactionList7['product_total_price'];
          }

          $arr = array(
              array(
                  "t_date"=>$myDate1,
                  "income"=>$totalIncome1
              ),
              array(
                  "t_date"=>$myDate2,
                  "income"=>$totalIncome2
              ),
              array(
                  "t_date"=>$myDate3,
                  "income"=>$totalIncome3
              ),
              array(
                  "t_date"=>$myDate4,
                  "income"=>$totalIncome4
              ),
              array(
                  "t_date"=>$myDate5,
                  "income"=>$totalIncome5
              ),
              array(
                  "t_date"=>$myDate6,
                  "income"=>$totalIncome6
              ),
              array(
                  "t_date"=>$myDate7,
                  "income"=>$totalIncome7
              ),
          );
          return $arr;

      }
}
