<?php

namespace App\Controllers;

use App\Models\AllversionModels;
use App\Models\InternalModels;
use App\Models\Internal_issuesModels;
use App\Models\ExternalModels;
use App\Models\External_issuesModels;
use App\Models\InterestedModels;
use App\Models\ISMS_ScopeADModels;
use App\Models\ISMS_ScopeModels;
use App\Models\ISMS_ProcessModels;
use App\Models\FileModels;
use App\Models\RequirementModels;
use App\Models\TimelineModels;
use App\Models\Note_Models;
use App\Models\NoteComment_Models;
use App\Models\Leadership_ObjectiveModels;


class AllversionController extends BaseController
{
    protected $modelName = 'App\Models\UserModel';
    protected $format = 'json';
    public function getAllcontexts($type = null)
    {
        $AllversionModels = new AllversionModels();
        $totalRecords = $AllversionModels->where('type_version', $type)->where('id_user', session()->get('id'))->countAllResults();

        $limit = $this->request->getVar('length');
        $start = $this->request->getVar('start');
        $draw = $this->request->getVar('draw');
        $searchValue = $this->request->getVar('search')['value'];

        if (!empty($searchValue)) {
            $AllversionModels->groupStart()
                ->like('id_version', $searchValue) // แทน 'column1', 'column2', ... ด้วยชื่อคอลัมน์ที่คุณต้องการค้นหา
                ->orLike('modified_date', $searchValue)
                ->orLike('review_date', $searchValue)
                ->orLike('approved_date', $searchValue)
                // เพิ่มคอลัมน์เพิ่มเติมตามที่ต้องการค้นหา
                ->groupEnd();
        }

        $recordsFiltered = $totalRecords;
        $data = $AllversionModels->where('type_version', $type)->where('id_user', session()->get('id'))->findAll($limit, $start);

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
            'searchValue' => $searchValue
        ];

