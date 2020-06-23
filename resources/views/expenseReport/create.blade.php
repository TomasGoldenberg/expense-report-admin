@extends("layouts.base")

@section("content")
    <div class="row">
        <div class="col">
            <h1>Create Report</h1>
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
                action="{{ route('expense_reports.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Type a title" value="{{ old('title') }}  ">
                </div>

                <button type="submit" class="btn btn-outline-primary">Save</button>

            </form>

        </div>
    </div>
    
@endsection
