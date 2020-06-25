@extends("layouts.app")

@section("content")
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Export Report</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <a  class="btn btn-outline-secondary"href="{{ route('expense_reports.index') }}">Back</a>
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
                action="{{ route('expense_reports.sendingMail', ['expense_report' => $report->id]) }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Type a email" value="{{ old('email') }}  ">
                </div>

                <button type="submit" class="btn btn-outline-primary">Send mail</button>

            </form>

        </div>
    </div>
</div>
@endsection
