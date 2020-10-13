// --------------------------------------------Services-------------------------------------

function getServicesList() {
    $('#serviceLoader').removeClass('d-none');
    axios.get('/getServicesList')
        .then(function (response) {
            if (response.status == 200) {
                $('#serviceLoader').addClass('d-none');
                $('#serviceTableBody').empty();
                let result = response.data;
                $.each(result, function (i) {
                    $("<tr>").html(
                        "<td>" + result[i].id + "</td>" +
                        "<td>" + result[i].service_name + "</td>" +
                        "<td>" + result[i].service_des + "</td>" +
                        "<td>" + "<img height='100px' width='120px' src=" + result[i].service_image + " alt=''>" + "</td>" +
                        "<td>" + result[i].service_link + "</td>" +
                        "<td>" + "<a data-id=" + result[i].id + " class='btn btn-primary btn-sm editButton'>Edit</a>" + "</td>" +
                        "<td>" + "<a data-id=" + result[i].id + " class='btn btn-danger  btn-sm deleteButton'>Delete</a>" + "</td>"
                    ).appendTo("#serviceTableBody");
                });

                //Edit Button
                $(".editButton").click(function () {
                    let id = $(this).data('id');
                    populateData(id);
                    $('#status').html(id);
                    $('#populateModal').modal('show');
                });
                $('#updateServiceButton').click(function () {
                    let id = $('#status').html();
                    $('#confirmStatus').html(id);
                    $('#editConfrimModal').modal('show');

                });
                //Delete Button
                $('.deleteButton').click(function () {
                    let id = $(this).data('id');
                    $('#serviceHiddenInput').html(id);
                    $('#deleteServiceModal').modal('show');
                });
                $(document).ready(function () {
                    $('#myTable').DataTable();
                    $('.dataTables_length').addClass('bs-select');
                });

            } else {

            }

        }).catch(function (error) {
    });
}

//image preview
$('#addServiceImage').change(function () {
    let reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        let source = event.target.result;
        $('#addServiceImagePreview').attr('src', source);
    }
});

//Add Services
$('#addServices').click(function () {
    $('#addServiceModal').modal('show');
});

$('#addServiceButton').click(function () {
    $('#addServiceConfirmModal').modal('show');
});
$('#confirmServiceAdd').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let addServiceName = $('#addServiceName').val();
    let addServiceDes = $('#addServiceDes').val();
    let addServiceLink = $('#addServiceLink').val();
    let addServiceImage = $('#addServiceImage').val();
    addServices(addServiceName, addServiceDes, addServiceLink, addServiceImage);
});


// Add Services Method
function addServices(addServiceName, addServiceDes, addServiceLink, addServiceImage) {
    let file = $('#addServiceImage').prop('files')[0];
    let formData = new FormData();
    formData.append('file', file);
    formData.append('addServiceName', addServiceName);
    formData.append('addServiceDes', addServiceDes);
    formData.append('addServiceLink', addServiceLink);
    formData.append('addServiceImage', addServiceImage);
    let config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    };
    axios.post('/addServices', formData, config).then(function (response) {
        if (response.data == 1) {
            alert('Data has been added!');
            $('#addServiceConfirmModal').modal('hide');
            $('#addServiceModal').modal('hide');
            getServicesList();
        } else {
            alert('Data failed  to delete!');
            $('#addServiceConfirmModal').modal('hide');
            $('#addServiceModal').modal('hide');
            getServicesList();
        }
    })
        .catch(function (error) {

        });
}


//Delete Confrim Service
$('#confirmServiceDelete').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#serviceHiddenInput').html();
    deleteServiceData(id);
});

//Delete Service Method
function deleteServiceData(id) {
    axios.post('/deleteServiceData', {
        id: id
    }).then(function (response) {

        if (response.data == 1) {
            alert('Data Successfully Deleted!');
            $('#deleteServiceModal').modal('hide');
            getServicesList();
        } else {
            alert('Data failed to delete!');
            $('#deleteServiceModal').modal('hide');
            getServicesList();
        }
    }).catch(function (error) {

    })
}

//Populate Data in modal
function populateData(id) {
    axios.post('/populateData', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#populateNameId').val(result.service_name);
            $('#populateDesId').val(result.service_des);
            $('#populateServiceLink').val(result.service_link);
            $('#serviceImagePreview').attr('src', result.service_image);
        }
    }).catch(function () {
        alert('From Service data failed to retrieve!');
    });
}

//Image preview
$('#populateImageLink').change(function () {
    let fileReader = new FileReader();
    fileReader.readAsDataURL(this.files[0]);
    fileReader.onload = function (event) {
        let src = event.target.result;
        $('#serviceImagePreview').attr('src', src);
    }
});
//confirm Update
$('#confirmUpdate').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#confirmStatus').html();
    let updateName = $('#populateNameId').val();
    let updateDes = $('#populateDesId').val();
    let updateServiceLink = $('#populateServiceLink').val();
    updateServiceData(id, updateName, updateDes, updateServiceLink);
});

//Update Service Data
function updateServiceData(id, updateName, updateDes, updateServiceLink) {
    let updateFile = $('#populateImageLink').prop('files')[0];
    let formData = new FormData();
    formData.append('id', id);
    formData.append('file', updateFile);
    formData.append('updateName', updateName);
    formData.append('updateDes', updateDes);
    formData.append('updateServiceLink', updateServiceLink);
    let config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    };
    axios.post('/updateServiceData', formData, config).then(function (response) {
        console.log(response.data);
        if (response.status == 200) {
            alert('Data updated Successfully!');
            $('#populateModal').modal('hide');
            $('#editConfrimModal').modal('hide');
            getServicesList();
        } else {
            alert('Data failed to update!');
            $('#populateModal').modal('hide');
            $('#editConfrimModal').modal('hide');
            getServicesList();
        }
    }).catch(function (error) {
        alert('Server Error!');
    });

}


