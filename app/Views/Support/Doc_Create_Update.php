<title>Documented Information Version</title>
<style>
    .table-wrapper {
        max-height: 400px;
        overflow-y: auto;
    }

    .table-wrapper::-webkit-scrollbar {
        width: 10px;
    }

    .table-wrapper::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
        background-color: #ADB5BD;
        border-radius: 10px;
        border: 3px solid #f1f1f1;
    }

    .table-wrapper::-webkit-scrollbar-thumb:hover {
        background-color: #6C757D;
    }

    .table th,
    .table td {
        white-space: nowrap;
    }
</style>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Details</h2>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button class="badge badge-edit" style="background-color: #FFFFFF;  border: 1px solid #ADB5BD;"><a href="<?= site_url('context/context_analysis/index/') ?>" style="color: #ADB5BD;">Version</a></button>
            <button class="badge badge-edit" style="background-color: #FFFFFF;  border: 1px solid #ADB5BD;">
                <a href="<?= site_url('context/ISObjective/timeline_log/') ?>" style="color: #ADB5BD;">History</a>
            </button>
            <button class="badge badge-edit" style="background-color: #007BFF; color: #ffffff; border: 1px solid #007BFF" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Status</a>
                    <div class="dropdown-menu">
                        <!-- Second-level dropdown items -->
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Reviewed หรือไม่', 'context/status_update/<?= $data_createup['id_version'] ?>/1')">Pending
                            Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Review หรือไม่', 'context/status_update/<?= $data_createup['id_version'] ?>/2')">Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,5)">Reject Review</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Approve หรือไม่', 'context/status_update/<?= $data_createup['id_version'] ?>/3')">Pending
                            Approve</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/<?= $data_createup['id_version'] ?>/4')">Approved</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,6)">Reject
                            Approved</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Update</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('Would you like to confirm the update review date?', 'context/update_date/<?= $data_createup['id_version'] ?>/1')">Update
                            review date</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Copy ข้อมูลหรือไม่', 'context/copydata/<?= $data_createup['id_version'] ?>')">Revise</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" data-toggle="modal" data-target="#modal-default" id="load-modal-button" href="#" onclick="load_modal(6)">Create Note</a>
            </div>

            <i class="fas fa-cog" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(2)"></i>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row justify-content-center mb-2">
                <div class="col-sm-3 ">
                    <h6>Version:
                        <span class="blue-text">
                            <?php echo $data_createup['num_ver']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Status:
                        <?php
                        if ($data_createup['status'] == 0) {
                            echo "<span class='badge bg-secondary'>Draft</span>";
                        } else if ($data_createup['status'] == 1) {
                            echo "<span class='badge bg-info'>Pending Review</span>";
                        } else if ($data_createup['status'] == 2) {
                            echo "<span class='badge bg-warning'>Review</span>";
                        } else if ($data_createup['status'] == 3) {
                            echo "<span class='badge bg-info'>Pending Approved</span>";
                        } else if ($data_createup['status'] == 4) {
                            echo "<span class='badge bg-success'>Approved</span>";
                        } else if ($data_createup['status'] == 5) {
                            echo "<span class='badge bg-danger'>Reject_Review</span>";
                        } else if ($data_createup['status'] == 6) {
                            echo "<span class='badge bg-danger'>Reject_Approved</span>";
                        }
                        ?>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Approved Date:
                        <span class="gray-text">
                            <?php echo $data_createup['approved_date']; ?>
                        </span>
                    </h6>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-sm-3 ">
                    <h6>Modified Date:
                        <span class="gray-text">
                            <?php echo $data_createup['modified_date']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Last Reviewed:
                        <span class="gray-text">
                            <?php echo $data_createup['review_date']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Announce Date:
                        <span class="gray-text">
                            <?php echo $data_createup['announce_date']; ?>
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card" id="context-ana">
    <div class="card-body">
        <div class="form-group d-flex justify-content-between align-items-center">
            <div>
                <ul class="nav nav-pills" id="tabs-tab" role="tablist">
                    <li class="nav-item-tab" style="padding-right: 10px;">
                        <a class="nav-link active" id="Create-Update-tab" data-toggle="pill" href="#Create-Update" role="tab" aria-controls="Create-Update" aria-selected="true">
                            Creating & Updating
                        </a>
                    </li>
                    <li class="nav-item-tab">
                        <a class="nav-link" id="Management-Doc-tab" data-toggle="pill" href="#Management-Doc" role="tab" aria-controls="Management-Doc" aria-selected="false" onclick="getTableData2();">
                            Management Docurement
                        </a>
                    </li>
                </ul>
            </div>
            <div id="btn-Docurement" name="btn-Docurement">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default" onclick="CRUDDocumentCreateUpdate()">
                    <span class="text-nowrap"><i class="fas fa-edit"></i>Create Docurement</span>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="Create-Update" role="tabpanel" aria-labelledby="org-strategy-tab">
                <div class="table-wrapper">
                    <table id="table-craete-update" class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">ACTION</th>
                                <th>NO.</th>
                                <th>DOCUREMENT TYPE</th>
                                <th>DOCUMENT ABBREVIATION</th>
                                <th>NAME TH</th>
                                <th>NAME ENG</th>
                                <th>SECRET LEVEL</th>
                                <th>CREATE/UPDATE/UPLOAD</th>
                                <th>REVIEW</th>
                                <th>APPROVAL</th>
                                <th>STATUS</th>
                                <th>FILE</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade show" id="Management-Doc" role="tabpanel" aria-labelledby="Management-Doc-tab">
                <div class="table-wrapper">
                    <table id="table-management-doc" class="table table-hover">
                        <thead>
                            <tr>
                                <th>ACTION</th>
                                <th>NO.</th>
                                <th>DOCUREMENT TYPE</th>
                                <th>DOCUMENT ABBREVIATION</th>
                                <th>NAME TH</th>
                                <th>NAME ENG</th>
                                <th>SECRET LEVEL</th>
                                <th>MANAGEMENT PERMISSIONS</th>
                                <th>STATUS</th>
                                <th>FILE</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="overlay dark">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
              </div> -->
