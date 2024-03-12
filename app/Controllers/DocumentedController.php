<?php

namespace App\Controllers;

use App\Models\RequirementModels;

class DocumentedController extends BaseController
{
    public function index($id_version = null, $num_ver = null)
    {
        
        $RequirementModels = new RequirementModels();
        $data['data_requirement'] = $RequirementModels->where('id_standard', 2)->first();

        $data['data'] = [
            'id_version' => 1,
            'modified_date' => date('D/M/Y'),
            'review_date' => date('D/M/Y'),
            'approved_date' => date('D/M/Y'),
            'announce_date' => date('D/M/Y'),
            'status' => 1,
            'type_version' => 1,
            'num_ver' => 1,
        ];

        $data['data_createup'] = [
            'id_version' => 1,
            'modified_date' => date('D/M/Y'),
            'review_date' => date('D/M/Y'),
            'approved_date' => date('D/M/Y'),
            'announce_date' => date('D/M/Y'),
            'status' => 1,
            'type_version' => 1,
            'num_ver' => 1,
        ];

        $data['data_control'] = [
            'id_version' => 1,
            'modified_date' => date('D/M/Y'),
            'review_date' => date('D/M/Y'),
            'approved_date' => date('D/M/Y'),
            'announce_date' => date('D/M/Y'),
            'status' => 1,
            'type_version' => 1,
            'num_ver' => 1,
        ];
        
        echo view('layout/header');
        echo view('Support/Documented', $data);
    }
    
    public function indexCrudCreateUpdate()
    {
        echo view('layout/header');
        echo view('Support/CRUD_Create_Update');
    }
    }