// ---------------------------------------portfolio----------------------------------
// ---------------------------------------PROFILE PICTURE-------------------------
function showProfilePic() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/showProfilePic').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#profilePictureTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + "<img  height='100px' width='120px' src=" + result[i].photo + ">" + "</td>" +
                    "<td>" + "<a id='profilePictureButton' class='btn btn-outline-deep-purple btn-sm' data-id=" + result[i].id + ">UPDATE</a>" + "</td>"
                ).appendTo('#profilePictureTableBody');

            });
            $('#profilePictureButton').click(function () {
                let id = $(this).data('id');
                $('#updateProfilePictureModalStatus').html(id);
                $('#updateProfilePictureModal').modal('show');
                populateProfilePicture(id);
            });
            $('#updateProfilePictureModalButton').click(function () {
                let id = $('#updateProfilePictureModalStatus').html();
                $('#profilePictureUpdateConfirmModalStatus').html(id);
                $('#profilePictureUpdateConfirmModal').modal('show');

            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

// populate image
function populateProfilePicture(id) {
    axios.post('/populateProfilePicture', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#updateProfilePicturePreview').attr('src', result[0].photo);
        }
    }).catch(function (response) {
        alert('Server Error!');
    });
}

//Image preview
$('#updateProfilePicture').change(function () {
    let reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        let src = event.target.result;
        $('#updateProfilePicturePreview').attr('src', src);
    }
});

//Update picture confirm modal buttton
$('#profilePictureUpdateConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#profilePictureUpdateConfirmModalStatus').html();
    updateProfilepicture(id);
});

//Update profile pic
function updateProfilepicture(id) {
    let file = $('#updateProfilePicture').prop('files')[0];
    let formData = new FormData();
    formData.append('id', id);
    formData.append('file', file);
    axios.post('/updateProfilepicture', formData).then(function (response) {
        if (response.status == 200) {
            alert('Picture has been updated!');
            $('#updateProfilePictureModal').modal('hide');
            $('#profilePictureUpdateConfirmModal').modal('hide');
            showProfilePic();
        } else {
            alert('Picture failed to update!');
            $('#updateProfilePictureModal').modal('hide');
            $('#profilePictureUpdateConfirmModal').modal('hide');
            showProfilePic();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

// -------------------------------------EMERGENCY CONTACT---------------------------------------
function getEmergencyContactList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getEmergencyContactList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#emergencyContactTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].contactStatus + "</td>" +
                    "<td>" + result[i].contactInformation + "</td>" +
                    "<td>" + "<a class='btn btn-sm btn-outline-info contactEditButton' data-id=" + result[i].id + ">Edit</a>" + "</td>" +
                    "<td>" + "<a class='btn btn-sm btn-outline-danger contactDeleteButton' data-id=" + result[i].id + ">Delete</a>" + "</td>"
                ).appendTo('#emergencyContactTableBody');
            });
            $('.contactEditButton').click(function () {
                let id = $(this).data('id');
                $('#contactPopulateModalStatus').html(id);
                $('#contactPopulateModal').modal('show');
                populateContact(id);
            });
            $('#contactPopulateModalButton').click(function () {
                let id = $('#contactPopulateModalStatus').html();
                $('#contactUpdateConfirmModalStatus').html(id);
                $('#contactUpdateConfirmModal').modal('show');
            });

            $('.contactDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#contactDeleteConfirmModalStatus').html(id);
                $('#contactDeleteConfirmModal').modal('show');
            });
            $('#addContactButton').click(function () {
                $('#addContactModal').modal('show');
            });
            $('#addContactModalButton').click(function () {
                $('#addContactConfirmModal').modal('show');
            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addContactConfirmModalButton
$('#addContactConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let contactStatus = $('#contactAddStatus').val();
    let contactInformation = $('#contactAddInformation').val();
    addContact(contactStatus, contactInformation);
});

// Add Contact
function addContact(contactStatus, contactInformation) {
    axios.post('/addContact', {
        contactStatus: contactStatus,
        contactInformation: contactInformation
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been added!");
            $('#addContactModal').modal('hide');
            $('#addContactConfirmModal').modal('hide');
            getEmergencyContactList();
        } else {
            alert("Data failed to add!");
            $('#addContactModal').modal('hide');
            $('#addContactConfirmModal').modal('hide');
            getEmergencyContactList();
        }
    }).catch(function (error) {

    });
}

//contactDeleteConfirmModalButton
$('#contactDeleteConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#contactDeleteConfirmModalStatus').html();
    deleteContact(id);
});

//delete contact
function deleteContact(id) {
    axios.post('/deleteContact', {
        id: id
    }).then(function (response) {
        if (response.data == 1 && response.status == 200) {
            alert("Data has been deleted!");
            $('#contactDeleteConfirmModal').modal('hide');
            getEmergencyContactList();
        } else {
            alert("Data failed to delete!");
            $('#contactDeleteConfirmModal').modal('hide');
            getEmergencyContactList();
        }

    }).catch(function (error) {

    });
}

//contactUpdateConfirmModalButton
$('#contactUpdateConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#contactUpdateConfirmModalStatus').html();
    let contactStatus = $('#contactStatus').val();
    let contactInformation = $('#contactInformation').val();
    updateContact(id, contactStatus, contactInformation);
});

