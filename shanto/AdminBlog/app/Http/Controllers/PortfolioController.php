<?php

namespace App\Http\Controllers;

use App\AddressModel;
use App\career_objectives;
use App\education_model;
use App\emergency_contact;
use App\jobSkillModel;
use App\language_model;
use App\personal_informationModel;
use App\PortfolioPhotoModel;
use App\programming_skill_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PortfolioController extends Controller
{
    //Career Objectives

    function showPortfolioPage()
    {
        return view('/content/Portfolio');
    }

    function showProfilePic()
    {
        return PortfolioPhotoModel::orderBy('id', 'desc')->get();
    }

    function populateProfilePicture(Request $request)
    {
        return PortfolioPhotoModel::where('id', '=', $request->id)->get();
    }

    function updateProfilepicture(Request $request)
    {
        $id = $request->input('id');
        $file = $request->file('file')->store('public');
        $host = $_SERVER['HTTP_HOST'];
        $fileName = (explode('/', $file))[1];
        $photo = 'http://' . $host . '/storage/' . $fileName;
        DB::table('portfolio_photo')->where('id', '=', $id)->update(['photo' => $photo]);
    }

    function getEmergencyContactList()
    {
        return emergency_contact::orderBy('id', 'desc')->get();
    }

    function populateContact(Request $request)
    {
        return emergency_contact::where('id', '=', $request->id)->get()->first();
    }

    function updateContact(Request $request)
    {
        $id = $request->input('id');
        $contactStatus = $request->input('contactStatus');
        $contactInformation = $request->input('contactInformation');
        return DB::table('emergency_contact')->where('id', '=', $id)->update(['contactStatus' => $contactStatus, 'contactInformation' => $contactInformation]);

    }

    function deleteContact(Request $request)
    {
        return emergency_contact::where('id', '=', $request->id)->delete();
    }

    function addContact(Request $request)
    {
        $contactStatus = $request->input('contactStatus');
        $contactInformation = $request->input('contactInformation');
        return DB::table('emergency_contact')->insert(['contactStatus' => $contactStatus, 'contactInformation' => $contactInformation]);

    }

    function getObjetiveList()
    {
        return career_objectives::get()->first();
    }

    function populateObjectives(Request $request)
    {
        return career_objectives::where('id', '=', $request->id)->first();
    }

    function updateObjectives(Request $request)
    {
        return DB::table('career_objectives')->where('id', '=', $request->id)->update(['objectives' => $request->objectives]);
    }

    //Education
    function getEducationList()
    {
        return education_model::orderBy('id', 'desc')->get();
    }

    function populateEducationId(Request $request)
    {
        return education_model::where('id', '=', $request->id)->first();
    }

    function educationUpdate(Request $request)
    {
        $id = $request->input('id');
        $educationDuration = $request->input('educationDuration');
        $educationInstitute = $request->input('educationInstitute');
        $educationCertificate = $request->input('educationCertificate');
        $educationMajor = $request->input('educationMajor');
        $educationCgpa = $request->input('educationCgpa');
        $educationBoard = $request->input('educationBoard');
        return DB::table('education')->where('id', '=', $id)->update(['education_duration' => $educationDuration, 'education_institute' => $educationInstitute, 'education_certificate' => $educationCertificate, 'education_major' => $educationMajor, 'education_gpa' => $educationCgpa, 'education_board' => $educationBoard]);
    }

    function deleteEducation(Request $request)
    {
        return education_model::where('id', '=', $request->id)->delete();
    }

    function addEducation(Request $request)
    {
        $educationDuration = $request->input('educationDuration');
        $educationInstitute = $request->input('educationInstitute');
        $educationCertificate = $request->input('educationCertificate');
        $educationMajor = $request->input('educationMajor');
        $educationCgpa = $request->input('educationCgpa');
        $educationBoard = $request->input('educationBoard');
        return DB::table('education')->insert(['education_duration' => $educationDuration, 'education_institute' => $educationInstitute, 'education_certificate' => $educationCertificate, 'education_major' => $educationMajor, 'education_gpa' => $educationCgpa, 'education_board' => $educationBoard]);
    }

    //Language
    function getLanguageList()
    {
        return language_model::orderBy('id', 'desc')->get();
    }

    function languagePopulateModal(Request $request)
    {
        return language_model::where('id', '=', $request->id)->first();
    }

    function updateLanguage(Request $request)
    {
        $populateLanguage = $request->input('populateLanguage');
        //How do i print $populateLanguage variable in console in order to see whether the expected result is coming or not
        $languageProficiency = $request->input('languageProficiency');
        return DB::table('language')->where('id', '=', $request->id)->update(['language' => $populateLanguage, 'language_proficiency' => $languageProficiency]);
    }

    function deleteLanguage(Request $request)
    {
        return language_model::where('id', '=', $request->id)->delete();
    }

    function addLanguage(Request $request)
    {
        $AddLanguage = $request->input('AddLanguage');
        $AddLanguageProficiency = $request->input('AddLanguageProficiency');
        return DB::table('language')->insert(['language' => $AddLanguage, 'language_proficiency' => $AddLanguageProficiency]);
    }

    //programming skills
    function getSkillsList()
    {
        return programming_skill_model::orderBy('id', 'desc')->get();
    }

    function populateSkills(Request $request)
    {
        return programming_skill_model::where('id', '=', $request->id)->first();
    }

    function updateSkills(Request $request)
    {
        $id = $request->input('id');
        $skillsProgrammingLanguage = $request->input('skillsProgrammingLanguage');
        $skillsProgrammingLanguageLevel = $request->input('skillsProgrammingLanguageLevel');
        return DB::table('programming_skills')->where('id', '=', $id)->update(['programming_language' => $skillsProgrammingLanguage, 'programming_level' => $skillsProgrammingLanguageLevel]);
    }

    function deleteSkills(Request $request)
    {
        return programming_skill_model::where('id', '=', $request->id)->delete();
    }

    function addSkills(Request $request)
    {
        $skillsProgrammingLanguage = $request->input('skillsProgrammingLanguage');
        $skillsProgrammingLanguageLevel = $request->input('skillsProgrammingLanguageLevel');
        return DB::table('programming_skills')->insert(['programming_language' => $skillsProgrammingLanguage, 'programming_level' => $skillsProgrammingLanguageLevel]);
    }

    //job skills
    function getJobSkillsList()
    {
        return jobSkillModel::orderBy('id', 'desc')->get();
    }

    function populateJobSkills(Request $request)
    {
        return jobSkillModel::where('id', '=', $request->id)->first();
    }

    function updateJobSkills(Request $request)
    {
        $id = $request->input('id');
        $jobSkillsPopulateJob = $request->input('jobSkillsPopulateJob');
        $jobSkillsPopulateInstitute = $request->input('jobSkillsPopulateInstitute');
        $jobSkillsPopulatePosition = $request->input('jobSkillsPopulatePosition');
        return DB::table('job_skill')->where('id', '=', $id)->update(['job' => $jobSkillsPopulateJob, 'workplace' => $jobSkillsPopulateInstitute, 'position' => $jobSkillsPopulatePosition]);
    }

    function deleteJobSkills(Request $request)
    {
        return jobSkillModel::where('id', '=', $request->id)->delete();
    }

    function addJobSkills(Request $request)
    {
        $jobSkillsAddJob = $request->input('jobSkillsAddJob');
        $jobSkillsAddInstitute = $request->input('jobSkillsAddInstitute');
        $jobSkillsAddPosition = $request->input('jobSkillsAddPosition');
        return DB::table('job_skill')->insert(['job' => $jobSkillsAddJob, 'workplace' => $jobSkillsAddInstitute, 'position' => $jobSkillsAddPosition]);
    }

//    personal information
    function getPersonalInformationList()
    {
        return personal_informationModel::orderBy('id', 'desc')->get();
    }

    function populatePersonalInformation(Request $request)
    {
        return personal_informationModel::where('id', '=', $request->id)->first();
    }

    function updatePersonalInformation(Request $request)
    {
        $personalInformationStatus = $request->input('personalInformationStatus');
        $personalInformation = $request->input('personalInformation');
        return DB::table('personal_infomation')->where('id', '=', $request->id)->update(['information_status' => $personalInformationStatus, 'information' => $personalInformation]);
    }

    function deletePersonalInformation(Request $request)
    {
        return personal_informationModel::where('id', '=', $request->id)->delete();

    }

    function addPersonalInformation(Request $request)
    {
        $addInformationStatus = $request->input('addInformationStatus');
        $addInformation = $request->input('addInformation');
        return DB::table('personal_infomation')->insert(['information_status' => $addInformationStatus, 'information' => $addInformation]);

    }

    //Address
    function getAddressList()
    {
        return AddressModel::orderBy('id', 'desc')->get();
    }

    function populateAddress(Request $request)
    {
        return AddressModel::where('id', '=', $request->id)->first();
    }

    function updateAddress(Request $request)
    {
        $addressInformationStatus = $request->input('addressInformationStatus');
        $addressInformation = $request->input('addressInformation');
        return DB::table('address')->where('id', '=', $request->id)->update(['address_status' => $addressInformationStatus, 'Address' => $addressInformation]);
    }

    function deleteAddress(Request $request)
    {
        return AddressModel::where('id', '=', $request->id)->delete();
    }

    function addAddress(Request $request)
    {
        $addressInformationStatus = $request->input('addressInformationStatus');
        $addressInformation = $request->input('addressInformation');
        return DB::table('address')->where('id', '=', $request->id)->insert(['address_status' => $addressInformationStatus, 'Address' => $addressInformation]);

    }

}