        return $this->response->setJSON($response);
    }

    public function context_index($type = null)
    {
        $RequirementModels = new RequirementModels();
        $data['type'] = $type;
        if ($type == '1') {
            $data['header'] = "Context Analysis";
            $data['url'] = "context/context_analysis/";
            $data['data_requirement'] = $RequirementModels->where('id_standard', 1)->first();
        } else if ($type == '2') {
            $data['header'] = "Interested Party";
            $data['url'] = "context/interested_party/";
            $data['data_requirement'] = $RequirementModels->where('id_standard', 2)->first();
        } else if ($type == '3') {
            $data['header'] = "ISMS Scope";
            $data['url'] = "context/isms_scope/";
            $data['data_requirement'] = $RequirementModels->where('id_standard', 3)->first();
        } else if ($type == '4') {
            $data['header'] = "ISMS Process";
            $data['url'] = "context/isms_process/";
            $data['data_requirement'] = $RequirementModels->where('id_standard', 4)->first();
        } else if ($type == '7') {
            $data['header'] = "IS Objective";
            $data['url'] = "leadership/commitment/is_objective/index/";
            $data['data_requirement'] = $RequirementModels->where('id_standard', 5)->first();
        } else {

        }
        echo view('layout/header');
        echo view('Context/context_allversion', $data);
    }

    public function loaddata_data_type($type = null)
    {
        $AllversionModels = new AllversionModels();
        $userId = session()->get('id');

        $getdata1 = $AllversionModels
            ->where('id_user', $userId)
            ->where('type_version', $type)
            ->where('announce_date IS NOT NULL', null, false)
            ->where('status', 4)
            ->orderBy('id_version', 'desc') // Assuming you have a created_at column
            ->first();

        if (empty($getdata1)) {
            $getdata1 = $AllversionModels
                ->where('id_user', $userId)
                ->where('type_version', $type)
                ->orderBy('id_version', 'desc') // แบบนี้จะเรียกข้อมูลล่าสุดก่อน
                ->first();
            if (empty($getdata1)) {
                return redirect()->to('context/version/create/' . $type . '/2');
            }
        }

        $data['data'] = $getdata1;

        $allData = $AllversionModels
            ->where('id_user', $userId)
            ->where('type_version', $type)
            ->findAll();

        $numVer = 0;

        foreach ($allData as $i => $version) {
            if ($getdata1['id_version'] == $version['id_version']) {
                $numVer = $i + 1;
                break; // Exit the loop once found
            }
        }

        $numver = [
            'num_ver' => $numVer
        ];
        $data['data'] = array_merge($data['data'], $numver);
        if ($type == '1') {
            return redirect()->to('context/context_analysis/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '2') {
            return redirect()->to('context/interested_party/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '3') {
            return redirect()->to('context/isms_scope/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '4') {
            return redirect()->to('context/isms_process/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '6') {
            return redirect()->to('leadership/commitment/org/create_first_time/' . (int) $data['data']['id_version']);
        } else if ($type == '7') {
            return redirect()->to('leadership/commitment/is_objective/index/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '8') {
            return redirect()->to('leadership/policy/' . (int) $data['data']['id_version'] . '/' . $data['data']['num_ver']);
        } else if ($type == '9') {
            return redirect()->to('leadership/isms/index/' . (int) $data['data']['id_version']);
        } else {

        }
    }
    public function context_analysis_version($id_version = null, $num_ver = null)
    {
        $AllversionModels = new AllversionModels();
        $internal_issmodel = new Internal_issuesModels();
        $external_issmodel = new External_issuesModels();
        $RequirementModels = new RequirementModels();
        $data['data_requirement'] = $RequirementModels->where('id_standard', 1)->first();

        $data['data'] = $AllversionModels->where('id_version', $id_version)->first();
        $numver = [
            'num_ver' => $num_ver
        ];
        $data['data'] = array_merge($data['data'], $numver); // Merge the new version data
        $data['data_inter_iss'] = $internal_issmodel->getData();
        $data['data_exter_iss'] = $external_issmodel->getData();

        echo view('layout/header');
        echo view('Context/context_analysis', $data);
    }

    public function context_analysis_version_create($type = null, $type_create = null)
    {
        $AllversionModels = new AllversionModels();
        $data = [
            'modified_date' => null,
            'review_date' => null,
            'approved_date' => null,
            'announce_date' => null,
            'status' => 0,
            'comment_reject_rv' => "-",
            'comment_reject_ap' => "-",
            'id_user' => session()->get('id'),
            'type_version' => $type
        ];
        $AllversionModels->save($data);
        $id_version = $AllversionModels->insertID();

        if ($AllversionModels->affectedRows() > 0) {

            $number_ver = $AllversionModels->where('type_version', $type)->where('id_user', session()->get('id'))->countAllResults();
            $response = [
                'success' => true,
                'message' => 'Successfully created data',
                'type' => $type,
                'id_version' => $id_version,
                'number_ver' => $number_ver,
                'reload' => false,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Unable to delete data!',
            ];
        }
        if ($type_create == '1') {
            return $this->response->setJSON($response);
        } else {
            return redirect()->to('context/loaddatatype/' . (int) $type);
        }

    }

    public function openfile($id_file = null)
    {
        $filemodel = new FileModels();
        $data['file'] = $filemodel->find($id_file);

        if ($data['file']) {
            $namefile = $data['file']['name_file'];
            $path = 'public/uploads/' . $id_file . '/' . $namefile;

            return redirect()->to(base_url($path));
        } else {
            // Handle file not found
            return redirect()->to('error404');
        }
    }

    public function renamefile($id_file = null)
    {
        $filemodel = new FileModels();
        helper('filesystem');
        helper(['form']);
        $newname = $this->request->getvar('namefile');
        $oldname = $this->request->getvar('oldname');
        $parts = explode('.', $oldname);
        // เลือกคำสุดท้าย
        $lastPart = end($parts);
        $old = ROOTPATH . 'public/uploads/' . $id_file . '/' . $oldname;
        $new = ROOTPATH . 'public/uploads/' . $id_file . '/' . $newname . '.' . $lastPart;
        rename($old, $new);
        $file_update = [
            'name_file' => $newname.'.' . $lastPart,
        ];
        $check = $filemodel->update($id_file, $file_update);
        if ($check == false) {
            $response = [
                'success' => false,
                'message' => 'Unable to rename file!',
            ];
        } else {
            $response = [
                'success' => true,
                'message' => 'Rename File Successfully',
                'reload' => true,
            ];
        }
        return $this->response->setJSON($response);
    }

    public function dowloadfile($id_file = null)
    {
        $filemodel = new FileModels();
        $data['file'] = $filemodel->find($id_file);

        if ($data['file']) {
            $namefile = $data['file']['name_file'];
            $path = 'public/uploads/' . $id_file . '/' . $namefile;

            return $this->response->download($path, null);
        } else {
            // Handle file not found
            return redirect()->to('error404');
        }
    }

    public function edit_all($id_version = null, $status_version = null)
    {
        helper('filesystem');
        helper(['form']);
        $TimelineModels = new TimelineModels();
        $filemodel = new FileModels();
        $internalmodel = new InternalModels();
        $externalmodel = new ExternalModels();
        $interestedmodel = new InterestedModels();
        $scopeadmodel = new ISMS_ScopeADModels();
        $scopemodel = new ISMS_ScopeModels();
        $isms_processmodel = new ISMS_ProcessModels();
        $check = $this->request->getVar('check');
        $id_ = $this->request->getVar('id_');
        $file = $this->request->getFile('file');
        if ($file !== null && $file->isValid()) {
            // var_dump($file);
            $newName = $file->getClientName();
            if ($check == 1) {
                $check_file = $internalmodel->where('id_internal', $id_)->findAll();
            } else if ($check == 2) {
                $check_file = $externalmodel->where('id_external', $id_)->findAll();
            } else if ($check == 3) {
                $check_file = $interestedmodel->where('id_interested', $id_)->findAll();
            } else if ($check == 4) {
                $check_file = $scopeadmodel->where('id_scope_activites', $id_)->findAll();
            } else if ($check == 6) {
                $check_file = $isms_processmodel->where('id_isms_process', $id_)->findAll();
            } else {

            }
            if ($check_file[0]['id_file']) {
                $del_path = 'public/uploads/' . $check_file[0]['id_file'] . '/'; // For Delete folder
                $check_de_file = delete_files($del_path, false); // Delete files into the folder
                if (!$check_de_file) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถเพิ่มไฟล์ใหม่ได้!',
                    ];
                    return $this->response->setJSON($response);
                } else {
                    $file->move(ROOTPATH . 'public/uploads/' . $check_file[0]['id_file'], $newName);
                    $file_update = [
                        'name_file' => $newName,
                    ];
                    $filemodel->update($check_file[0]['id_file'], $file_update);
                }
            } else {
                $filemodel->insert([
                    'name_file' => $newName,
                ]);
                $id_file = $filemodel->insertID();
                $file->move(ROOTPATH . 'public/uploads/' . $id_file, $newName);
                if ($check == 1) {
                    $data = [
                        'id_file' => $id_file,
                    ];
                    $internalmodel->update($id_, $data);
                    $data_log = [
                        'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Internal Issues',
                        'type_timeline' => 1,
                        'status_id' => $status_version,
                        'id_note' => null,
                        'id_user' => session()->get('id'),
                        'id_version' => $id_version,
                    ];
                    //$TimelineModels->save($data_log);
                } else if ($check == 2) {
                    $data = [
                        'id_file' => $id_file,
                    ];
                    $externalmodel->update($id_, $data);
                    $data_log = [
                        'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified External Issues',
                        'type_timeline' => 1,
                        'status_id' => $status_version,
                        'id_note' => null,
                        'id_user' => session()->get('id'),
                        'id_version' => $id_version,
                    ];
                    //$TimelineModels->save($data_log);
                } else if ($check == 3) {
                    $data = [
                        'id_file' => $id_file,
                    ];
                    $interestedmodel->update($id_, $data);
                    $data_log = [
                        'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Interested Party',
                        'type_timeline' => 1,
                        'status_id' => $status_version,
                        'id_note' => null,
                        'id_user' => session()->get('id'),
                        'id_version' => $id_version,
                    ];
                    //$TimelineModels->save($data_log);
                } else if ($check == 4) {
                    $data = [
                        'id_file' => $id_file,
                    ];
                    $scopeadmodel->update($id_, $data);
                    $data_log = [
                        'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Scope Activities Diagram',
                        'type_timeline' => 1,
                        'status_id' => $status_version,
                        'id_note' => null,
                        'id_user' => session()->get('id'),
                        'id_version' => $id_version,
                    ];
                    //$TimelineModels->save($data_log);
                } else if ($check == 6) {
                    $data = [
                        'id_file' => $id_file,
                    ];
                    $isms_processmodel->update($id_, $data);
                    $data_log = [
                        'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified ISMS Process',
                        'type_timeline' => 1,
                        'status_id' => $status_version,
                        'id_note' => null,
                        'id_user' => session()->get('id'),
                        'id_version' => $id_version,
                    ];
                    //$TimelineModels->save($data_log);
                } else {

                }
            }
        }

        if ($check == 1) {
            $data = [
                'id_internal_issues' => $this->request->getVar('iss'),
                'effect' => $this->request->getVar('effect'),
            ];
            $check = $internalmodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล Internal ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Internal Issues',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล Internal สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else if ($check == 2) {
            $data = [
                'id_external_issues' => $this->request->getVar('iss'),
                'effect' => $this->request->getVar('effect'),
            ];
            $check = $externalmodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล External ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified External Issues',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล External สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else if ($check == 3) {
            $data = [
                'id_interested_issues' => $this->request->getVar('iss'),
                'effect' => $this->request->getVar('effect'),
            ];
            $check = $interestedmodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล Interested ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Interested Party',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล Interested สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else if ($check == 4) {
            $data = [
                'date_upload' => date("d/m/Y"),
            ];
            $check = $scopeadmodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล Scope Activities Diagram ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Scope Activities Diagram',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล Scope Activities Diagram สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else if ($check == 5) {
            $data = [
                'location' => $this->request->getVar('location'),
                'organization' => $this->request->getVar('organization'),
                'system_service' => $this->request->getVar('system_service'),
                'scope_statement' => $this->request->getVar('scope_statement'),
            ];
            $check = $scopemodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล Scope ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified Scope',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล Scope สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else if ($check == 6) {
            $data = [
                'date_upload' => date("d/m/Y"),
            ];
            $check = $isms_processmodel->update($id_, $data);
            if ($check == false) {
                $response = [
                    'success' => false,
                    'message' => 'ไม่สามารถแก้ไขข้อมูล ISMS Process ได้',
                ];
            } else {
                $data_log = [
                    'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' Modified ISMS Process',
                    'type_timeline' => 1,
                    'status_id' => $status_version,
                    'id_note' => null,
                    'id_user' => session()->get('id'),
                    'id_version' => $id_version,
                ];
                $TimelineModels->save($data_log);
                $response = [
                    'success' => true,
                    'message' => 'แก้ไขข้อมูล ISMS Process สำเร็จ!',
                    'reload' => true,
                ];
            }
        } else {

        }

        return $this->response->setJSON($response);
    }
    public function delete($id = null)
    {
        $AllversionModels = new AllversionModels();
        $internalmodel = new InternalModels();
        $externalmodel = new ExternalModels();
        $interestedmodel = new InterestedModels();
        $scopemodel = new ISMS_ScopeModels();
        $scopeadmodel = new ISMS_ScopeADModels();
        $filemodel = new FileModels();
        $TimelineModels = new TimelineModels();
        $Note_Models = new Note_Models();
        $NoteComment_Models = new NoteComment_Models();

        $inter = $internalmodel->where('id_version', $id)->findAll();
        $exter = $externalmodel->where('id_version', $id)->findAll();
        $interested = $interestedmodel->where('id_version', $id)->findAll();
        $scope = $scopemodel->where('id_version', $id)->findAll();
        $scopead = $scopeadmodel->where('id_version', $id)->findAll();
        $timeline = $TimelineModels->where('id_version', $id)->findAll();
        $note = $Note_Models->where('id_version ', $id)->findAll();

        if ($inter) {
            foreach ($inter as $key) {
                if ($key['id_file']) {
                    helper('filesystem');

                    $filemodel->where('id_files ', $key['id_file'])->delete($key['id_file']);
                    $del_path = 'public/uploads/' . $key['id_file'] . '/'; // For Delete folder
                    $check1 = delete_files($del_path, true); // Delete files into the folder
                    $check2 = rmdir($del_path);
                    if (!$check1) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ File ของ Internal ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                    if (!$check2) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ folder ของ Internal ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
                $check = $internalmodel->where('id_internal', $key['id_internal'])->delete($key['id_internal']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ Internal ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($exter) {
            foreach ($exter as $key) {
                if ($key['id_file']) {
                    helper('filesystem');

                    $filemodel->where('id_files ', $key['id_file'])->delete($key['id_file']);
                    $del_path = 'public/uploads/' . $key['id_file'] . '/'; // For Delete folder
                    $check1 = delete_files($del_path, true); // Delete files into the folder
                    $check2 = rmdir($del_path);
                    if (!$check1) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ File ของ External ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                    if (!$check2) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ folder ของ External ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
                $check = $externalmodel->where('id_external', $key['id_external'])->delete($key['id_external']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ External ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($interested) {
            foreach ($interested as $key) {
                if ($key['id_file']) {
                    helper('filesystem');

                    $filemodel->where('id_files ', $key['id_file'])->delete($key['id_file']);
                    $del_path = 'public/uploads/' . $key['id_file'] . '/'; // For Delete folder
                    $check1 = delete_files($del_path, true); // Delete files into the folder
                    $check2 = rmdir($del_path);
                    if (!$check1) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ File ของ Interested ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                    if (!$check2) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ folder ของ Interested ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
                $check = $interestedmodel->where('id_interested', $key['id_interested'])->delete($key['id_interested']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ Interested ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($scope) {
            foreach ($scope as $key) {
                $check = $scopemodel->where('id_scope', $key['id_scope'])->delete($key['id_scope']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ scope ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($scopead) {
            foreach ($scopead as $key) {
                if ($key['id_file']) {
                    helper('filesystem');

                    $filemodel->where('id_files ', $key['id_file'])->delete($key['id_file']);
                    $del_path = 'public/uploads/' . $key['id_file'] . '/'; // For Delete folder
                    $check1 = delete_files($del_path, true); // Delete files into the folder
                    $check2 = rmdir($del_path);
                    if (!$check1) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ File ของ scope ad ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                    if (!$check2) {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถลบ folder ของ scope ad ได้!',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
                $check = $scopeadmodel->where('id_scope_activites', $key['id_scope_activites'])->delete($key['id_scope_activites']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ scope ad ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($timeline) {
            foreach ($timeline as $key) {
                $check = $TimelineModels->where('id_timeline', $key['id_timeline'])->delete($key['id_timeline']);
                if (!$check) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ Timeline ได้!',
                    ];
                    return $this->response->setJSON($response);
                }
            }
        }
        if ($note) {
            foreach ($note as $key) {
                $check_note = $Note_Models->where('id_note', $key['id_note'])->delete($key['id_note']);
                if (!$check_note) {
                    $response = [
                        'success' => false,
                        'message' => 'ไม่สามารถลบ Note ได้!',
                    ];
                    return $this->response->setJSON($response);
                } else {
                    $notecomment = $NoteComment_Models->where('id_note ', $key['id_note'])->findAll();
                    if ($notecomment) {
                        foreach ($notecomment as $key) {
                            $check_notecomment = $NoteComment_Models->where('id_note_comment ', $key['id_note_comment'])->delete($key['id_note_comment']);
                            if (!$check_notecomment) {
                                $response = [
                                    'success' => false,
                                    'message' => 'ไม่สามารถลบ Comment ได้!',
                                ];
                                return $this->response->setJSON($response);
                            }
                        }
                    }
                }
            }
        }
        $check_context = $AllversionModels->where('id_version ', $id)->delete($id);
        if ($check_context) {
            $response = [
                'success' => true,
                'message' => 'Successfully deleted data',
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Unable to delete data!',
            ];
        }
        return $this->response->setJSON($response);
    }

    public function copyData($id = null)
    {
        $AllversionModels = new AllversionModels();
        $internalmodel = new InternalModels();
        $externalmodel = new ExternalModels();
        $interestedmodel = new InterestedModels();
        $scopemodel = new ISMS_ScopeModels();
        $scopeadmodel = new ISMS_ScopeADModels();
        $filemodel = new FileModels();
        $Leadership_ObjectiveModels = new Leadership_ObjectiveModels();

        $inter = $internalmodel->where('id_version', $id)->findAll();
        $exter = $externalmodel->where('id_version', $id)->findAll();
        $interested = $interestedmodel->where('id_version', $id)->findAll();
        $scope = $scopemodel->where('id_version', $id)->findAll();
        $scopead = $scopeadmodel->where('id_version', $id)->findAll();
        $Leadership_Objective = $Leadership_ObjectiveModels->where('id_version', $id)->findAll();
        $newData_context = $AllversionModels->copyDataById($id);
        $new_id_version = $AllversionModels->insertID();
        $data = [
            'status' => 0,
            'modified_date' => NULL,
            'review_date' => NULL,
            'approved_date' => NULL,
            'announce_date' => NULL,
        ];
        $AllversionModels->update($new_id_version, $data);
        if ($newData_context) {
            if ($inter) {
                foreach ($inter as $key) {
                    $file = $filemodel->where('id_files', $key['id_file'])->findAll();
                    if ($file) {
                        $newDataFile = $filemodel->copyDataById($file[0]['id_files']);
                        if ($newDataFile) {
                            $id_file = $filemodel->insertID();
                            $targetDir = ROOTPATH . 'public/uploads/' . $id_file; // เปลี่ยนตามต้องการ
                            if (!is_dir($targetDir)) {
                                mkdir($targetDir, 0777, true);
                            }
                            copy(ROOTPATH . 'public/uploads/' . $file[0]['id_files'] . '/' . $file[0]['name_file'], ROOTPATH . 'public/uploads/' . $id_file . '/' . $file[0]['name_file']);

                            $newData_inter = $internalmodel->copyDataById($key['id_internal']);
                            if ($newData_inter) {
                                $id_inter_new = $internalmodel->insertID();
                                $inter_update = [
                                    'id_file' => $id_file,
                                    'id_version' => $new_id_version,
                                ];
                                $internalmodel->update($id_inter_new, $inter_update);
                            } else {
                                $response = [
                                    'success' => false,
                                    'message' => 'ไม่สามารถคัดลอกข้อมูล Copy Internal ได้',
                                ];
                                return $this->response->setJSON($response);
                            }
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล File ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    } else {
                        $newData_inter = $internalmodel->copyDataById($key['id_internal']);
                        if ($newData_inter) {
                            $id_inter_new = $internalmodel->insertID();
                            $inter_update = [
                                'id_file' => 0,
                                'id_version' => $new_id_version,
                            ];
                            $internalmodel->update($id_inter_new, $inter_update);
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล Copy Internal ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    }
                }
            }
            if ($exter) {
                foreach ($exter as $key) {
                    $file = $filemodel->where('id_files', $key['id_file'])->findAll();
                    if ($file) {
                        $newDataFile = $filemodel->copyDataById($file[0]['id_files']);
                        if ($newDataFile) {
                            $id_file = $filemodel->insertID();
                            $targetDir = ROOTPATH . 'public/uploads/' . $id_file; // เปลี่ยนตามต้องการ
                            if (!is_dir($targetDir)) {
                                mkdir($targetDir, 0777, true);
                            }
                            copy(ROOTPATH . 'public/uploads/' . $file[0]['id_files'] . '/' . $file[0]['name_file'], ROOTPATH . 'public/uploads/' . $id_file . '/' . $file[0]['name_file']);
                            $newData_external = $externalmodel->copyDataById($key['id_external']);
                            if ($newData_external) {
                                $id_external_new = $externalmodel->insertID();
                                $external_update = [
                                    'id_file' => $id_file,
                                    'id_version' => $new_id_version,
                                ];
                                $externalmodel->update($id_external_new, $external_update);
                            } else {
                                $response = [
                                    'success' => false,
                                    'message' => 'ไม่สามารถคัดลอกข้อมูล Copy External ได้',
                                ];
                                return $this->response->setJSON($response);
                            }
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล File ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    } else {
                        $newData_external = $externalmodel->copyDataById($key['id_external']);
                        if ($newData_external) {
                            $id_external_new = $externalmodel->insertID();
                            $external_update = [
                                'id_file' => 0,
                                'id_version' => $new_id_version,
                            ];
                            $externalmodel->update($id_external_new, $external_update);
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล Copy External ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    }
                }
            }
            if ($interested) {
                foreach ($interested as $key) {
                    $file = $filemodel->where('id_files', $key['id_file'])->findAll();
                    if ($file) {
                        $newDataFile = $filemodel->copyDataById($file[0]['id_files']);
                        if ($newDataFile) {
                            $id_file = $filemodel->insertID();
                            $targetDir = ROOTPATH . 'public/uploads/' . $id_file; // เปลี่ยนตามต้องการ
                            if (!is_dir($targetDir)) {
                                mkdir($targetDir, 0777, true);
                            }
                            copy(ROOTPATH . 'public/uploads/' . $file[0]['id_files'] . '/' . $file[0]['name_file'], ROOTPATH . 'public/uploads/' . $id_file . '/' . $file[0]['name_file']);
                            $newData_interested = $interestedmodel->copyDataById($key['id_interested']);
                            if ($newData_interested) {
                                $id_interested_new = $interestedmodel->insertID();
                                $interested_update = [
                                    'id_file' => $id_file,
                                    'id_version' => $new_id_version,
                                ];
                                $interestedmodel->update($id_interested_new, $interested_update);
                            } else {
                                $response = [
                                    'success' => false,
                                    'message' => 'ไม่สามารถคัดลอกข้อมูล Copy Interested ได้',
                                ];
                                return $this->response->setJSON($response);
                            }
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล File ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    } else {
                        $newData_interested = $interestedmodel->copyDataById($key['id_interested']);
                        if ($newData_interested) {
                            $id_interested_new = $interestedmodel->insertID();
                            $interested_update = [
                                'id_file' => 0,
                                'id_version' => $new_id_version,
                            ];
                            $interestedmodel->update($id_interested_new, $interested_update);
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล Copy Interested ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    }
                }
            }
            if ($scope) {
                foreach ($scope as $key) {
                    $newData_scope = $scopemodel->copyDataById($key['id_scope']);
                    if ($newData_scope) {
                        $id_scope_new = $scopemodel->insertID();
                        $scope_update = [
                            'id_file' => 0,
                            'id_version' => $new_id_version,
                        ];
                        $scopemodel->update($id_scope_new, $scope_update);
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'ไม่สามารถคัดลอกข้อมูล Copy scope ได้',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
            }
            if ($scopead) {
                foreach ($scopead as $key) {
                    $file = $filemodel->where('id_files', $key['id_file'])->findAll();
                    if ($file) {
                        $newDataFile = $filemodel->copyDataById($file[0]['id_files']);
                        if ($newDataFile) {
                            $id_file = $filemodel->insertID();
                            $targetDir = ROOTPATH . 'public/uploads/' . $id_file; // เปลี่ยนตามต้องการ
                            if (!is_dir($targetDir)) {
                                mkdir($targetDir, 0777, true);
                            }
                            copy(ROOTPATH . 'public/uploads/' . $file[0]['id_files'] . '/' . $file[0]['name_file'], ROOTPATH . 'public/uploads/' . $id_file . '/' . $file[0]['name_file']);
                            $newData_scopead = $scopeadmodel->copyDataById($key['id_scope_activites']);
                            if ($newData_scopead) {
                                $id_scopead_new = $scopeadmodel->insertID();
                                $scopead_update = [
                                    'id_file' => $id_file,
                                    'id_version' => $new_id_version,
                                ];
                                $scopeadmodel->update($id_scopead_new, $scopead_update);
                            } else {
                                $response = [
                                    'success' => false,
                                    'message' => 'ไม่สามารถคัดลอกข้อมูล Copy scope ad ได้',
                                ];
                                return $this->response->setJSON($response);
                            }
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล File ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    } else {
                        $newData_scopead = $scopeadmodel->copyDataById($key['id_scope_activites ']);
                        if ($newData_scopead) {
                            $id_scopead_new = $scopeadmodel->insertID();
                            $scopead_update = [
                                'id_file' => 0,
                                'id_version' => $new_id_version,
                            ];
                            $scopeadmodel->update($id_scopead_new, $scopead_update);
                        } else {
                            $response = [
                                'success' => false,
                                'message' => 'ไม่สามารถคัดลอกข้อมูล Copy scope ad ได้',
                            ];
                            return $this->response->setJSON($response);
                        }
                    }
                }
            }
            if ($Leadership_Objective) {
                foreach ($Leadership_Objective as $key) {
                    $newData_Leadership_Objective = $Leadership_ObjectiveModels->copyDataById($key['id_is_objective']);
                    if ($newData_Leadership_Objective) {
                        $id_Leadership_Objective_new = $Leadership_ObjectiveModels->insertID();
                        $Leadership_Objective_update = [
                            'id_version' => $new_id_version,
                        ];
                        $Leadership_ObjectiveModels->update($id_Leadership_Objective_new, $Leadership_Objective_update);
                    } else {
                        $response = [
                            'success' => false,
                            'message' => 'Copy Leadership Objective data cannot be copied.',
                        ];
                        return $this->response->setJSON($response);
                    }
                }
            }
            $type_Version = $AllversionModels->where('id_version', $newData_context)->findColumn('type_version');
            $num_ver = $AllversionModels->where('type_version', $type_Version)->where('id_user', session()->get('id'))->countAllResults();
            $response = [
                'success' => true,
                'message' => 'คัดลอกข้อมูลสำเร็จ!',
                'reload' => true,
                'newCopy' => true,
                'id_version' => $new_id_version,
                'num_ver' => $num_ver,
            ];
            return $this->response->setJSON($response);
        } else {
            $response = [
                'success' => false,
                'message' => 'ไม่สามารถคัดลอกข้อมูลได้!',
            ];
            return $this->response->setJSON($response);
        }

    }

    public function update_status($id = null, $status = null)
    {
        $id_note = null;

        $AllversionModels = new AllversionModels();
        if ($status == 1) {
            $message = "Pending Review!";
        } else if ($status == 2) {
            $date = "review_date";
            $message = "Review confirmed!";
        } else if ($status == 3) {
            $message = "Pending Approval!";
        } else if ($status == 4) {
            $date = "approved_date";
            $message = "Confirmed approval!";
        }
        if ($status == 1 || $status == 3) {
            $data = [
                'status' => $status,
            ];
        } else {
            $data = [
                'status' => $status,
                $date => date('d/m/Y')
            ];
        }

        $update = $AllversionModels->update($id, $data);
        if ($update) {
            $TimelineModels = new TimelineModels();
            $data_log = [
                'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' change status to',
                'type_timeline' => 2,
                'status_id' => $status,
                'id_note' => $id_note,
                'id_user' => session()->get('id'),
                'id_version' => $id,
            ];

            $TimelineModels->save($data_log);
            $response = [
                'success' => true,
                'message' => $message,
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ไม่สามารถเปลี่ยนสถานะได้!',
            ];
        }
        return $this->response->setJSON($response);
    }

    // ****************************************************************
    public function update_status_reject($id_version = null)
    {
        $id_note = null;
        helper(['form']);
        $AllversionModels = new AllversionModels();
        $Note_Models = new Note_Models();

        $text = $this->request->getVar('text');
        $status_version = $this->request->getVar('status');
        $modified_date = $this->request->getVar('modified_date');

        if (!empty($text)) {
            $data_note = [
                'text' => $text,
                'id_user' => session()->get('id'),
                'status_id' => $status_version,
                'id_version' => $id_version,
                'date_modifiend' => $modified_date,
            ];
            $Note_Models->save($data_note);
            $id_note = $Note_Models->insertID();
        }
        $reject = $AllversionModels->update($id_version, ['status' => $status_version]);

        if ($reject) {
            $TimelineModels = new TimelineModels();
            $data_log = [
                'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' change status to',
                'type_timeline' => 2,
                'status_id' => $status_version,
                'id_note' => $id_note,
                'id_user' => session()->get('id'),
                'id_version' => $id_version,
            ];
            $TimelineModels->save($data_log);
            $response = [
                'success' => true,
                'message' => 'Rejection confirmed!',
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ไม่สามารถเปลี่ยนสถานะได้!',
            ];
        }
        return $this->response->setJSON($response);
    }

    public function update_date($id_version = null, $check = null)
    {
        $AllversionModels = new AllversionModels();
        if ($check == 1) {
            $date = "review_date";
            $message = "Update Review date!";
        } else if ($check == 2) {
            $date = "approved_date";
            $message = "Update Approved date!";
        }
        $data = [
            $date => date('d/m/Y')
        ];
        $update = $AllversionModels->update($id_version, $data);
        if ($update) {
            $response = [
                'success' => true,
                'message' => $message,
                'reload' => true,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ไม่สามารถเปลี่ยนสถานะได้!',
            ];
        }
        return $this->response->setJSON($response);

    }

    public function update_context()
    {
        $AllversionModels = new AllversionModels();
        $Note_Models = new Note_Models();
        helper(['form']);
        $status = $this->request->getVar('status');
        $id_version = $this->request->getVar('id_');
        $announce = $this->request->getVar('announce');
        $id_note = null;

        if ($announce) {
            $data = [
                'announce_date' => $announce,
            ];
            $onupdate = $AllversionModels->update($id_version, $data);
        } else {
            $details = $this->request->getVar('description');
            if (!$details) {
                $details = "-";
            }
            $modified_date = $this->request->getVar('modified');
            if (!$modified_date) {
                $modified_date = null;
            }
            $review_date = $this->request->getVar('reviewed');
            if (!$review_date) {
                $review_date = null;
            }
            $approved_date = $this->request->getVar('approved');
            if (!$approved_date) {
                $approved_date = null;
            }
            $comment_reject = $this->request->getVar('commentTextArea');
            if ($comment_reject) {
                $datanote = [
                    'text' => $comment_reject,
                    'id_user' => session()->get('id'),
                    'status_id' => $status,
                    'id_version' => $id_version,
                    'date_modifiend' => $modified_date,
                ];
                $Note_Models->save($datanote);
                $id_note = $Note_Models->insertID();
            }
            $data = [
                'modified_date' => $modified_date,
                'review_date' => $review_date,
                'approved_date' => $approved_date,
                'status' => $status,
            ];
            $onupdate = $AllversionModels->update($id_version, $data);
        }
        if ($onupdate) {
            $TimelineModels = new TimelineModels();
            $data_log = [
                'text_timeline' => session()->get('name') . ' ' . session()->get('lastname') . ' change status to',
                'type_timeline' => 2,
                'status_id' => $status,
                'id_note' => $id_note,
                'id_user' => session()->get('id'),
                'id_version' => $id_version,
            ];

            $TimelineModels->save($data_log);
            $response = [
                'success' => true,
                'message' => 'เปลี่ยนแปลง Version Control สำเร็จ!',
                'reload' => true,
                'status' => $status,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'ไม่สามารถเปลี่ยน Version Control ได้!',

            ];
        }
        return $this->response->setJSON($response);
    }
}