//update Contact
function updateContact(id, contactStatus, contactInformation) {
    axios.post('/updateContact', {
        id: id,
        contactStatus: contactStatus,
        contactInformation: contactInformation
    }).then(function (response) {
        if (response.status == 200 && response.data == 1) {
            alert('Data has been updated!');
            $('#contactPopulateModal').modal('hide');
            $('#contactUpdateConfirmModal').modal('hide');
            getEmergencyContactList();
        } else {
            alert("Data failed to update!");
            $('#contactPopulateModal').modal('hide');
            $('#contactUpdateConfirmModal').modal('hide');
            getEmergencyContactList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//populate Contact
function populateContact(id) {
    axios.post('/populateContact', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#contactStatus').val(result.contactStatus);
            $('#contactInformation').val(result.contactInformation);
        }
    }).catch(function (error) {

    });
}


// ----------------------------------------------------ADDRESS-------------------------------------
function getAddressList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getAddressList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#addressTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].address_status + "</td>" +
                    "<td>" + result[i].Address + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " + class='btn btn-sm btn-outline-info addressEditButton'>Edit</a>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " + class='btn btn-sm btn-outline-danger addressDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#addressTableBody');
            });
            //Delete
            $('.addressDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#addressDeleteConfirmModalStatus').html(id);
                $('#addressDeleteConfirmModal').modal('show');
            });
            //populate id
            $('.addressEditButton').click(function () {
                let id = $(this).data('id');
                $('#addressPopulateModalStatus').html(id);
                populateAddress(id);
                $('#addressPopulateModal').modal('show');
            });
            //update
            $('#addressPopulateModalButton').click(function () {
                let id = $('#addressPopulateModalStatus').html();
                $('#addressUpdateConfirmModalStatus').html(id);
                $('#addressUpdateConfirmModal').modal('show');
            });
            $('#addAddressButton').click(function () {
                $('#addAddressModal').modal('show');
            });
            $('#addAddressModalButton').click(function () {
                $('#addAddressConfirmModal').modal('show');
            });

        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addAddressConfirmModalButton
$('#addAddressConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let addressInformationStatus = $('#addAddressInformationStatus').val();
    let addressInformation = $('#addAddressInformation').val();
    addAddress(addressInformationStatus, addressInformation);
});

