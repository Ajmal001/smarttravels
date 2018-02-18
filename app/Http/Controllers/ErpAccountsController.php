<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ErpExpenses;
use App\ErpSales;
use App\ErpCustomers;

use Session;
use Carbon\Carbon;
use DB;


class ErpAccountsController extends Controller
{
    public function showExpenses(){
      $expenses = ErpExpenses::all();
       return view('backend.erp.accounts.expenses.expenses',compact('expenses'));
    }

    public function addExpenses(Request $request){

      $insert = new ErpExpenses();

  		$insert->expense_type = $request->input('expense_type');
  		$insert->expense_title = $request->input('expense_title');
  		$insert->expense_amount = $request->input('expense_amount');
  		$insert->expense_date = $request->input('expense_date');

  		$insert->save();
  		Session::flash('flash_message_insert', 'Expense Added Successfully !');
  		return redirect('/adminerpexpenses');
    }

    public function editExpenses($expense_id){
      $expensedata = ErpExpenses::find($expense_id);
      return response()->json(['expensedata' => $expensedata]);
    }

    public function updateExpenses(Request $request,$expense_id){

        $update = ErpExpenses::find($expense_id);

        $update->expense_type = $request->input('expense_type');
        $update->expense_title = $request->input('expense_title');
        $update->expense_amount = $request->input('expense_amount');
        $update->expense_date = $request->input('expense_date');

        $update->save();
    		Session::flash('flash_message_insert', 'Expense Updated Successfully !');

    		return redirect('/adminerpexpenses');
    }

    public function deleteExpenses(Request $request){

      $expense_id = $request->expense_id;
      $expense = ErpExpenses::find($expense_id);
      $expense->delete();

      return redirect('/adminerpexpenses');
    }

    // Income
    public function showIncome(){
      $allincome = ErpSales::all();
      $customers = ErpCustomers::all();
      return view('backend.erp.accounts.income.income', compact('allincome','customers'));
    }

    // Report
    public function inExReport(){

      $today = Carbon::now()->today();
      $one_week_ago = Carbon::now()->subWeeks(1);
      $this_month = Carbon::now()->subMonth();

      /*===================== INCOME ==========================*/

      // Income Today
      $income_visa_processing_today = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_tour_packages_today = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_hotels_today = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_sight_seeing_today = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_air_tickets_today = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_consultancy_today = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_others_today = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_total_today = DB::table('erp_sales')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');


     // Income This Week

      $income_visa_processing_week = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_tour_packages_week = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_hotels_week = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_sight_seeing_week = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_air_tickets_week = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_consultancy_week = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_others_week = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_total_week = DB::table('erp_sales')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      // Income This month
      $income_visa_processing_month = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_tour_packages_month = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_hotels_month = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_sight_seeing_month = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_air_tickets_month = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_consultancy_month = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_others_month = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_total_month = DB::table('erp_sales')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      /*===================== EXPENSE ==========================*/

      return view('backend.erp.accounts.report.inexreport', compact(

            'income_visa_processing_today',
            'income_tour_packages_today',
            'income_hotels_today',
            'income_sight_seeing_today',
            'income_air_tickets_today',
            'income_consultancy_today',
            'income_others_today',
            'income_total_today',

            'income_visa_processing_week',
            'income_tour_packages_week',
            'income_hotels_week',
            'income_sight_seeing_week',
            'income_air_tickets_week',
            'income_consultancy_week',
            'income_others_week',
            'income_total_week',

            'income_visa_processing_month',
            'income_tour_packages_month',
            'income_hotels_month',
            'income_sight_seeing_month',
            'income_air_tickets_month',
            'income_consultancy_month',
            'income_others_month',
            'income_total_month'
      ));

    }



}
