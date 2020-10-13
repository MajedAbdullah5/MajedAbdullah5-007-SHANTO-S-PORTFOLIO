@extends('Layout.app')
@section('content')
    {{--    ---------------------------------------------------PROFILE PICTURE-------------------------------}}
    <h6 class="p-3" style="font-weight: bold;">UPDATE PROFILE PICTURE</h6>
    <table id="myTable" class="table-bordered">
        <thead>
        <th>PHOTO</th>
        <th>ACTION</th>
        </thead>
        <tbody id="profilePictureTableBody">
        </tbody>
    </table>

    {{--    populate profile picture Modal --}}
    <div class="modal fade" id="updateProfilePictureModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Update Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId" class="d-none"></h1>
                <div class="modal-body">
                    <h1 id="updateProfilePictureModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="file" id="updateProfilePicture" class="form-control mb-4" required/>
                    <img id="updateProfilePicturePreview" src="{{asset('/image/loader/default-image.jpg')}}"
                         class="imagePreview">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="updateProfilePictureModalButton" type="button" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--profile picture update Confirm Modal -->
    <div class="modal fade" id="profilePictureUpdateConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="profilePictureUpdateConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="profilePictureUpdateConfirmModalButton" type="button" class="btn btn-primary btn-sm">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------------------------------EMERGENCY CONTACT---------------------------------------- -->
    <table id="myTable" class="table-bordered ">
        <h6 class="p-3" style="font-weight: bold;">EMERGENCY CONTACT</h6>
        <h6 class="p-3"><a id="addContactButton" class="btn btn-outline-deep-purple">ADD EMERGENCY CONTACT</a></h6>
        <thead>
        <th>CONTACT STATUS</th>
        <th>INFORMATION</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="emergencyContactTableBody">
        </tbody>
    </table>
    <!-- contact populate modal -->
    <div class="modal fade" id="contactPopulateModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="contactPopulateModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="contactStatus" class="form-control mb-4"
                           placeholder="Contact Status (ex:Phone)" required/>
                    <textarea type="text" id="contactInformation" class="form-control mb-4"
                              placeholder="Type Address (ex:01890312202)" required></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="contactPopulateModalButton" type="button" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--contact update Confirm Modal -->
    <div class="modal fade" id="contactUpdateConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="contactUpdateConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="contactUpdateConfirmModalButton" type="button" class="btn btn-primary btn-sm">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--    contact delete Confirm modal--}}
    <div class="modal fade" id="contactDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="contactDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="contactDeleteConfirmModalButton" type="button" class="btn btn-danger btn-sm">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--contact add Modal--}}
    <div class="modal fade" id="addContactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="addContactModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="contactAddStatus" class="form-control mb-4"
                           placeholder="Contact Status (ex:Phone)" required>
                    <textarea type="text" id="contactAddInformation" class="form-control mb-4"
                              placeholder="Type Address (ex:01890312202)" required></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addContactModalButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>


    {{-- contact add confirm modal--}}
    <div class="modal fade" id="addContactConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addContactConfirmModalButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>



    {{----------------------------------------------CAREER OBJECTIVES---------------------------------------------}}
    <table id="myTable" class="table-bordered ">
        <h6 class="p-3" style="font-weight: bold;">CAREER OBJECTIVES</h6>
        <thead>
        <th>OBJECTIVES</th>
        <th>UPDATE</th>
        </thead>
        <tbody id="myObjectiveTableBody">
        </tbody>
    </table>

    {{--Populate Objectives--}}
    <div class="modal fade" id="populateObjectives" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="objectiveStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <textarea type="text" style="min-height: 200px;" id="objectivesId" class="form-control mb-4"
                              placeholder="Type your career objectives here..." required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="populateObjectivesButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Confirm Modal -->

    <div class="modal fade" id="objectiveUpdateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="objectiveUpdateButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{------------------------------------------EDUCATION-------------------------------------------}}

    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">EDUCATION</h6>
        <h6 class="p-3"><a id="addEducationButton" class="btn btn-outline-deep-purple">ADD EDUCATION</a></h6>
        <thead>
        <th>DURATION</th>
        <th>INSTITUTE</th>
        <th>CERTIFICATE</th>
        <th>MAJOR</th>
        <th>CGPA</th>
        <th>EDUCATION BOARD</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="educationTableBody">
        </tbody>
    </table>



    {{--Education Edit Modal--}}
    <div class="modal fade" id="eduacationEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="eduacationEditStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="educationDuration" class="form-control mb-4"
                           placeholder="Education duration (ex:Since 2017-2019)" required>
                    <input type="text" id="educationInstitute" class="form-control mb-4"
                           placeholder="Education institute (ex:Govt. Iqbal Memorial College)" required>
                    <input type="text" id="educationCertificate" class="form-control mb-4"
                           placeholder="Education certificate (ex:Higher Secondary Certificate)" required>
                    <input type="text" id="educationMajor" class="form-control mb-4"
                           placeholder="Education major (ex:Group of science)" required>
                    <input type="text" id="educationCgpa" class="form-control mb-4"
                           placeholder="CGPA (ex:GPA 3.78 out of 5)" required>
                    <input type="text" id="educationBoard" class="form-control mb-4"
                           placeholder="Education board (ex:Higher Board of Comilla)" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="eduacationEditButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Edit Confirm Modal -->
    <div class="modal fade" id="educationUpdateConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h1 id="educationUpdateConfirmModalStatus" class="d-none"></h1>
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="educationUpdateConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--delete confrim modal--}}
    <div class="modal fade" id="educationDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <h2 id="educationDeleteConfirmModalStatus" class="d-none"></h2>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="educationDeleteConfirmButton" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--Education Add Modal--}}
    <div class="modal fade" id="educationAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="educationAddModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="educationAddDuration" class="form-control mb-4"
                           placeholder="Education duration (ex:Since 2017-2019)" required>
                    <input type="text" id="educationAddInstitute" class="form-control mb-4"
                           placeholder="Education institute (ex:Govt. Iqbal Memorial College)" required>
                    <input type="text" id="educationAddCertificate" class="form-control mb-4"
                           placeholder="Education certificate (ex:Higher Secondary Certificate)" required>
                    <input type="text" id="educationAddMajor" class="form-control mb-4"
                           placeholder="Education major (ex:Group of science)" required>
                    <input type="text" id="educationAddCgpa" class="form-control mb-4"
                           placeholder="CGPA (ex:GPA 3.78 out of 5)" required>
                    <input type="text" id="educationAddBoard" class="form-control mb-4"
                           placeholder="Education board (ex:Higher Board of Comilla)" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="educationAddButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--    add confirm modal--}}
    <div class="modal fade" id="addConfrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{---------------------------------------------LANGUAGE-------------------------------------------}}
    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">LANGUAGE</h6>
        <h6 class="p-3"><a id="addLanguageButton" class="btn btn-outline-deep-purple">ADD LANGUAGE</a></h6>
        <thead>
        <th>LANGUAGE</th>
        <th>SELECT PROFICIENCY</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="languageTableBody">
        </tbody>
    </table>


    {{--Language populate Modal--}}
    <div class="modal fade" id="languagePopulateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="languagePopulateModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="populateLanguage" class="form-control mb-4"
                           placeholder="Type Language (ex:Chinese)" required>
                    <select class="form-control mb-4" name="proficiency" id="languageProficiency" required>
                        <option value="Select">Select Proficiency</option>
                        <option value="Native">Native</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Good">Good</option>
                        <option value="Poor">Poor</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="languagePopulateButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--Edit language Confirm Modal -->
    <div class="modal fade" id="editLanguageConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="editLanguageConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="editLanguageConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--language delete confrim modal--}}
    <div class="modal fade" id="languageDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="languageDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="languageDeleteConfirmButton" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>


    {{--Language Add Modal--}}
    <div class="modal fade" id="addLanguageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="addLanguageModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="addLanguageInputId" class="form-control mb-4"
                           placeholder="Type Language (ex:Chinese)" required/>
                    <select class="form-control mb-4" name="proficiency" id="addLanguageProficiency" required>
                        <option value="Select" {{ old('proficiency') =='Select' ? selected: '' }}>Select Proficiency
                        </option>
                        <option value="Native" {{ old('proficiency') =='Native' ? selected: '' }}>Native</option>
                        <option value="Intermediate" {{ old('proficiency') =='Intermediate' ? selected: '' }}>
                            Intermediate
                        </option>
                        <option value="Good" {{ old('proficiency') =='Good' ? selected: '' }}>Good</option>
                        <option value="Poor" {{ old('proficiency') =='Poor' ? selected: '' }}>Poor</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addLanguageSubmitButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--    add confirm modal--}}
    <div class="modal fade" id="addLanguageConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addLanguageConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{---------------------------------------------------SKILLS-------------------------------------------}}
    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">ADD SKILLS</h6>
        <h6 class="p-3"><a id="addSkillButton" class="btn btn-outline-deep-purple">ADD SKILLS</a></h6>
        <thead>
        <th>PROGRAMMING LANGUAGE</th>
        <th>LANGUAGE LEVEL</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="skillTableBody">
        </tbody>
    </table>

    {{--Skills populate Modal--}}
    <div class="modal fade" id="skillsPopulateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="skillsPopulateModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="skillsProgrammingLanguage" class="form-control mb-4"
                           placeholder="Type Language (ex:Java)" required>
                    <input type="text" id="skillsProgrammingLanguageLevel" class="form-control mb-4"
                           placeholder="Type Level (ex: 70% )" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="skillsPopulateButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!--skills Confirm Modal -->
    <div class="modal fade" id="skillsConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="skillsConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="skillsConfirmButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{--skills delete confrim modal--}}
    <div class="modal fade" id="skillsDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="skillsDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="skillsDeleteConfirmButton" type="button" class="btn btn-danger btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--Skills Add Modal--}}
    <div class="modal fade" id="addSkillsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="addSkillsModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="addSkillsProgrammingLanguage" class="form-control mb-4"
                           placeholder="Type Language (ex:Java)" required>
                    <input type="text" id="addSkillsProgrammingLanguageLevel" class="form-control mb-4"
                           placeholder="Type Level (ex: 70% )" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addSkillsModalButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--    add confirm modal--}}
    <div class="modal fade" id="addSkillsConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addSkillsConfirmModalButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{--    -------------------------------------------------JOB SKILLS------------------------------------------}}
    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">JOB SKILLS</h6>
        <h6 class="p-3"><a id="addJobSkillsButton" class="btn btn-outline-deep-purple">ADD JOB SKILLS</a></h6>
        <thead>
        <th>POSITION</th>
        <th>INSTITUTE</th>
        <th>MAJOR</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="jobSkillsTableBody">
        </tbody>
    </table>

    {{--    job skill populate modal--}}
    <div class="modal fade" id="jobSkillsPopulateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="jobSkillsPopulateModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="jobSkillsPopulateJob" class="form-control mb-4"
                           placeholder="Type Your Status (ex:Facebook,Google)" required/>
                    <input type="text" id="jobSkillsPopulateInstitute" class="form-control mb-4"
                           placeholder="Type Your Institute (ex:Back-End Developer,Assistant Director)" required/>
                    <input type="text" id="jobSkillsPopulatePosition" class="form-control mb-4"
                           placeholder="Type Your Position (ex:Instructor,Back-End developer)" required/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="jobSkillsPopulateModalButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!--Job Skills update Confirm Modal -->
    <div class="modal fade" id="jobSkillsConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="jobSkillsConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="jobSkillsConfirmModalButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
    {{--    job Skill delete Confirm modal--}}
    <div class="modal fade" id="jobSkillsDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="jobSkillsDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="jobSkillsDeleteConfirmModalButton" type="button" class="btn btn-danger btn-sm">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{--    job skill Add modal--}}
    <div class="modal fade" id="jobSkillsAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Job Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="jobSkillsAddModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="jobSkillsAddJob" class="form-control mb-4"
                           placeholder="Type Your Status (ex:Facebook,Google)" required/>
                    <input type="text" id="jobSkillsAddInstitute" class="form-control mb-4"
                           placeholder="Type Your Institute (ex:Back-End Developer,Assistant Director)" required/>
                    <input type="text" id="jobSkillsAddPosition" class="form-control mb-4"
                           placeholder="Type Your Position (ex:Instructor,Back-End developer)" required/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="jobSkillsAddModalButton" type="button" class="btn btn-primary btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
    {{--    job skill add confirm modal--}}
    <div class="modal fade" id="addJobSkillsConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addJobSkillsConfirmModalButton" type="button" class="btn btn-primary btn-sm">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-----------------------------------------------PERSONAL INFORMATION----------------------------------}}
    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">PERSONAL INFORMATION</h6>
        <h6 class="p-3"><a id="addPersonalInformationButton" class="btn btn-outline-deep-purple">ADD PERSONAL
                INFORMATION</a></h6>
        <thead>
        <th>INFORMATION STATUS</th>
        <th>INFORMATION</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="personalInformationTableBody">
        </tbody>
    </table>

    {{--    personal Information populate modal--}}
    <div class="modal fade" id="populatePersonalInformationModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="populatePersonalInformationModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="personalInformationStatus" class="form-control mb-4"
                           placeholder="Type Your Status (ex:Father)" required/>
                    <input type="text" id="personalInformation" class="form-control mb-4"
                           placeholder="Type Your Institute (ex:Fakhrul Islam)" required/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="populatePersonalInformationModalButton" type="button" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--personal information update Confirm Modal -->
    <div class="modal fade" id="informationUpdateConfirmationModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="informationUpdateConfirmationModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="informationUpdateConfirmationModalButton" type="button" class="btn btn-primary btn-sm">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--    personal information delete Confirm modal--}}
    <div class="modal fade" id="personalDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="personalDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="personalDeleteConfirmButton" type="button" class="btn btn-danger btn-sm">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--    personal Information add modal--}}
    <div class="modal fade" id="addPersonalInformationModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h1 id="editId"></h1>
                <div class="modal-body">
                    <h1 id="addPersonalInformationModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="addInformationStatus" class="form-control mb-4"
                           placeholder="Type Your Status (ex:Father)" required/>
                    <input type="text" id="addInformation" class="form-control mb-4"
                           placeholder="Type Your Institute (ex:Fakhrul Islam)" required/>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addPersonalInformationModalButton" type="button" class="btn btn-primary btn-sm">Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--    personal information add confirm modal--}}
    <div class="modal fade" id="addPersonalInformationConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addPersonalInformationConfirmModalButton" type="button" class="btn btn-primary btn-sm">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--    -----------------------------------------------ADDRESS---------------------------------------------------}}
    <table id="myTable" class="table-bordered">
        <h6 class="pt-5" style="font-weight: bold;">ADDRESS</h6>
        <h6 class="p-3"><a id="addAddressButton" class="btn btn-outline-deep-purple">ADD ADDRESS</a></h6>
        <thead>
        <th>ADDRESS STATUS</th>
        <th>ADDRESS</th>
        <th>EDIT</th>
        <th>DELETE</th>
        </thead>
        <tbody id="addressTableBody">
        </tbody>
    </table>


    {{--    address  populate modal--}}
    <div class="modal fade" id="addressPopulateModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h1 id="addressPopulateModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>
                    <input type="text" id="addressInformationStatus" class="form-control mb-4"
                           placeholder="Address Status (ex:Present Address)" required/>
                    <textarea type="text" id="addressInformation" class="form-control mb-4"
                              placeholder="Type Address (ex:Dagonbhuiyan,Feni,Bangladesh)" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addressPopulateModalButton" type="button" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!--address update Confirm Modal -->
    <div class="modal fade" id="addressUpdateConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="addressUpdateConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Change?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addressUpdateConfirmModalButton" type="button" class="btn btn-primary btn-sm">
                        Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--    address delete Confirm modal--}}
    <div class="modal fade" id="addressDeleteConfirmModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <input id="hiddenInput" type="hidden"/>
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h1 id="addressDeleteConfirmModalStatus" class="d-none"></h1>
                    <h4 class="p-5">Do you want to Delete?</h4>
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">No</button>
                    <button id="addressDeleteConfirmModalButton" type="button" class="btn btn-danger btn-sm">Yes
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{--    address add modal--}}
    <div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h1 id="addAddressModalStatus" class="p-3 d-none"></h1>
                    <div id="header" class="mb-2"></div>

                    <input type="text" id="addAddressInformationStatus" class="form-control mb-4"
                           placeholder="Address Status (ex:Present Address)" required/>
                    <textarea type="text" id="addAddressInformation" class="form-control mb-4"
                              placeholder="Type Address (ex:Dagonbhuiyan,Feni,Bangladesh)" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    <button id="addAddressModalButton" type="button" class="btn btn-primary btn-sm">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- address add confirm modal--}}
    <div class="modal fade" id="addAddressConfirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h4 class="p-5">Are you sure?</h4>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button id="addAddressConfirmModalButton" type="button" class="btn btn-primary btn-sm">Yes</button>
                </div>
            </div>
        </div>
    </div>
{{--//loader--}}
    <div id="portfolioImageLoader" class="loader d-none">
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
        getObjetiveList();
        getEducationList();
        getLanguageList();
        getSkillsList();
        getJobSkillsList();
        getPersonalInformationList();
        getAddressList();
        getEmergencyContactList();
        showProfilePic();
    </script>
@endsection