// add address
function addAddress(addressInformationStatus, addressInformation) {
    axios.post('/addAddress', {
        addressInformationStatus: addressInformationStatus,
        addressInformation: addressInformation
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been added!");
            $('#addAddressModal').modal('hide');
            $('#addAddressConfirmModal').modal('hide');
            getAddressList();

        } else {
            alert("Data failed to add!");
            $('#addAddressModal').modal('hide');
            $('#addAddressConfirmModal').modal('hide');
            getAddressList();

        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//addressDeleteConfirmModalButton
$('#addressDeleteConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#addressDeleteConfirmModalStatus').html();
    deleteAddress(id);
});

//delete
function deleteAddress(id) {
    axios.post('/deleteAddress', {
        id: id
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data has been deleted!');
            $('#addressDeleteConfirmModal').modal('hide');
            getAddressList();
        } else {
            alert('Data failed to delete!');
            $('#addressDeleteConfirmModal').modal('hide');
            getAddressList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//addressUpdateConfirmModalButton
$('#addressUpdateConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#addressUpdateConfirmModalStatus').html();
    let addressInformationStatus = $('#addressInformationStatus').val();
    let addressInformation = $('#addressInformation').val();
    updateAddress(id, addressInformationStatus, addressInformation);
});

//update
function updateAddress(id, addressInformationStatus, addressInformation) {
    axios.post('/updateAddress', {
        id: id,
        addressInformationStatus: addressInformationStatus,
        addressInformation: addressInformation
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been updated!");
            $('#addressPopulateModal').modal('hide');
            $('#addressUpdateConfirmModal').modal('hide');
            getAddressList();
        } else {
            alert('Data failed to update!');
            $('#addressPopulateModal').modal('hide');
            $('#addressUpdateConfirmModal').modal('hide');
            getAddressList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//populate
function populateAddress(id) {
    axios.post('/populateAddress', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#addressInformationStatus').val(result.address_status);
            $('#addressInformation').val(result.Address);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

// -------------------------------------------------PERSONAL INFORMATION-----------------------------
function getPersonalInformationList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getPersonalInformationList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#personalInformationTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].information_status + "</td>" +
                    "<td>" + result[i].information + "</td>" +
                    "<td>" + "<a class='btn btn-sm btn-outline-info informationEditButton'   data-id=" + result[i].id + ">Edit</a>" + "</td>" +
                    "<td>" + "<a class='btn btn-sm btn-outline-danger informationDeleteButton' data-id=" + result[i].id + ">Delete</a>" + "</td>"
                ).appendTo('#personalInformationTableBody');
            });
            $('.informationEditButton').click(function () {
                let id = $(this).data('id');
                $('#populatePersonalInformationModalStatus').html(id);
                $('#populatePersonalInformationModal').modal('show');
                populatePersonalInformation(id);
            });
            $('#populatePersonalInformationModalButton').click(function () {
                let id = $('#populatePersonalInformationModalStatus').html();
                $('#informationUpdateConfirmationModalStatus').html(id);
                $('#informationUpdateConfirmationModal').modal('show');
            });
            //delete information
            $('.informationDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#personalDeleteConfirmModalStatus').html(id);
                $('#personalDeleteConfirmModal').modal('show');
            });
            //Add Data
            $('#addPersonalInformationButton').click(function () {
                $('#addPersonalInformationModal').modal('show');
            });
            $('#addPersonalInformationModalButton').click(function () {
                $('#addPersonalInformationConfirmModal').modal('show');
            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addPersonalInformationConfirmModalButton
$('#addPersonalInformationConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let addInformationStatus = $('#addInformationStatus').val();
    let addInformation = $('#addInformation').val();
    addPersonalInformation(addInformationStatus, addInformation);
});

//add information
function addPersonalInformation(addInformationStatus, addInformation) {
    axios.post('/addPersonalInformation', {
        addInformationStatus: addInformationStatus,
        addInformation: addInformation
    }).then(function (response) {
        if (response.status == 200) {
            alert("Data has been added!");
            $('#addPersonalInformationModal').modal('hide');
            $('#addPersonalInformationConfirmModal').modal('hide');
            getPersonalInformationList();
        } else {
            alert("Data failed to add!");
            $('#addPersonalInformationModal').modal('hide');
            $('#addPersonalInformationConfirmModal').modal('hide');
            getPersonalInformationList();
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}

//personalDeleteConfirmButton
$('#personalDeleteConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#personalDeleteConfirmModalStatus').html();
    deletePersonalInformation(id);
});

// delete information
function deletePersonalInformation(id) {
    axios.post('/deletePersonalInformation', {
        id: id
    }).then(function (response) {
        console.log(response.data);
        if (response.data == 1) {
            alert('Data has been deleted!');
            $('#personalDeleteConfirmModal').modal('hide');
            getPersonalInformationList();
        } else {
            alert('Data failed to delete!');
            $('#personalDeleteConfirmModal').modal('hide');
            getPersonalInformationList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//informationUpdateConfirmationModalButton
$('#informationUpdateConfirmationModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#informationUpdateConfirmationModalStatus').html();
    let personalInformationStatus = $('#personalInformationStatus').val();
    let personalInformation = $('#personalInformation').val();
    updatePersonalInformation(id, personalInformationStatus, personalInformation);
});

//update information
function updatePersonalInformation(id, personalInformationStatus, personalInformation) {
    axios.post('/updatePersonalInformation', {
        id: id,
        personalInformationStatus: personalInformationStatus,
        personalInformation: personalInformation
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been updated successfully!")
            $('#populatePersonalInformationModal').modal('hide');
            $('#informationUpdateConfirmationModal').modal('hide');
            getPersonalInformationList();
        } else {
            alert("Data failed to update!")
            $('#populatePersonalInformationModal').modal('hide');
            $('#informationUpdateConfirmationModal').modal('hide');
            getPersonalInformationList();
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}

//populate information
function populatePersonalInformation(id) {
    axios.post('/populatePersonalInformation', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#personalInformationStatus').val(result.information_status);
            $('#personalInformation').val(result.information);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}


// -------------------------------------------------JOB SKILLS---------------------------------------

function getJobSkillsList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getJobSkillsList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#jobSkillsTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].job + "</td>" +
                    "<td>" + result[i].workplace + "</td>" +
                    "<td>" + result[i].position + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-sm btn-outline-info jobSkillsEditButton'>Edit</a>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-sm btn-outline-danger jobSkillsDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#jobSkillsTableBody');
            });
            //populate
            $('.jobSkillsEditButton').click(function () {
                let id = $(this).data('id');
                $('#jobSkillsPopulateModalStatus').html(id);
                $('#jobSkillsPopulateModal').modal('show');
                populateJobSkills(id);
            });
            // update
            $('#jobSkillsPopulateModalButton').click(function () {
                let id = $('#jobSkillsPopulateModalStatus').html();
                $('#jobSkillsConfirmModalStatus').html(id);
                $('#jobSkillsConfirmModal').modal('show');
            });

            // delete
            $('.jobSkillsDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#jobSkillsDeleteConfirmModalStatus').html(id);
                $('#jobSkillsDeleteConfirmModal').modal('show');
            });
            //Add job skills
            $('#addJobSkillsButton').click(function () {
                $('#jobSkillsAddModal').modal('show');
            });
            $('#jobSkillsAddModalButton').click(function () {
                $('#addJobSkillsConfirmModal').modal('show');
            });
        }
    }).catch(function () {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addJobSkillsConfirmModalButton
$('#addJobSkillsConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let jobSkillsAddJob = $('#jobSkillsAddJob').val();
    let jobSkillsAddInstitute = $('#jobSkillsAddInstitute').val();
    let jobSkillsAddPosition = $('#jobSkillsAddPosition').val();
    addJobSkills(jobSkillsAddJob, jobSkillsAddInstitute, jobSkillsAddPosition);
});

//Add Job skills
function addJobSkills(jobSkillsAddJob, jobSkillsAddInstitute, jobSkillsAddPosition) {
    axios.post('/addJobSkills', {
        jobSkillsAddJob: jobSkillsAddJob,
        jobSkillsAddInstitute: jobSkillsAddInstitute,
        jobSkillsAddPosition: jobSkillsAddPosition
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data added successfully!");
            $('#jobSkillsAddModal').modal('hide');
            $('#addJobSkillsConfirmModal').modal('hide');
            getJobSkillsList();
        } else {
            alert("Data failed to add");
            $('#jobSkillsAddModal').modal('hide');
            $('#addJobSkillsConfirmModal').modal('hide');
            getJobSkillsList();
        }
    }).catch(function (error) {
        alert("Server Error");
    });
}

//jobSkillsDeleteConfirmModalButton
$('#jobSkillsDeleteConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#jobSkillsDeleteConfirmModalStatus').html();
    deleteJobSkills(id);
});

//delete
function deleteJobSkills(id) {
    axios.post('/deleteJobSkills', {
        id: id
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been deleted!");
            $('#jobSkillsDeleteConfirmModal').modal('hide');
            getJobSkillsList();
        } else {
            alert("Data failed to delete!");
            $('#jobSkillsDeleteConfirmModal').modal('hide');
            getJobSkillsList();
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}

//updateJobSkillsConfirmModalButton
$('#jobSkillsConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#jobSkillsConfirmModalStatus').html();
    let jobSkillsPopulateJob = $('#jobSkillsPopulateJob').val();
    let jobSkillsPopulateInstitute = $('#jobSkillsPopulateInstitute').val();
    let jobSkillsPopulatePosition = $('#jobSkillsPopulatePosition').val();
    updateJobSkills(id, jobSkillsPopulateJob, jobSkillsPopulateInstitute, jobSkillsPopulatePosition);
});

//Update Id
function updateJobSkills(id, jobSkillsPopulateJob, jobSkillsPopulateInstitute, jobSkillsPopulatePosition) {
    axios.post('/updateJobSkills', {
        id: id,
        jobSkillsPopulateJob: jobSkillsPopulateJob,
        jobSkillsPopulateInstitute: jobSkillsPopulateInstitute,
        jobSkillsPopulatePosition: jobSkillsPopulatePosition

    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been updated!");
            $('#jobSkillsPopulateModal').modal('hide');
            $('#jobSkillsConfirmModal').modal('hide');
            getJobSkillsList();
        } else {
            alert("Data failed to update");
            $('#jobSkillsPopulateModal').modal('hide');
            $('#jobSkillsConfirmModal').modal('hide');
            getJobSkillsList();
        }
    }).catch(function (error) {
        alert('Server Error!');
    });
}

