<?php

use Illuminate\Support\Facades\Route;

//HomePage
Route::get('/', 'HomeController@homePage')->middleware('loginMiddleware');
//Visitors
Route::get('/visitors', 'visitorController@home')->middleware('loginMiddleware');
Route::get('/deleteAllVisitor', 'visitorController@deleteAllVisitor')->middleware('loginMiddleware');
//Profile Picture
Route::get('/showProfilePic', 'PortfolioController@showProfilePic')->middleware('loginMiddleware');
Route::post('/populateProfilePicture', 'PortfolioController@populateProfilePicture')->middleware('loginMiddleware');
Route::post('/updateProfilepicture', 'PortfolioController@updateProfilepicture')->middleware('loginMiddleware');
Route::post('/addProfilepicture', 'PortfolioController@addProfilepicture')->middleware('loginMiddleware');

//Services
Route::get('/services', 'ServiceController@showServicePage')->middleware('loginMiddleware');
Route::get('/getServicesList', 'ServiceController@getServicesList')->middleware('loginMiddleware');
Route::post('/populateData', 'ServiceController@populateData')->middleware('loginMiddleware');
Route::post('/updateServiceData', 'ServiceController@updateService')->middleware('loginMiddleware');
Route::post('/deleteServiceData', 'ServiceController@deleteService')->middleware('loginMiddleware');
Route::post('/addServices', 'ServiceController@addServices')->middleware('loginMiddleware');

//projects
Route::get('/project', 'ProjectController@showProjectPage')->middleware('loginMiddleware');
Route::get('/getProjectsList', 'ProjectController@getProjectsList')->middleware('loginMiddleware');
Route::post('/populateProjectData', 'ProjectController@populateProjectData')->middleware('loginMiddleware');
Route::post('/updateProjectData', 'ProjectController@updateProjectData')->middleware('loginMiddleware');
Route::post('/deleteService', 'ProjectController@deleteService')->middleware('loginMiddleware');
Route::post('/addProject', 'ProjectController@addProject')->middleware('loginMiddleware');

//mesasges
Route::get('/messages', 'MessageController@showMessagePage')->middleware('loginMiddleware');
Route::get('/getMessageList', 'MessageController@getMessageList')->middleware('loginMiddleware');
Route::post('/deleteMessage', 'MessageController@deleteMessage')->middleware('loginMiddleware');

//Portfolio Page---------------------------------------------------------------------------------

//portfolio
Route::get('/portfolio', 'PortfolioController@showPortfolioPage')->middleware('loginMiddleware');

//Emergency Contact
Route::get('/getEmergencyContactList', 'PortfolioController@getEmergencyContactList')->middleware('loginMiddleware');
Route::post('/populateContact', 'PortfolioController@populateContact')->middleware('loginMiddleware');
Route::post('/updateContact', 'PortfolioController@updateContact')->middleware('loginMiddleware');
Route::post('/deleteContact', 'PortfolioController@deleteContact')->middleware('loginMiddleware');
Route::post('/addContact', 'PortfolioController@addContact')->middleware('loginMiddleware');

//objectives
Route::get('/getObjetiveList', 'PortfolioController@getObjetiveList')->middleware('loginMiddleware');
Route::post('/populateObjectives', 'PortfolioController@populateObjectives')->middleware('loginMiddleware');
Route::post('/updateObjectives', 'PortfolioController@updateObjectives')->middleware('loginMiddleware');
Route::post('/addObjectives','PortfolioController@addObjectives');

//education
Route::get('/getEducationList', 'PortfolioController@getEducationList')->middleware('loginMiddleware');
Route::post('/populateEducationId', 'PortfolioController@populateEducationId')->middleware('loginMiddleware');
Route::post('/educationUpdate', 'PortfolioController@educationUpdate')->middleware('loginMiddleware');
Route::post('/deleteEducation', 'PortfolioController@deleteEducation')->middleware('loginMiddleware');
Route::post('/addEducation', 'PortfolioController@addEducation')->middleware('loginMiddleware');

//language
Route::get('/getLanguageList', 'PortfolioController@getLanguageList')->middleware('loginMiddleware');
Route::post('/languagePopulateModal', 'PortfolioController@languagePopulateModal')->middleware('loginMiddleware');
Route::post('/updateLanguage', 'PortfolioController@updateLanguage')->middleware('loginMiddleware');
Route::post('/deleteLanguage', 'PortfolioController@deleteLanguage')->middleware('loginMiddleware');
Route::post('/addLanguage', 'PortfolioController@addLanguage')->middleware('loginMiddleware');

//skills
Route::get('/getSkillsList', 'PortfolioController@getSkillsList')->middleware('loginMiddleware');
Route::post('/populateSkills', 'PortfolioController@populateSkills')->middleware('loginMiddleware');
Route::post('/updateSkills', 'PortfolioController@updateSkills')->middleware('loginMiddleware');
Route::post('/deleteSkills', 'PortfolioController@deleteSkills')->middleware('loginMiddleware');
Route::post('/addSkills', 'PortfolioController@addSkills')->middleware('loginMiddleware');

//job skills
Route::get('/getJobSkillsList', 'PortfolioController@getJobSkillsList')->middleware('loginMiddleware');
Route::post('/populateJobSkills', 'PortfolioController@populateJobSkills')->middleware('loginMiddleware');
Route::post('/updateJobSkills', 'PortfolioController@updateJobSkills')->middleware('loginMiddleware');
Route::post('/deleteJobSkills', 'PortfolioController@deleteJobSkills')->middleware('loginMiddleware');
Route::post('/addJobSkills', 'PortfolioController@addJobSkills')->middleware('loginMiddleware');

//personal information
Route::get('/getPersonalInformationList', 'PortfolioController@getPersonalInformationList')->middleware('loginMiddleware');
Route::post('/populatePersonalInformation', 'PortfolioController@populatePersonalInformation')->middleware('loginMiddleware');
Route::post('/updatePersonalInformation', 'PortfolioController@updatePersonalInformation')->middleware('loginMiddleware');
Route::post('/deletePersonalInformation', 'PortfolioController@deletePersonalInformation')->middleware('loginMiddleware');
Route::post('/addPersonalInformation', 'PortfolioController@addPersonalInformation')->middleware('loginMiddleware');

//address
Route::get('/getAddressList', 'PortfolioController@getAddressList')->middleware('loginMiddleware');
Route::post('/populateAddress', 'PortfolioController@populateAddress')->middleware('loginMiddleware');
Route::post('/updateAddress', 'PortfolioController@updateAddress')->middleware('loginMiddleware');
Route::post('/deleteAddress', 'PortfolioController@deleteAddress')->middleware('loginMiddleware');
Route::post('/addAddress', 'PortfolioController@addAddress')->middleware('loginMiddleware');


//Admin login page
Route::get('/adminLoginPage', 'AdminController@adminLoginPage');
Route::post('/login', 'AdminController@login');
Route::get('/logout', 'AdminController@logout');

//Admin Registration page
Route::get('/registrationAdminPage','AdminController@registrationAdminPage');
Route::post('/registerAdmin','AdminController@registerAdmin');

//Change password
Route::get('/change_password', 'AdminController@changePassword')->middleware('loginMiddleware');;
Route::post('/changeAdminPassword', 'AdminController@changeAdminPassword')->middleware('loginMiddleware');;

//Forgot password
Route::get('/forgotPassword', 'AdminController@forgotPassword');
Route::post('/resetPass', 'AdminController@resetPass');
