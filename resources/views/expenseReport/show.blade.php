
@extends("layouts.base")

@section("content")
<div class="row">
    <div class="col">
        <h1>Report: {{$report->title}}</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <a  class="btn btn-outline-secondary"href="{{ route('expense_reports.index') }}">Back</a>
    </div>
</div>

<div class="row">
    Details...
</div>

@endsection