//populate Id
function populateJobSkills(id) {
    axios.post('/populateJobSkills', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#jobSkillsPopulateJob').val(result.job);
            $('#jobSkillsPopulateInstitute').val(result.workplace);
            $('#jobSkillsPopulatePosition').val(result.position);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}


// ------------------------------------------------------SKILLS--------------------------------------------
function getSkillsList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getSkillsList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#skillTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].programming_language + "</td>" +
                    "<td>" + result[i].programming_level + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-sm btn-outline-info skillsEditButton'>Edit</a>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-sm btn-outline-danger skillsDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#skillTableBody');
            });
            //populate
            $('.skillsEditButton').click(function () {
                let id = $(this).data('id');
                $('#skillsPopulateModalStatus').html(id);
                $('#skillsPopulateModal').modal('show');
                populateSkills(id);

            });
            //Delete
            $('.skillsDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#skillsDeleteConfirmModalStatus').html(id);
                $('#skillsDeleteConfirmModal').modal('show');
            });

            //update
            $('#skillsPopulateButton').click(function () {
                let id = $('#skillsPopulateModalStatus').html();
                $('#skillsConfirmModalStatus').html(id);
                $('#skillsConfirmModal').modal('show');
            });
            //Add skill Button
            $('#addSkillButton').click(function () {
                $('#addSkillsModal').modal('show');
            });
            $('#addSkillsModalButton').click(function () {
                $('#addSkillsConfirmModal').modal('show');
            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addSkillsConfirmModalButton
$('#addSkillsConfirmModalButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let skillsProgrammingLanguage = $('#addSkillsProgrammingLanguage').val();
    let skillsProgrammingLanguageLevel = $('#addSkillsProgrammingLanguageLevel').val();
    addSkills(skillsProgrammingLanguage, skillsProgrammingLanguageLevel);
});

//Add Skills
function addSkills(skillsProgrammingLanguage, skillsProgrammingLanguageLevel) {
    axios.post('/addSkills', {
        skillsProgrammingLanguage: skillsProgrammingLanguage,
        skillsProgrammingLanguageLevel: skillsProgrammingLanguageLevel
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data has been added!');
            $('#addSkillsModal').modal('hide');
            $('#addSkillsConfirmModal').modal('hide');
            getSkillsList();
        } else {
            alert('Data failed to add!');
            $('#addSkillsModal').modal('hide');
            $('#addSkillsConfirmModal').modal('hide');
            getSkillsList();
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}

//skillsDeleteConfirmButton
$('#skillsDeleteConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#skillsDeleteConfirmModalStatus').html();
    deleteSkills(id);
});

//Delete Skills
function deleteSkills(id) {
    axios.post('/deleteSkills', {
        id: id
    }).then(function (response) {
        console.log(response.data);
        if (response.data == 1) {
            alert("Data has been deleted!");
            $('#skillsDeleteConfirmModal').modal('hide');
            getSkillsList();
        } else {
            alert("Data failed to delete!");
            $('#skillsDeleteConfirmModal').modal('hide');
            getSkillsList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//Populate Skills
function populateSkills(id) {
    axios.post('/populateSkills', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#skillsProgrammingLanguage').val(result.programming_language);
            $('#skillsProgrammingLanguageLevel').val(result.programming_level);
        } else {
            alert('Data failed to fetched');
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}

//skills update ConfirmButton
$('#skillsConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#skillsConfirmModalStatus').html();
    let skillsProgrammingLanguage = $('#skillsProgrammingLanguage').val();
    let skillsProgrammingLanguageLevel = $('#skillsProgrammingLanguageLevel').val();
    updateSkills(id, skillsProgrammingLanguage, skillsProgrammingLanguageLevel);
});

//Update Skills
function updateSkills(id, skillsProgrammingLanguage, skillsProgrammingLanguageLevel) {
    axios.post('/updateSkills', {
        id: id,
        skillsProgrammingLanguage: skillsProgrammingLanguage,
        skillsProgrammingLanguageLevel: skillsProgrammingLanguageLevel
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data has been updated successfully!');
            $('#skillsPopulateModal').modal('hide');
            $('#skillsConfirmModal').modal('hide');
            getSkillsList();
        } else {
            alert('Data failed to update!');
            $('#skillsPopulateModal').modal('hide');
            $('#skillsConfirmModal').modal('hide');
            getSkillsList();
        }

    }).catch(function (error) {
        alert("Server Error!");
    });
}


// --------------------------------------------LANGUAGE-------------------------------------------
function getLanguageList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getLanguageList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#languageTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].language + "</td>" +
                    "<td>" + result[i].language_proficiency + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-outline-info btn-sm languageEditButton'>Edit</a>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-outline-danger btn-sm languageDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#languageTableBody');
            });
            //Edit and Update
            $('.languageEditButton').click(function () {
                let id = $(this).data('id');
                $('#languagePopulateModal').modal('show');
                $('#languagePopulateModalStatus').html(id);
                languagePopulateModal(id);
            });
            $('#languagePopulateButton').click(function () {
                let id = $('#languagePopulateModalStatus').html();
                $('#editLanguageConfirmModalStatus').html(id);
                $('#editLanguageConfirmModal').modal('show');
            });
            //Delete Button
            $('.languageDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#languageDeleteConfirmModalStatus').html(id);
                $('#languageDeleteConfirmModal').modal('show');
            });

            //Add Button
            $('#addLanguageButton').click(function () {
                $('#addLanguageModal').modal('show');
            });
            $('#addLanguageSubmitButton').click(function () {
                $('#addLanguageConfirmModal').modal('show');
            });

        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });

}

