<?php

namespace App\Controllers;

use App\Models\RequirementModels;

class Planning_PlanningAddressRisksOppController extends BaseController
{
    public function index()
    {
        // $RequirementModels = new RequirementModels();
        // $data['data_requirement'] = $RequirementModels->where('id_standard', 2)->first();

        // $data['data'] = [
        //     'id_version' => 1,
        //     'modified_date' => date('D/M/Y'),
        //     'review_date' => date('D/M/Y'),
        //     'approved_date' => date('D/M/Y'),
        //     'announce_date' => date('D/M/Y'),
        //     'status' => 1,
        //     'type_version' => 1,
        //     'num_ver' => 1,
        // ];

        echo view('layout/header');
        echo view('Planning/PlanningAddressRisksOpp');
    }

}
