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
      $one_week_ago = \Carbon::now()->subWeeks(1);
      $this_month = Carbon::now()->subMonth();

      /*===================== INCOME ==========================*/

      // Income Today
      $income_visa_processing_today = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_tour_packages_today = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_hotels_today = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_sight_seeing_today = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_air_tickets_today = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_consultancy_today = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_others_today = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');

      $income_total_today = DB::table('erp_sales')
              ->where('payment_type', 'cash')
              ->where('sales_date', '=', date("Y-m-d"))
              ->sum('sales_price');


     // Income This Week

      $income_visa_processing_week = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_tour_packages_week = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_hotels_week = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_sight_seeing_week = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_air_tickets_week = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_consultancy_week = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_others_week = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      $income_total_week = DB::table('erp_sales')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $one_week_ago)
              ->where('sales_date', '<=', $today)
              ->sum('sales_price');

      // Income This month
      $income_visa_processing_month = DB::table('erp_sales')
              ->where('sales_item_type', 'visa_processing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_tour_packages_month = DB::table('erp_sales')
              ->where('sales_item_type', 'tour_packages')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_hotels_month = DB::table('erp_sales')
              ->where('sales_item_type', 'hotels')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_sight_seeing_month = DB::table('erp_sales')
              ->where('sales_item_type', 'sight_seeing')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_air_tickets_month = DB::table('erp_sales')
              ->where('sales_item_type', 'air_tickets')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_consultancy_month = DB::table('erp_sales')
              ->where('sales_item_type', 'consultancy')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_others_month = DB::table('erp_sales')
              ->where('sales_item_type', 'others')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      $income_total_month = DB::table('erp_sales')
              ->where('payment_type', 'cash')
              ->where('sales_date', '>=', $this_month)
              ->sum('sales_price');

      /*===================== EXPENSE ==========================*/

      // Expense Today
      $expense_rent_today = DB::table('erp_expenses')
              ->where('expense_type', 'rent')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_salary_today = DB::table('erp_expenses')
              ->where('expense_type', 'salary')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_food_entertainment_today = DB::table('erp_expenses')
              ->where('expense_type', 'food_entertainment')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_furniture_stationary_today = DB::table('erp_expenses')
              ->where('expense_type', 'furniture_stationary')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_repair_maintenance_today = DB::table('erp_expenses')
              ->where('expense_type', 'repair_maintenance')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_telephone_today = DB::table('erp_expenses')
              ->where('expense_type', 'telephone')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_utilities_today = DB::table('erp_expenses')
              ->where('expense_type', 'utilities')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_depreciation_today = DB::table('erp_expenses')
              ->where('expense_type', 'depreciation')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_commission_discounts_today = DB::table('erp_expenses')
              ->where('expense_type', 'commission_discounts')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_marketing_advertising_today = DB::table('erp_expenses')
              ->where('expense_type', 'marketing_advertising')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_training_fees_today = DB::table('erp_expenses')
              ->where('expense_type', 'training_fees')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_legal_fees_today = DB::table('erp_expenses')
              ->where('expense_type', 'legal_fees')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_convences_today = DB::table('erp_expenses')
              ->where('expense_type', 'convences')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_office_tour_today = DB::table('erp_expenses')
              ->where('expense_type', 'office_tour')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_others_today = DB::table('erp_expenses')
              ->where('expense_type', 'others')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      $expense_total_today = DB::table('erp_expenses')
              ->where('expense_date', '=', date("Y-m-d"))
              ->sum('expense_amount');

      // Expense This Week
      $expense_rent_week = DB::table('erp_expenses')
              ->where('expense_type', 'rent')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_salary_week = DB::table('erp_expenses')
              ->where('expense_type', 'salary')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_food_entertainment_week = DB::table('erp_expenses')
              ->where('expense_type', 'food_entertainment')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_furniture_stationary_week = DB::table('erp_expenses')
              ->where('expense_type', 'furniture_stationary')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_repair_maintenance_week = DB::table('erp_expenses')
              ->where('expense_type', 'repair_maintenance')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_telephone_week = DB::table('erp_expenses')
              ->where('expense_type', 'telephone')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_utilities_week = DB::table('erp_expenses')
              ->where('expense_type', 'utilities')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_depreciation_week = DB::table('erp_expenses')
              ->where('expense_type', 'depreciation')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_commission_discounts_week = DB::table('erp_expenses')
              ->where('expense_type', 'commission_discounts')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_marketing_advertising_week = DB::table('erp_expenses')
              ->where('expense_type', 'marketing_advertising')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_training_fees_week = DB::table('erp_expenses')
              ->where('expense_type', 'training_fees')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_legal_fees_week = DB::table('erp_expenses')
              ->where('expense_type', 'legal_fees')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_convences_week = DB::table('erp_expenses')
              ->where('expense_type', 'convences')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_office_tour_week = DB::table('erp_expenses')
              ->where('expense_type', 'office_tour')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_others_week = DB::table('erp_expenses')
              ->where('expense_type', 'others')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');

      $expense_total_week = DB::table('erp_expenses')
              ->where('expense_date', '>=', $one_week_ago)
              ->where('expense_date', '<=', $today)
              ->sum('expense_amount');


      // Expense This Month
      $expense_rent_month = DB::table('erp_expenses')
              ->where('expense_type', 'rent')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_salary_month = DB::table('erp_expenses')
              ->where('expense_type', 'salary')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_food_entertainment_month = DB::table('erp_expenses')
              ->where('expense_type', 'food_entertainment')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_furniture_stationary_month = DB::table('erp_expenses')
              ->where('expense_type', 'furniture_stationary')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_repair_maintenance_month = DB::table('erp_expenses')
              ->where('expense_type', 'repair_maintenance')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_telephone_month = DB::table('erp_expenses')
              ->where('expense_type', 'telephone')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_utilities_month = DB::table('erp_expenses')
              ->where('expense_type', 'utilities')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_depreciation_month = DB::table('erp_expenses')
              ->where('expense_type', 'depreciation')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_commission_discounts_month = DB::table('erp_expenses')
              ->where('expense_type', 'commission_discounts')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_marketing_advertising_month = DB::table('erp_expenses')
              ->where('expense_type', 'marketing_advertising')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_training_fees_month = DB::table('erp_expenses')
              ->where('expense_type', 'training_fees')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_legal_fees_month = DB::table('erp_expenses')
              ->where('expense_type', 'legal_fees')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_convences_month = DB::table('erp_expenses')
              ->where('expense_type', 'convences')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_office_tour_month = DB::table('erp_expenses')
              ->where('expense_type', 'office_tour')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_others_month = DB::table('erp_expenses')
              ->where('expense_type', 'others')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');

      $expense_total_month = DB::table('erp_expenses')
              ->where('expense_date', '>=', $this_month)
              ->sum('expense_amount');


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
            'income_total_month',

            'expense_rent_today',
            'expense_salary_today',
            'expense_food_entertainment_today',
            'expense_furniture_stationary_today',
            'expense_repair_maintenance_today',
            'expense_telephone_today',
            'expense_utilities_today',
            'expense_depreciation_today',
            'expense_commission_discounts_today',
            'expense_marketing_advertising_today',
            'expense_training_fees_today',
            'expense_legal_fees_today',
            'expense_convences_today',
            'expense_office_tour_today',
            'expense_others_today',
            'expense_total_today',

            'expense_rent_week',
            'expense_salary_week',
            'expense_food_entertainment_week',
            'expense_furniture_stationary_week',
            'expense_repair_maintenance_week',
            'expense_telephone_week',
            'expense_utilities_week',
            'expense_depreciation_week',
            'expense_commission_discounts_week',
            'expense_marketing_advertising_week',
            'expense_training_fees_week',
            'expense_legal_fees_week',
            'expense_convences_week',
            'expense_office_tour_week',
            'expense_others_week',
            'expense_total_week',

            'expense_rent_month',
            'expense_salary_month',
            'expense_food_entertainment_month',
            'expense_furniture_stationary_month',
            'expense_repair_maintenance_month',
            'expense_telephone_month',
            'expense_utilities_month',
            'expense_depreciation_month',
            'expense_commission_discounts_month',
            'expense_marketing_advertising_month',
            'expense_training_fees_month',
            'expense_legal_fees_month',
            'expense_convences_month',
            'expense_office_tour_month',
            'expense_others_month',
            'expense_total_month'

      ));

    }



}
