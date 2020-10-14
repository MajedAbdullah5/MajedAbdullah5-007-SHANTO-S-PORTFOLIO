@extends('Layout.app')
@section('content')

    <table id="myTable" class="table-bordered">
        <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>MESSAGE</th>
        <th>DELETE</th>
        </thead>
        <tbody id="messageTableBody">

        </tbody>
    </table>
    {{--delete confrim modal--}}
    <div class="modal fade" id="messgaeDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 id="messgaeDeleteConfirmStatus"></h4>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="messgaeDeleteConfirmButton" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="messageLoader" class="loader d-none">
        <div class="card text-center m-auto">
            <img src="{{asset('/image/loader/loader.svg')}}" alt="">

        <div class="card-text">
            <h2>Please wait...</h2>
        </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        getMessageList();
    </script>
@endsection

