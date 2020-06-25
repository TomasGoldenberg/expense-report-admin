<?php

namespace App\Http\Controllers;

use App\ExpenseReport;
use Illuminate\Http\Request;
use App\Mail\SummaryReport;
use Illuminate\Support\Facades\Mail;

class ExpenseReportController extends Controller
{

    public function __construct(){
        $this->middleware("auth");
    }
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
        $validData = $request->validate([
            "title"=> "required|min:3"
        ]);

        $report = new ExpenseReport();
        $report->title=$validData["title"];
        $report->save();

        return redirect('/expense_reports');
    }


    public function show($id) //show es get/id
    {
        $report = ExpenseReport::findOrFail($id);
        return view("expenseReport.show",compact('report'));
        
    }


    public function edit($id)
    {
        $report = ExpenseReport::findOrFail($id);
        return view("expenseReport.edit",compact('report'));
    }


    public function update(Request $request, $id)
    {
        $report = ExpenseReport::findOrFail($id);
        $report->title = $request->get("title");
        $report->save();

        return redirect('/expense_reports');

    }


    public function destroy($id)
    {
        $report = ExpenseReport::findOrFail($id);

        $report->delete();
        return back();
    }

    public function sendMail($id){
       
        $report = ExpenseReport::findOrFail($id);
        return view("expenseReport.sendMail",compact('report'));
    }


    public function sendingMail(Request $request, $id){
        $report = ExpenseReport::findOrFail($id);
        Mail::to($request->get("email"))->send(new SummaryReport($report));

        return redirect('/expense_reports');
        
    }
}
