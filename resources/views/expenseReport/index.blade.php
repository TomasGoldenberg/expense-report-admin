@extends("layouts.base")

@section("content")
    <div class="row">
        <div class="col">
            <h1>Reports</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <a  class="btn btn-outline-primary mb-5 mt-2"href="{{ route('expense_reports.create') }}">Create a new report</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                @foreach($expenseReports as $expenseReport)
                    <tr>
                        <td><a href="{{route('expense_reports.show', $expenseReport)}}" >{{$expenseReport->title}}</a> </td>
                        <td><a href="{{route('expense_reports.edit', $expenseReport)}}" class="btn btn-warning ml-10">Edit Report</a> </td>
                        <td>
                            <form action="{{ route('expense_reports.destroy',$expenseReport) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <input
                                 type="submit" 
                                 value="Eliminar"
                                 class="btn  btn-outline-danger mr-10"
                                 onclick="return confirm('Deseas eliminar el Articulo?')"
                                 >

                            </form>
                        </td>
                    </tr>
                @endforeach
    
            </table>

        </div>
    </div>
    
@endsection
