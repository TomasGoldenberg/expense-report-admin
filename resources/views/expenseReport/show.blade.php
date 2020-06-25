
@extends("layouts.app")

@section("content")
<div class="container">
<div class="row">
    <div class="col">
        <h1>Report: {{$report->title}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a  class="btn btn-outline-secondary"href="{{ route('expense_reports.index') }}">Back</a>
    </div>
    <div class="col">                      
        <a  class="btn btn-outline-success"href="{{ route('expense_reports.sendMail', ['expense_report' => $report->id]) }}">Send Email</a>
    </div>
</div>



<div class="row">
    <div class="col">
        <h3>Details</h3>
         <table class="table">
            @foreach($report->expenses as $expense)
                <tr>
                    <td>{{$expense->description}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$expense->created_at}}</td>
                </tr>
            @endforeach

            
         </table>
    </div>
</div>

<div class="row">
    <a href={{ route('expense_reports.expenses.create',['expense_report' => $report->id]) }} class="btn btn-success"> New Expense </a>
</div>
</div>
@endsection