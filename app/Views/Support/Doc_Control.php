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
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Reviewed หรือไม่', 'context/status_update/<?= $data_control['id_version'] ?>/1')">Pending
                            Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Review หรือไม่', 'context/status_update/<?= $data_control['id_version'] ?>/2')">Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,5)">Reject Review</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Approve หรือไม่', 'context/status_update/<?= $data_control['id_version'] ?>/3')">Pending
                            Approve</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/<?= $data_control['id_version'] ?>/4')">Approved</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,6)">Reject
                            Approved</a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="dropdown-submenu">
                    <a class="dropdown-item dropdown-toggle" href="#">Update</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('Would you like to confirm the update review date?', 'context/update_date/<?= $data_control['id_version'] ?>/1')">Update
                            review date</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Copy ข้อมูลหรือไม่', 'context/copydata/<?= $data_control['id_version'] ?>')">Revise</a>
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
                            <?php echo $data_control['num_ver']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Status:
                        <?php
                        if ($data_control['status'] == 0) {
                            echo "<span class='badge bg-secondary'>Draft</span>";
                        } else if ($data_control['status'] == 1) {
                            echo "<span class='badge bg-info'>Pending Review</span>";
                        } else if ($data_control['status'] == 2) {
                            echo "<span class='badge bg-warning'>Review</span>";
                        } else if ($data_control['status'] == 3) {
                            echo "<span class='badge bg-info'>Pending Approved</span>";
                        } else if ($data_control['status'] == 4) {
                            echo "<span class='badge bg-success'>Approved</span>";
                        } else if ($data_control['status'] == 5) {
                            echo "<span class='badge bg-danger'>Reject_Review</span>";
                        } else if ($data_control['status'] == 6) {
                            echo "<span class='badge bg-danger'>Reject_Approved</span>";
                        }
                        ?>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Approved Date:
                        <span class="gray-text">
                            <?php echo $data_control['approved_date']; ?>
                        </span>
                    </h6>
                </div>
            </div>
            <div class="row justify-content-center mb-2">
                <div class="col-sm-3 ">
                    <h6>Modified Date:
                        <span class="gray-text">
                            <?php echo $data_control['modified_date']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Last Reviewed:
                        <span class="gray-text">
                            <?php echo $data_control['review_date']; ?>
                        </span>
                    </h6>
                </div>
                <div class="col-sm-3 ">
                    <h6>Announce Date:
                        <span class="gray-text">
                            <?php echo $data_control['announce_date']; ?>
                        </span>
                    </h6>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="card" id="context-ana">
    <div class="card-body">
        <div class="form-group">
            <div class="tab-content" id="tabs-tabContent">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>Document control</h4>
                </div>

                <table id="example1" class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ACTION</th>
                            <th>NO.</th>
                            <th>DOCUREMENT TYPE</th>
                            <th>DOCUMENT ABBREVIATION</th>
                            <th>NAME TH</th>
                            <th>NAME ENG</th>
                            <th>Secret Level</th>
                            <th>VERSION</th>
                            <th>RELEASE DATE</th>
                            <th>REVIEW DATE</th>
                            <th>FILE</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        }, {
            "DOCUREMENT_TYPE": "Form",
            "DOCUMENT_ABBREVIATION": "FM_001",
            "NAME_TH": "ฟอร์ม...",
            "NAME_ENG": "Form...",
            "SECRET_LEVEL": "Internal Use",
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        }, {
            "DOCUREMENT_TYPE": "Policy",
            "DOCUMENT_ABBREVIATION": "PO_001",
            "NAME_TH": "นโยบาย...",
            "NAME_ENG": "Policy...",
            "SECRET_LEVEL": "Confidential",
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        }, {
            "DOCUREMENT_TYPE": "Plan",
            "DOCUMENT_ABBREVIATION": "PL_001",
            "NAME_TH": "แผน...",
            "NAME_ENG": "Plan...",
            "SECRET_LEVEL": "Secret",
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        },
        {
            "DOCUREMENT_TYPE": "Plan",
            "DOCUMENT_ABBREVIATION": "PL_002",
            "NAME_TH": "แผน...",
            "NAME_ENG": "Plan...",
            "SECRET_LEVEL": "Secret",
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        },
        {
            "DOCUREMENT_TYPE": "Plan",
            "DOCUMENT_ABBREVIATION": "PL_003",
            "NAME_TH": "แผน...",
            "NAME_ENG": "Plan...",
            "SECRET_LEVEL": "Secret",
            "RELEASE_DATE": "01/01/01 10:00",
            "VERSION": "v 0.0.1",
            "REVIEW_DATE": "01/01/01",
            "FILE": "test.pdf",
        },
    ];

    var example1TableBody = document.getElementById("example1").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
        var newRow = example1TableBody.insertRow();
        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);
        var cell6 = newRow.insertCell(5);
        var cell7 = newRow.insertCell(6);
        var cell8 = newRow.insertCell(7);
        var cell9 = newRow.insertCell(8);
        var cell10 = newRow.insertCell(9);
        var cell11 = newRow.insertCell(10);

        cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li onclick="CRUDDocumentControl()"><a class="dropdown-item" href="#" >Edit</a></li>
      <li onclick="CRUDDocumentControl()"><a class="dropdown-item" href="#">View</a></li>
    </ul>
  </div>`;
        cell2.textContent = index + 1;
        cell3.textContent = row.DOCUREMENT_TYPE;
        cell4.textContent = row.DOCUMENT_ABBREVIATION;
        cell5.textContent = row.NAME_TH;
        cell6.textContent = row.NAME_ENG;
        cell7.textContent = row.SECRET_LEVEL;
        cell8.textContent = row.VERSION;
        cell9.textContent = row.RELEASE_DATE;
        cell10.textContent = row.REVIEW_DATE;
        cell11.textContent = row.FILE;
    });
</script>
<script>
    function CRUDDocumentControl() {
        window.location.href = "crud_documented_control";
    }
</script>