//addLanguageConfirmButton
$('#addLanguageConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let AddLanguage = $('#addLanguageInputId').val();
    let AddLanguageProficiency = $('#addLanguageProficiency').val();
    addLanguage(AddLanguage, AddLanguageProficiency);
});

//Add Language
function addLanguage(AddLanguage, AddLanguageProficiency) {
    axios.post('/addLanguage', {
        AddLanguage: AddLanguage,
        AddLanguageProficiency: AddLanguageProficiency
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been added!");
            $('#addLanguageModal').modal('hide');
            $('#addLanguageConfirmModal').modal('hide');
            getLanguageList();
        } else {
            alert("Data failed to add!");
            $('#addLanguageModal').modal('hide');
            $('#addLanguageConfirmModal').modal('hide');
            getLanguageList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//languageDeleteConfirmButton
$('#languageDeleteConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#languageDeleteConfirmModalStatus').html();
    deleteLanguage(id);
});

//Delete Language
function deleteLanguage(id) {
    axios.post('/deleteLanguage', {
        id: id
    }).then(function (response) {
        if (response.data == 1) {
            alert("Data has been deleted!");
            $('#languageDeleteConfirmModal').modal('hide');
            getLanguageList();
        } else {
            alert("Data failed to delete!");
            $('#languageDeleteConfirmModal').modal('hide');
            getLanguageList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

//eupdateLanguageConfirmButton
$('#editLanguageConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#editLanguageConfirmModalStatus').html();
    let populateLanguage = $('#populateLanguage').val();
    let languageProficiency = $('#languageProficiency').val();
    updateLanguage(id, populateLanguage, languageProficiency);
});

//Update Language
function updateLanguage(id, populateLanguage, languageProficiency) {
    axios.post('/updateLanguage', {
        id: id,
        populateLanguage: populateLanguage,
        languageProficiency: languageProficiency
    }).then(function (response) {
        if (response.data == 1) {
            alert('Language has been updated!');
            $('#languagePopulateModal').modal('hide');
            $('#editLanguageConfirmModal').modal('hide');
            getLanguageList();
        } else {
            alert('Language failed to update!');
            $('#languagePopulateModal').modal('hide');
            $('#editLanguageConfirmModal').modal('hide');
            getLanguageList()
        }
    }).catch(function (error) {
        alert("Server Error!")
    });
}

//Populate Language
function languagePopulateModal(id) {
    axios.post('/languagePopulateModal', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#populateLanguage').val(result.language);
            $('#languageProficiency').val(result.language_proficiency);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}


// ---------------------------------------------EDUCATION-------------------------------------------
function getEducationList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getEducationList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#educationTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $("<tr>").html(
                    "<td>" + result[i].education_duration + "</td>" +
                    "<td>" + result[i].education_institute + "</td>" +
                    "<td>" + result[i].education_certificate + "</td>" +
                    "<td>" + result[i].education_major + "</td>" +
                    "<td>" + result[i].education_gpa + "</td>" +
                    "<td>" + result[i].education_board + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-outline-info btn-sm educationEditButton'>Edit</a>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-outline-danger btn-sm educationDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#educationTableBody');
            });
            //Delete Button
            $('.educationDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#educationDeleteConfirmModalStatus').html(id);
                $('#educationDeleteConfirmModal').modal('show');
            });

            //Edit Button
            $('.educationEditButton').click(function () {
                let id = $(this).data('id');
                $('#eduacationEditStatus').html(id);
                $('#eduacationEditModal').modal('show');
                populateEducationId(id);
            });
            $('#eduacationEditButton').click(function () {
                let id = $('#eduacationEditStatus').html();
                $('#educationUpdateConfirmModalStatus').html(id);
                $('#educationUpdateConfirmModal').modal('show');
            });

            //Add Education Button
            $('#addEducationButton').click(function () {
                $('#educationAddModal').modal('show');
            });
            $('#educationAddButton').click(function () {
                $('#addConfrimModal').modal('show');
            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//addConfirmButton
$('#addConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let educationDuration = $('#educationAddDuration').val();
    let educationInstitute = $('#educationAddInstitute').val();
    let educationCertificate = $('#educationAddCertificate').val();
    let educationMajor = $('#educationAddMajor').val();
    let educationCgpa = $('#educationAddCgpa').val();
    let educationBoard = $('#educationAddBoard').val();
    addEducation(educationDuration, educationInstitute, educationCertificate, educationMajor, educationCgpa, educationBoard);
});

//Add Education
function addEducation(educationDuration, educationInstitute, educationCertificate, educationMajor, educationCgpa, educationBoard) {
    axios.post('/addEducation', {
        educationDuration: educationDuration,
        educationInstitute: educationInstitute,
        educationCertificate: educationCertificate,
        educationMajor: educationMajor,
        educationCgpa: educationCgpa,
        educationBoard: educationBoard
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data Added successfully!');
            $('#educationAddModal').modal('hide');
            $('#addConfrimModal').modal('hide');
            getEducationList();
        } else {
            alert('Data failed to add!');
            $('#educationAddModal').modal('hide');
            $('#addConfrimModal').modal('hide');
            getEducationList();
        }
    }).catch(function () {
        alert("Server Error!");
    });
}

//educationDeleteConfirmButton
$('#educationDeleteConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#educationDeleteConfirmModalStatus').html();
    deleteEducation(id);
});

//Delete Education
function deleteEducation(id) {
    axios.post('/deleteEducation', {
        id: id
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data deleted successfully!');
            $('#educationDeleteConfirmModal').modal('hide');
            getEducationList();
        } else {
            alert('Data failed to delete!');
            $('#educationDeleteConfirmModal').modal('hide');
            getEducationList();
        }

    }).catch(function () {
        alert("Server Error!")
    });
}

