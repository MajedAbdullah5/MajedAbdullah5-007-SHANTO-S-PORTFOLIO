@extends('Layout.app')
@section('content')
    <div class="main-div">
    <div class="visitorTable">
        <table id="myTable" class="table-bordered">
            <a id="deleteAllVisitor" class="btn btn-danger">Delete All</a>

            <thead>
            <tr>
                <th>ID</th>
                <th>USER IP</th>
                <th>USER VISITED</th>
            </tr>
            </thead>
            <tbody>
            @foreach($key as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->ip_Address}}</td>
                    <td>{{$data->visit_time}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
    {{--delete confrim modal--}}
    <div class="modal fade" id="visitorDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="visitorDeleteConfirmModalButton" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#deleteAllVisitor').click(function(){
            $('#visitorDeleteConfirmModal').modal('show');
        });
        $('#visitorDeleteConfirmModalButton').click(function(){
            window.location.href="deleteAllVisitor";
        });
        $(document).ready(function () {
            $('#myTable').DataTable({
                order:false
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
