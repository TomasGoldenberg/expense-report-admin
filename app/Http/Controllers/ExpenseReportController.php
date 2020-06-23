<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Illuminate\Http\Request;

class ExpenseReportController extends Controller
{

    public function index()
    {
        return view("expenseReport.index",[
            "expenseReports" => ExpenseReport::all()
        ])  ;
    }

 
    public function create()
    {
        return view("expenseReport.create");
    }

  
    public function store(Request $request)
    {
        $report = new ExpenseReport();
        $report->title=$request->get("title");
        $report->save();

        return redirect('/expense_reports');
    }


    public function show($id) //show es get/id
    {
        //
    }


    public function edit($id)
    {
        $report = ExpenseReport::find($id);
        return view("expenseReport.edit",compact('report'));
    }


    public function update(Request $request, $id)
    {
        $report = ExpenseReport::find($id);
        $report->title = $request->get("title");
        $report->save();

        return redirect('/expense_reports');

    }


    public function destroy($id)
    {
        //
    }
}