//educationUpdateConfirmButton
$('#educationUpdateConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#educationUpdateConfirmModalStatus').html();
    let educationDuration = $('#educationDuration').val();
    let educationInstitute = $('#educationInstitute').val();
    let educationCertificate = $('#educationCertificate').val();
    let educationMajor = $('#educationMajor').val();
    let educationCgpa = $('#educationCgpa').val();
    let educationBoard = $('#educationBoard').val();
    educationUpdate(id, educationDuration, educationInstitute, educationCertificate, educationMajor, educationCgpa, educationBoard);
});

//Education update
function educationUpdate(id, educationDuration, educationInstitute, educationCertificate, educationMajor, educationCgpa, educationBoard) {
    axios.post('/educationUpdate', {
        id: id,
        educationDuration: educationDuration,
        educationInstitute: educationInstitute,
        educationCertificate: educationCertificate,
        educationMajor: educationMajor,
        educationCgpa: educationCgpa,
        educationBoard: educationBoard

    }).then(function (response) {
        console.log(response.data);
        if (response.status == 200 && response.data == 1) {
            alert("Data has been updated!");
            $('#eduacationEditModal').modal('hide');
            $('#educationUpdateConfirmModal').modal('hide');
            getEducationList();
        } else {
            alert("Data failed to update!");
            $('#eduacationEditModal').modal('hide');
            $('#educationUpdateConfirmModal').modal('hide');
            getEducationList();
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}


function populateEducationId(id) {
    axios.post('/populateEducationId', {
        id: id
    }).then(function (response) {
        let result = response.data;
        if (response.status == 200) {
            $('#educationDuration').val(result.education_duration);
            $('#educationInstitute').val(result.education_institute);
            $('#educationCertificate').val(result.education_certificate);
            $('#educationMajor').val(result.education_major);
            $('#educationCgpa').val(result.education_gpa);
            $('#educationBoard').val(result.education_board);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

// ---------------------------------------------CAREER OBJECTIVES -----------------------------------
function getObjetiveList() {
    $('#portfolioImageLoader').removeClass('d-none');
    axios.get('/getObjetiveList').then(function (response) {
        if (response.status == 200) {
            $('#portfolioImageLoader').addClass('d-none');
            $('#myObjectiveTableBody').empty();
            let result = response.data;
            $("<tr>").html(
                "<td class='p-3'>" + result.objectives + "</td>" +
                "<td>" + "<a data-id=" + result.id + " id='careerObjectives' class='btn btn-outline-info'>Update</a>" + "</td>"
            ).appendTo('#myObjectiveTableBody');

            //Populate Button
            $('#careerObjectives').click(function () {
                let id = $(this).data('id');
                $('#objectiveStatus').html(id);
                populateObjectives(id);
                $('#populateObjectives').modal('show');
            });

            //Update Button
            $('#populateObjectivesButton').click(function () {
                $('#objectiveUpdateModal').modal('show');
            });
        }
    }).catch(function (error) {
        $('#portfolioImageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#portfolioImageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//objectiveUpdateButton
$('#objectiveUpdateButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#objectiveStatus').html();
    let objectives = $('#objectivesId').val();
    updateObjectives(id, objectives);
});

//Update Button
function updateObjectives(id, objectives) {
    axios.post('/updateObjectives', {
        id: id,
        objectives: objectives
    }).then(function (response) {
        if (response.data == 1) {
            alert('Data has been updated successfully!');
            $('#populateObjectives').modal('hide');
            $('#objectiveUpdateModal').modal('hide');
            getObjetiveList();
        } else {
            alert('Data failed to update!');
            $('#populateObjectives').modal('hide');
            $('#objectiveUpdateModal').modal('hide');
            getObjetiveList();
        }

    }).catch(function () {
        alert("Server Error");
    });
}

//populate Objectives
function populateObjectives(id) {
    axios.post('/populateObjectives', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#objectivesId').val(result.objectives);
        }
    }).catch(function (error) {
        alert("Server Error!");
    });
}

// --------------------------------------END CAREER OBJECTIVES------------------------------------------


// ---------------------------------------Projects-----------------------------------------

function getProjectsList() {
    $('#projectLoader').removeClass('d-none');
    axios.get('/getProjectsList').then(function (response) {
        if (response.status == 200) {
            $('#projectLoader').addClass('d-none');
            $('#projectTableBody').empty();
            let result = response.data;
            $.each(result, function (i) {
                $('<tr>').html(
                    "<td>" + result[i].id + "</td>" +
                    "<td>" + result[i].project_name + "</td>" +
                    "<td>" + result[i].project_des + "</td>" +
                    "<td>" + result[i].project_link + "</td>" +
                    "<td>" + "<img height='100px' width='120px' src=" + result[i].project_image + " alt=''>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-primary btn-sm projectEditButton'>Edit<a/>" + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-danger btn-sm projectDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#projectTableBody');
            });
            //Edit Button
            $('.projectEditButton').click(function () {
                let id = $(this).data('id');
                populateProjectData(id);
                $('#projectModalStatus').html(id);
                $('#projectEditModel').modal('show');
            });

            //DeleteButton
            $('.projectDeleteButton').click(function () {
                let id = $(this).data('id');
                $('#deleteProjectConfrimModalStatus').html(id);
                $('#deleteProjectConfrimModal').modal('show');

            });
            //table pagination
            $(document).ready(function () {
                $('#myTable').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        }

    }).catch(function (error) {
        $('#projectLoader').removeClass('d-none');
        setTimeout(function () {
            $('#projectLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });
}

//Delete confirm Button
$('#confirmProjectDeleteButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#deleteProjectConfrimModalStatus').html();
    deleteService(id);

});

//Delete Service
function deleteService(id) {
    axios.post('/deleteService', {
        id: id
    }).then(function (response) {
        if (response.data == 1) {
            alert("Service has been deleted!");
            $('#deleteProjectConfrimModal').modal('hide');
            getProjectsList();
        }
    }).catch(function (error) {
        $('#deleteProjectConfrimModal').modal('hide');
        alert("Service failed to delete!");
        getProjectsList();
    });
}

$('#files').on('change', function () {
    let file = new FileReader();
    file.readAsDataURL(this.files[0]);
    file.onload = function (event) {
        let source = event.target.result;
        $('#imagePreview').attr('src', source);
    }
});

//Add project data
$('#addProjectButton').click(function () {
    $('#addProjectModal').modal('show');
});
$('#addProjectModalButton').click(function () {
    $('#addProjectConfirmModal').modal('show');
});
$('#addProjectConfirmButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let addProjectName = $('#addProjectName').val();
    let addProjectDes = $('#addProjectDes').val();
    let addProjectLink = $('#addProjectLink').val();
    addProject(addProjectName, addProjectDes, addProjectLink);
});


function addProject(addProjectName, addProjectDes, addProjectLink) {
    let formData = new FormData();
    let files = $('#files').prop('files');
    if (files.length > 11 || files.length < 11) {
        alert('Please select 11 images.');
        $('#addProjectConfirmModal').modal('hide');
    } else {
        for (let i = 0; i < files.length; i++) {
            formData.append('files[]', files[i]);
        }

        formData.append('addProjectName', addProjectName);
        formData.append('addProjectDes', addProjectDes);
        formData.append('addProjectLink', addProjectLink);
        let config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        };
        axios.post('/addProject', formData, config).then(function (response) {
            if (response.data == 1) {
                alert('Project has been added!');
                $('#addProjectConfirmModal').modal('hide');
                $('#addProjectModal').modal('hide');
                getProjectsList();
            } else {
                alert('Project failed to add!');
                $('#addProjectConfirmModal').modal('hide');
                $('#addProjectModal').modal('hide');
                // getProjectsList();

            }
        }).catch(function () {

        });
    }
}

//Update project data
$('#updateProjectButton').click(function () {
    $(this).html(
        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
    );
    let id = $('#projectModalStatus').html();
    $('#editProjectConfrimModalStatus').html(id);
    $('#editProjectConfrimModal').modal('show');
});
$('#confirmProjectChangeButton').click(function () {
    let id = $('#projectModalStatus').html();
    $('#editProjectConfrimModalStatus').html(id);
    let projectnameId = $('#projectnameId').val();
    let projectdesId = $('#projectdesId').val();
    let projectLinkId = $('#projectLinkId').val();
    updateProjectData(id, projectnameId, projectdesId, projectLinkId);

});

function updateProjectData(id, projectnameId, projectdesId, projectLinkId) {

    let formData = new FormData();
    let file = $('#Updatefiles').prop('files');
    if (file.length > 11 || file.length < 11) {
        alert("Please select 11 images.");
        $('#editProjectConfrimModal').modal('hide');
    } else {
        for (let i = 0; i < file.length; i++) {
            formData.append('Updatefiles[]', file[i]);
        }
        formData.append('id', id);
        formData.append('projectnameId', projectnameId);
        formData.append('projectdesId', projectdesId);
        formData.append('projectLinkId', projectLinkId);
        let config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        axios.post('/updateProjectData', formData, config).then(function (response) {
            if (response.data == 1) {
                $('#editProjectConfrimModal').modal('hide');
                $('#projectEditModel').modal('hide');
                alert("Data has been updated!");
                getProjectsList();
            } else {
                $('#editProjectConfrimModal').modal('hide');
                $('#projectEditModel').modal('hide');
                alert("Data failed to update!");
                getProjectsList();
            }
        }).catch(function () {

        });
    }
}

//image review
$('#Updatefiles').change(function () {
    let reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (event) {
        let source = event.target.result;
        $('#projectImageReview').attr('src', source);
    }
});


//Populate Data
function populateProjectData(id) {
    axios.post('/populateProjectData', {
        id: id
    }).then(function (response) {
        if (response.status == 200) {
            let result = response.data;
            $('#projectnameId').val(result.project_name);
            $('#projectdesId').val(result.project_des);
            $('#projectLinkId').val(result.project_link);
            $('#projectImageReview').attr('src', result.project_image);
        } else {
            alert('data failed to fetch');
        }
    }).catch(function (error) {

    });
}

// -------------------------------------------Message--------------------------------------------
function getMessageList() {
    $('#messageLoader').removeClass('d-none');
    axios.get('/getMessageList').then(function (response) {
        if (response.status == 200) {
            $('#messageLoader').addClass('d-none');
            let result = response.data;
            $.each(result, function (i) {
                $('<tr>').html(
                    "<td>" + result[i].id + "</td>" +
                    "<td>" + result[i].message_name + "</td>" +
                    "<td>" + result[i].message_email + "</td>" +
                    "<td>" + result[i].message_message + "</td>" +
                    "<td>" + "<a data-id=" + result[i].id + " class='btn btn-danger btn-sm messageDeleteButton'>Delete</a>" + "</td>"
                ).appendTo('#messageTableBody');
            });
            $(document).ready(function () {
                $('#myTable').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        }
        $('.messageDeleteButton').click(function () {
            let id = $(this).data('id');
            $('#messgaeDeleteConfirmStatus').html(id);
            $('#messgaeDeleteConfirmModal').modal('show');
        });
        $('#messgaeDeleteConfirmButton').click(function () {
            $(this).html(
                `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" ></span>Loading...`
            );
            let id = $('#messgaeDeleteConfirmStatus').html();
            deleteMessage(id);
        });
    }).catch(function () {
        $('#messageLoader').removeClass('d-none');
        setTimeout(function () {
            $('#messageLoader').addClass('d-none');
            alert("Something went wrong!");
            clearInterval();
        }, 5000);
    });

    function deleteMessage(id) {
        axios.post('/deleteMessage', {
            id: id
        }).then(function (response) {
            if (response.data == 1) {
                alert("Message has been deleted!");
                $('#messgaeDeleteConfirmModal').modal('hide');
            } else {
                alert("Message failed to delete!");
                $('#messgaeDeleteConfirmModal').modal('hide');
            }
        }).catch(function () {
            alert("Server Error!");

        });
    }

}
