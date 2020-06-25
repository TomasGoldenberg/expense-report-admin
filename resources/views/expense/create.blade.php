@extends("layouts.app")

@section("content")

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Create Expense</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <a  class="btn btn-outline-secondary"href="{{ route('expense_reports.show',$report) }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @if($errors->any())
                <div class="alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form 
                action="{{ route('expense_reports.expenses.store',['expense_report' => $report->id]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group">
                    <label for="description">Description:</label>
                        <input type="text" name="description" class="form-control" id="description" placeholder="Type a description" value="{{ old('description') }}  ">
                </div>

                <div class="form-group">
                    <label for="amount">Amount:</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Type an amount"value="{{ old('amount') }}  " >
                </div>

                <button type="submit" class="btn btn-outline-primary">Save</button>

            </form>

        </div>
    </div>
</div>
@endsection
