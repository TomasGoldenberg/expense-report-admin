@extends("layouts.base")

@section("content")
    <div class="row">
        <div class="col">
             <h1>Edit Report {{$report->id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <a  class="btn btn-outline-secondary"href="{{ route('expense_reports.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form 
                action="{{ route('expense_reports.update', $report) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Type a title" value="{{ old('title', $report->title) }}  ">
                </div>

                <button type="submit" class="btn btn-outline-primary">Save</button>

            </form>

        </div>
    </div>
    
@endsection
