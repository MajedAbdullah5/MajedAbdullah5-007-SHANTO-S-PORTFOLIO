@extends('Layout.app')
@section('content')
    <table id="myTable" class="table-bordered">
        <a id="addServices" class="btn btn-info">ADD SERVICES</a>
        <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>DESCRIPTION</th>
        <th>IMAGE</th>
        <th>LINK</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="serviceTableBody">

        </tbody>
    </table>

    {{--    Add Service modal--}}
    <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="status"></h1>
                <div class="modal-body">
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="addServiceName" class="form-control mb-4" placeholder="Name" required>
                    <textarea id="addServiceDes" class="form-control mb-4" placeholder="Description" required></textarea>
                    <input type="text" id="addServiceLink" class="form-control mb-4" placeholder="Service link" required>
                    <input type="file" id="addServiceImage" class="form-control mb-4" required>
                    <img id="addServiceImagePreview" class="imagePreview"
                         src="{{asset('/image/loader/default-image.jpg')}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addServiceButton" type="button" class="btn btn-primary btn-sm">Add</button>
                </div>
            </div>
        </div>
    </div>

    {{--    populate modal--}}

    <div class="modal fade" id="populateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="status" class="d-none"></h1>
                <div class="modal-body">
                    <h1 id="status" class="p-3"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="populateNameId" class="form-control mb-4" placeholder="Name" required>
                    <textarea id="populateDesId" class="form-control mb-4" placeholder="Desc" required></textarea>
                    <input type="text" id="populateServiceLink" class="form-control mb-4" placeholder="Service link" required>
                    <input type="file" id="populateImageLink" class="form-control mb-4" placeholder="Image link" required>
                    <img src="" id="serviceImagePreview" class="imagePreview" alt="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="updateServiceButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--add Confirm Modal -->

    <div class="modal fade" id="addServiceConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Save?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button id="confirmServiceAdd" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!--Edit Confirm Modal -->

    <div class="modal fade" id="editConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 id="confirmStatus" class="d-none"></h3>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="confirmUpdate" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <!--Delete Confirm Modal -->

    <div class="modal fade" id="deleteServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 id="serviceHiddenInput" class="d-none"></h4>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="confirmServiceDelete" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="serviceLoader" class="loader d-none">
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
        getServicesList();
    </script>
@endsection
