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

class PortfolioController extends Controller
{
    function portfolioShowPage()
    {
        $emergency = emergency_contact::all();
        $career_objectives = career_objectives::first();
        $education_model = education_model::all();
        $language_model = language_model::all();
        $programming_skill_model = programming_skill_model::all();
        $jobSkillModel = jobSkillModel::all();
        $personal_informationModel = personal_informationModel::all();
        $AddressModel = AddressModel::all();
        $PortfolioPhotoModel = PortfolioPhotoModel::all();
        return view('/content/Portfolio', [
            'emergencyKey' => $emergency,
            'objectivesKey' => $career_objectives,
            'education_modelKey' => $education_model,
            'language_modelKey' => $language_model,
            'programming_skill_modelKey' => $programming_skill_model,
            'jobSkillModel' => $jobSkillModel,
            'personal_informationModel' => $personal_informationModel,
            'AddressModel' => $AddressModel,
            'PortfolioPhotoModel' => $PortfolioPhotoModel
            
        ]);
    }

}
