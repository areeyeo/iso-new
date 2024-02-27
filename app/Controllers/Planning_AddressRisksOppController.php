<?php

namespace App\Controllers;

use App\Models\RequirementModels;

class Planning_AddressRisksOppController extends BaseController
{
    public function index()
    {
        $RequirementModels = new RequirementModels();
        $data['data_requirement'] = $RequirementModels->where('id_standard', 2)->first();

        $data['data_context'] = [
            'id_version' => 1,
            'modified_date' => date('D/M/Y'),
            'review_date' => date('D/M/Y'),
            'approved_date' => date('D/M/Y'),
            'announce_date' => date('D/M/Y'),
            'status' => 1,
            'type_version' => 1,
            'num_ver' => 1,
        ];

        $data['data_is'] = [
            'id_version' => 2,
            'modified_date' => date('D/M/Y'),
            'review_date' => date('D/M/Y'),
            'approved_date' => date('D/M/Y'),
            'announce_date' => date('D/M/Y'),
            'status' => 2,
            'type_version' => 2,
            'num_ver' => 2,
        ];

        echo view('layout/header');
        echo view('Planning/PlanningAddressRisksOpp', $data);
    }

    public function indexCrudContext()
    {
        echo view('layout/header');
        echo view('Planning/CRUD_RiskOppContext');
    }

    public function indexCrudIS()
    {
        echo view('layout/header');
        echo view('Planning/CRUD_RiskOppIS');
    }

}