</div>
<!-- data -->
<script>
    var Data = [{
        "DOCUREMENT_TYPE": "Procedure",
        "DOCUMENT_ABBREVIATION": "PR_001",
        "NAME_TH": "ขั้นตอน...",
        "NAME_ENG": "Procedure...",
        "SECRET_LEVEL": "Top secret",
        "CREATE_UPDATE_UPLOAD": ["Amelia Smith", "Olivia Williams"],
        "REVIEW": ["Isla Taylor"],
        "APPROVAL": ["Amelia Smith"],
        "MANAGEMENT_PERMISSIONS": ["Create/Update/Upload"],
        "STATUS": "Draft",
        "FILE": "test.pdf",
    }, {
        "DOCUREMENT_TYPE": "Form",
        "DOCUMENT_ABBREVIATION": "FM_001",
        "NAME_TH": "ฟอร์ม...",
        "NAME_ENG": "Form...",
        "SECRET_LEVEL": "Internal Use",
        "CREATE_UPDATE_UPLOAD": ["Olivia Williams", "Poppy Brown"],
        "REVIEW": ["Isla Taylor"],
        "APPROVAL": ["Amelia Smith"],
        "MANAGEMENT_PERMISSIONS": ["Review", "Approve"],
        "STATUS": "Rejected",
        "FILE": "test.pdf",
    }, {
        "DOCUREMENT_TYPE": "Policy",
        "DOCUMENT_ABBREVIATION": "PO_001",
        "NAME_TH": "นโยบาย...",
        "NAME_ENG": "Policy...",
        "SECRET_LEVEL": "Confidential",
        "CREATE_UPDATE_UPLOAD": ["Oscar Davis"],
        "REVIEW": ["Oscar Davis"],
        "APPROVAL": ["Amelia Smith"],
        "MANAGEMENT_PERMISSIONS": ["Approve"],
        "STATUS": "Approved",
        "FILE": "test.pdf",
    }, {
        "DOCUREMENT_TYPE": "Plan",
        "DOCUMENT_ABBREVIATION": "PL_001",
        "NAME_TH": "แผน...",
        "NAME_ENG": "Plan...",
        "SECRET_LEVEL": "Secret",
        "CREATE_UPDATE_UPLOAD": ["Amelia Smith"],
        "REVIEW": ["Amelia Smith"],
        "APPROVAL": ["Amelia Smith"],
        "MANAGEMENT_PERMISSIONS": ["Review"],
        "STATUS": "Pending Approval",
        "FILE": "test.pdf",
    }, ];

    var table1TableBody = document.getElementById("table-craete-update").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
        var newRow = table1TableBody.insertRow();
        var cell1_1 = newRow.insertCell(0);
        var cell2_1 = newRow.insertCell(1);
        var cell3_1 = newRow.insertCell(2);
        var cell4_1 = newRow.insertCell(3);
        var cell5_1 = newRow.insertCell(4);
        var cell6_1 = newRow.insertCell(5);
        var cell7_1 = newRow.insertCell(6);
        var cell8_1 = newRow.insertCell(7);
        var cell9_1 = newRow.insertCell(8);
        var cell10_1 = newRow.insertCell(9);
        var cell11_1 = newRow.insertCell(10);
        var cell12_1 = newRow.insertCell(11);

        cell1_1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default " onclick="CRUDDocumentCreateUpdate()"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#" onclick="CRUDDocumentCreateUpdate()">View</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick="CRUDDocumentCreateUpdate()"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
        cell2_1.textContent = index + 1;
        cell3_1.textContent = row.DOCUREMENT_TYPE;
        cell4_1.textContent = row.DOCUMENT_ABBREVIATION;
        cell5_1.textContent = row.NAME_TH;
        cell6_1.textContent = row.NAME_ENG;
        cell7_1.textContent = row.SECRET_LEVEL;
        displayArrayInCell(cell8_1, row.CREATE_UPDATE_UPLOAD);
        cell8_1.style.textAlign = 'left';
        displayArrayInCell(cell9_1, row.REVIEW);
        cell9_1.style.textAlign = 'left';
        displayArrayInCell(cell10_1, row.APPROVAL);
        cell10_1.style.textAlign = 'left';
        cell11_1.textContent = row.STATUS;
        cell12_1.textContent = row.FILE;
    });

    var table2TableBody = document.getElementById("table-management-doc").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
        var newRow = table2TableBody.insertRow();
        var cell1_2 = newRow.insertCell(0);
        var cell2_2 = newRow.insertCell(1);
        var cell3_2 = newRow.insertCell(2);
        var cell4_2 = newRow.insertCell(3);
        var cell5_2 = newRow.insertCell(4);
        var cell6_2 = newRow.insertCell(5);
        var cell7_2 = newRow.insertCell(6);
        var cell8_2 = newRow.insertCell(7);
        var cell9_2 = newRow.insertCell(8);
        var cell10_2 = newRow.insertCell(9);

        cell1_2.innerHTML = `<i class="fas fa-edit pointer text-primary" aria-expanded="false"></i>`;
        cell2_2.textContent = index + 1;
        cell3_2.textContent = row.DOCUREMENT_TYPE;
        cell4_2.textContent = row.DOCUMENT_ABBREVIATION;
        cell5_2.textContent = row.NAME_TH;
        cell6_2.textContent = row.NAME_ENG;
        cell7_2.textContent = row.SECRET_LEVEL;
        displayArrayInCell(cell8_2, row.MANAGEMENT_PERMISSIONS);
        cell8_2.style.textAlign = 'left';
        cell9_2.textContent = row.STATUS;
        cell10_2.textContent = row.FILE;
    });

    function displayArrayInCell(cell, dataArray) {
        var ul = document.createElement('ul');
        dataArray.forEach(function(item) {
            var li = document.createElement('li');
            li.textContent = item;
            ul.appendChild(li);
        });
        cell.appendChild(ul);
    }
</script>
<script>
    function CRUDDocumentCreateUpdate() {
        window.location.href = "crud_documented_create_update";
    }
</script>
<script>
    $('#Create-Update-tab').on('click', function() {
        console.log('Create-Update-tab');
        $('#btn-Docurement').show();
    });
    $('#Management-Doc-tab').on('click', function() {
        console.log('Management-Doc-tab');
        $('#btn-Docurement').hide();
    })
</script>