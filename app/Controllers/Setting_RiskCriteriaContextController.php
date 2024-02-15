<?php

namespace App\Controllers;

use App\Models\RequirementModels;

class Setting_RiskCriteriaContextController extends BaseController
{
    public function index()
    {
        echo view('layout/header');
        echo view('Setting/Risk_Criteria_Context');
    }

    public function indexConsequence()
    {
        echo view('Setting/Risk_Criteria_Context_Consequence');
    }

    public function indexLikelihood()
    {
        echo view('Setting/Risk_Criteria_Context_Likelihood');
    }

    public function indexRiskLevel()
    {
        echo view('Setting/Risk_Criteria_Context_Risk_Level');
    }

    public function indexRiskOption()
    {
        echo view('Setting/Risk_Criteria_Context_Risk_Option');
    }

}
