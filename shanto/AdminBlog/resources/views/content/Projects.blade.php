@extends('Layout.app')
@section('content')
    <table class="table-bordered" id="myTable">
        <a id="addProjectButton" class="btn btn-info">ADD PROJECT</a>
        <thead>
        <th>ID</th>
        <th>NAME</th>
        <th>DESCRIPTION</th>
        <th>LINK</th>
        <th>IMAGE</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="projectTableBody">
        </tbody>
    </table>

    {{--project edit model--}}

    <div class="modal fade" id="projectEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="projectModalStatus" class="d-none"></h1>
                <div class="modal-body">
                    <h1 id="projectStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="projectnameId" class="form-control mb-4" placeholder="Name" required>
                    <textarea id="projectdesId" class="form-control mb-4" placeholder="Desc" required></textarea>
                    <input type="text" id="projectLinkId" class="form-control mb-4" placeholder="Project link" required>
                    <label for="Updatefiles">Select Images:</label><br>
                    <input type="file" name="Updatefiles[]" id="Updatefiles" class="form-control mb-4" multiple
                           required>
                    <img id="projectImageReview" src="{{asset('/image/loader/default-image.jpg')}}"
                         class="imagePreview">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="updateProjectButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Confirm Modal -->

    <div class="modal fade" id="editProjectConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h2 id="editProjectConfrimModalStatus" class="d-none"></h2>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="confirmProjectChangeButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    <!--delete Confirm Modal -->

    <div class="modal fade" id="deleteProjectConfrimModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h2 id="deleteProjectConfrimModalStatus" class="d-none"></h2>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
                    <button id="confirmProjectDeleteButton" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--Add project--}}
    <div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="addProjectModalStatus"></h1>
                <div class="modal-body">
                    <h1 id="projectStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="addProjectName" class="form-control mb-4" placeholder="Name" required>
                    <textarea id="addProjectDes" class="form-control mb-4" placeholder="Desc" required></textarea>
                    <input type="text" id="addProjectLink" class="form-control mb-4" placeholder="Project link"
                           required>
                    <label for="files">Select Images:</label><br>
                    <input type="file" class="form-control mb-4" id="files" name="files[]" multiple required/>
                    <img id="imagePreview" class="imagePreview" src="{{asset('/image/loader/default-image.jpg')}}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addProjectModalButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--    add confirm modal--}}
    <div class="modal fade" id="addProjectConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addProjectConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{--//loader--}}
    <div id="projectLoader" class="loader d-none">
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
        getProjectsList();
    </script>
@endsection

