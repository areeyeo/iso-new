<title>Operations Management Version</title>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
<!-- daterange picker -->
<link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:300,400,400i,700&display=swap">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
<!-- summernote -->
<link rel="stylesheet" href="<?= base_url('plugins/summernote/summernote-bs4.min.css'); ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.19.0/dist/css/bootstrap-icons.min.css" rel="stylesheet">
<style>
    th {
        background-color: #F5F6FA;
        text-align: center;
        border-bottom: none;
    }

    tbody {
        border-bottom: 10px;
        text-align: center;
    }

    .table thead th {
        border-bottom: none;
    }

    .badge-edit {
        font-size: 100%;
    }

    .blue-text {
        color: #0000FF;
    }

    .gray-text {
        color: #adb5bd;
    }

    .modal-footer {
        justify-content: space-evenly;
    }

    .swal2-popup textarea.swal2-textarea {
        width: 90%;
    }

    .dropdown-submenu:hover .dropdown-menu {
        display: block;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        left: -100%;
        margin-top: 0;
        border-radius: 10px;
    }

    .dropdown-submenu .right-menu-table {
        left: 100%;
        margin-top: 0;
        border-radius: 10px;
    }

    .button-table {
        border-color: transparent;
        background-color: transparent;
    }

    .text-color {
        color: #316497;
    }


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

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Operations Management
                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Operations Management</li>
                            <li class="breadcrumb-item active"><a>Version <?php echo $data['num_ver']; ?></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
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
                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Reviewed หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/1')">Pending
                                            Review</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Review หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/2')">Review</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,5)">Reject Review</a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Approve หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/3')">Pending
                                            Approve</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/4')">Approved</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(7,6)">Reject
                                            Approved</a>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Update</a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('Would you like to confirm the update review date?', 'context/update_date/<?= $data['id_version'] ?>/1')">Update
                                            review date</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Copy ข้อมูลหรือไม่', 'context/copydata/<?= $data['id_version'] ?>')">Revise</a>
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
                                            <?php echo $data['num_ver']; ?>
                                        </span>
                                    </h6>
                                </div>
                                <div class="col-sm-3 ">
                                    <h6>Status:
                                        <?php
                                        if ($data['status'] == 0) {
                                            echo "<span class='badge bg-secondary'>Draft</span>";
                                        } else if ($data['status'] == 1) {
                                            echo "<span class='badge bg-info'>Pending Review</span>";
                                        } else if ($data['status'] == 2) {
                                            echo "<span class='badge bg-warning'>Review</span>";
                                        } else if ($data['status'] == 3) {
                                            echo "<span class='badge bg-info'>Pending Approved</span>";
                                        } else if ($data['status'] == 4) {
                                            echo "<span class='badge bg-success'>Approved</span>";
                                        } else if ($data['status'] == 5) {
                                            echo "<span class='badge bg-danger'>Reject_Review</span>";
                                        } else if ($data['status'] == 6) {
                                            echo "<span class='badge bg-danger'>Reject_Approved</span>";
                                        }
                                        ?>
                                    </h6>
                                </div>
                                <div class="col-sm-3 ">
                                    <h6>Approved Date:
                                        <span class="gray-text">
                                            <?php echo $data['approved_date']; ?>
                                        </span>
                                    </h6>
                                </div>
                            </div>
                            <div class="row justify-content-center mb-2">
                                <div class="col-sm-3 ">
                                    <h6>Modified Date:
                                        <span class="gray-text">
                                            <?php echo $data['modified_date']; ?>
                                        </span>
                                    </h6>
                                </div>
                                <div class="col-sm-3 ">
                                    <h6>Last Reviewed:
                                        <span class="gray-text">
                                            <?php echo $data['review_date']; ?>
                                        </span>
                                    </h6>
                                </div>
                                <div class="col-sm-3 ">
                                    <h6>Announce Date:
                                        <span class="gray-text">
                                            <?php echo $data['announce_date']; ?>
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
                                        <a class="nav-link active" id="Risk-Context-tab" data-toggle="pill" href="#Risk-Context" role="tab" aria-controls="Risk-Context" aria-selected="true">
                                            Risk Context
                                        </a>
                                    </li>
                                    <li class="nav-item-tab" style="padding-right: 10px;">
                                        <a class="nav-link" id="Risk-IS-tab" data-toggle="pill" href="#Risk-IS" role="tab" aria-controls="Risk-IS" aria-selected="false">
                                            Risk IS
                                        </a>
                                    </li>
                                    <li class="nav-item-tab" style="padding-right: 10px;">
                                        <a class="nav-link" id="IS-Objectives-tab" data-toggle="pill" href="#IS-Objectives" role="tab" aria-controls="IS-Objectives" aria-selected="false">
                                            IS Objectives
                                        </a>
                                    </li>
                                    <li class="nav-item-tab" style="padding-right: 10px;">
                                        <a class="nav-link" id="Planning-of-Change-tab" data-toggle="pill" href="#Planning-of-Change" role="tab" aria-controls="Planning-of-Change" aria-selected="false">
                                            Planning of Change
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="Risk-Context" role="tabpanel" aria-labelledby="org-strategy-tab">
                                <div class="table-wrapper">
                                    <table id="table-risk-context" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ACTION</th>
                                                <th>NO.</th>
                                                <th>RTP NO.</th>
                                                <th>NAME PLANNING</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>RESPONSIBLE PERSON</th>
                                                <th>STATUS (%)</th>
                                                <th>EVALUATION</th>
                                                <th>RESULT</th>
                                                <th>ORIGIN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Risk-IS" role="tabpanel" aria-labelledby="Risk-IS-tab">
                                <div class="table-wrapper">
                                    <table id="table-risk-is" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ACTION</th>
                                                <th>NO.</th>
                                                <th>RTP NO.</th>
                                                <th>NAME PLANNING</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>RESPONSIBLE PERSON</th>
                                                <th>STATUS (%)</th>
                                                <th>EVALUATION</th>
                                                <th>RESULT</th>
                                                <th>ORIGIN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="IS-Objectives" role="tabpanel" aria-labelledby="IS-Objectives-tab">
                                <div class="table-wrapper">
                                    <table id="table-is-objectives" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ACTION</th>
                                                <th>NO.</th>
                                                <th>OBJ NO.</th>
                                                <th>NAME PLANNING</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>RESPONSIBLE PERSON</th>
                                                <th>STATUS (%)</th>
                                                <th>EVALUATION</th>
                                                <th>RESULT</th>
                                                <th>ORIGIN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="Planning-of-Change" role="tabpanel" aria-labelledby="Planning-of-Change-tab">
                                <div class="table-wrapper">
                                    <table id="table-planning-of-change" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ACTION</th>
                                                <th>NO.</th>
                                                <th>PLO NO.</th>
                                                <th>NAME PLANNING</th>
                                                <th>START DATE</th>
                                                <th>END DATE</th>
                                                <th>RESPONSIBLE PERSON</th>
                                                <th>STATUS (%)</th>
                                                <th>EVALUATION</th>
                                                <th>RESULT</th>
                                                <th>ORIGIN</th>
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
            </div>
        </section>
    </div>
    <div class="modal fade" id="modal-default">
        <div id="modal1">
            <?= $this->include("Modal/Requirement_Modal"); ?>
        </div>
        <div id="modal2">
            <?= $this->include("Modal/Context_Ver"); ?>
        </div>
        <div id="modal3">
            <?= $this->include("Modal/CRUD_Leadership_modal"); ?>
        </div>
        <div id="modal4">
            <?= $this->include("Modal/CRUD_Note"); ?>
        </div>
        <div id="modal5">
            <?= $this->include("Modal/Reject_Modal"); ?>
        </div>
        <div id="modal6">
            <?= $this->include("Modal/CRUD_OP_Risk_Context"); ?>
        </div>
        <div id="modal7">
            <?= $this->include("Modal/CRUD_OP_Risk_IS"); ?>
        </div>
        <div id="modal8">
            <?= $this->include("Modal/CRUD_OP_IS_Objectives"); ?>
        </div>
        <div id="modal9">
            <?= $this->include("Modal/CRUD_OP_Planning_of_Change"); ?>
        </div>
    </div>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <!-- InputMask -->
    <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- bs-custom-file-input -->
    <script src="<?= base_url('plugins/bs-custom-file-input/bs-custom-file-input.min.js'); ?>"></script>
    <!-- Summernote -->
    <script src="<?= base_url('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
    <!-- CodeMirror -->
    <script src="<?= base_url('plugins/codemirror/codemirror.js'); ?>"></script>
    <script src="<?= base_url('plugins/codemirror/mode/css/css.js'); ?>"></script>
    <script src="<?= base_url('plugins/codemirror/mode/xml/xml.js'); ?>"></script>
    <script src="<?= base_url('plugins/codemirror/mode/htmlmixed/htmlmixed.js'); ?>"></script>

    <!-- load modal -->
    <script>
        function load_modal(check, data_, status) {
            modal1 = document.getElementById("modal1");
            modal2 = document.getElementById("modal2");
            modal3 = document.getElementById("modal3");
            modal4 = document.getElementById("modal4");
            modal5 = document.getElementById("modal5");
            modal6 = document.getElementById("modal6");
            modal7 = document.getElementById("modal7");
            modal8 = document.getElementById("modal8");
            modal9 = document.getElementById("modal9");

            if (check == '1') {
                //--show modal requirment--//
                modal1.style.display = "block";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";
            } else if (check == '2') {
                //--show modal Version Control--//
                modal1.style.display = "none";
                modal2.style.display = "block";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                var element = <?php echo json_encode($data); ?>;
                $(".modal-body #description").text(element.details);
                $(".modal-body #status").val(element.status);
                $(".modal-body #commentTextArea").text(element.comment_reject);
                $(".modal-body #id_").val(element.id_version);
                var modified_day = "";
                var reviewed_day = "";
                var approved_day = "";
                var announce_date = "";
                $(".modal-body #modified").val(element.modified_date);
                $(".modal-body #reviewed").val(element.review_date);
                $(".modal-body #approved").val(element.approved_date);
                $(".modal-body #announce").val(element.announce_date);
                check_status(element.status);
            } else if (check == '3') {
                //--show modal file create--//
                const formGroupFile = document.getElementById("form-group-file");
                const formGroupText = document.getElementById("form-group-text");
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "block";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                formGroupFile.style.display = "block";
                formGroupText.style.display = "none";
                $(".modal-header #title_modal").text("File Organizational Strategy");
                $(".modal-body #url_route").val("leadership/file_ls/create/" + data_);
            } else if (check == '4') {
                //--show modal objective create--//
                const formGroupFile = document.getElementById("form-group-file");
                const formGroupText = document.getElementById("form-group-text");
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "block";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                formGroupFile.style.display = "none";
                formGroupText.style.display = "block";
                $(".modal-body #text").val('');

                var data = <?php echo json_encode($data); ?>;
                $(".modal-header #title_modal").text("IS Objective");
                $(".modal-body #url_route").val("leadership/commitment/is_objective/create/" + data.id_version + "/" +
                    status);
            } else if (check == '5') {
                //--show modal objective edit--//
                const formGroupFile = document.getElementById("form-group-file");
                const formGroupText = document.getElementById("form-group-text");
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "block";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                formGroupFile.style.display = "none";
                formGroupText.style.display = "block";
                const rowData = JSON.parse(decodeURIComponent(data_));
                $(".modal-header #title_modal").text("IS Objective");
                $(".modal-body #text").val(rowData.text);
                $(".modal-body #url_route").val("leadership/commitment/is_objective/edit/" + rowData.id_is_objective + "/" +
                    rowData.id_version + "/" + status);
            } else if (check == '6') {
                //--show modal create note--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "block";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                var data = <?php echo json_encode($data); ?>;
                $(".modal-header #title_modal").text("Note");
                $(".modal-body #modified").val(data.modified_date);
                $(".modal-body #check").val(10);
                $(".modal-body #params").val(10);
            } else if (check == '7') {
                //--show modal Reject--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "block";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";

                $(".modal-body #status").val(data_);
                var element = <?php echo json_encode($data); ?>;
                $(".modal-body #modified_date").val(element.modified_date);
            } else if (check == '8') {
                //--show modal crud risk context--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "block";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "none";
            } else if (check == '9') {
                //--show modal crud risk is--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "block";
                modal8.style.display = "none";
                modal9.style.display = "none";
            } else if (check == '10') {
                //--show modal crud is objectives--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "block";
                modal9.style.display = "none";
            } else if (check == '11') {
                //--show modal crud planning of change--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
                modal7.style.display = "none";
                modal8.style.display = "none";
                modal9.style.display = "block";
            }
        }
    </script>
    <!-- load data teble risk context -->
    <script>
        var Data = [{
            "RTP_NO": "RTP_CONTEXT_001",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, {
            "RTP_NO": "RTP_CONTEXT_002",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, ];

        var tableriskcontextTableBody = document.getElementById("table-risk-context").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = tableriskcontextTableBody.insertRow();
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
                                    <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(8)"><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Copy</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.RTP_NO;
            cell4.textContent = row.NAME_PLANNING;
            cell5.textContent = row.START_DATE;
            cell6.textContent = row.END_DATE;
            cell7.textContent = row.RESPONSIBLE_PERSON;
            cell8.textContent = row.STATUS;
            cell9.textContent = row.EVALUATION;
            cell10.textContent = row.RESULT;
            cell11.innerHTML = `<span style="color:#007BFF; cursor:pointer;" onclick="OriginInfoRiskContext()"><i class="fas fa-map-marker-alt"></i></span>`;
        });
    </script>
    <!-- load data teble risk is -->
    <script>
        var Data = [{
            "RTP_NO": "RTP_ASSET_002",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, {
            "RTP_NO": "RTP_ASSET_002",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, ];

        var tableriskisTableBody = document.getElementById("table-risk-is").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = tableriskisTableBody.insertRow();
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
                                    <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(9)"><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Copy</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.RTP_NO;
            cell4.textContent = row.NAME_PLANNING;
            cell5.textContent = row.START_DATE;
            cell6.textContent = row.END_DATE;
            cell7.textContent = row.RESPONSIBLE_PERSON;
            cell8.textContent = row.STATUS;
            cell9.textContent = row.EVALUATION;
            cell10.textContent = row.RESULT;
            cell11.innerHTML = `<span style="color:#007BFF; cursor:pointer;" onclick="OriginInfoRiskIS()"><i class="fas fa-map-marker-alt"></i></span>`;
        });
    </script>
    <!-- load data teble is objectives -->
    <script>
        var Data = [{
            "OBJ_NO": "OBJ_001",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, {
            "OBJ_NO": "OBJ_002",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, ];

        var tableisobjectivesTableBody = document.getElementById("table-is-objectives").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = tableisobjectivesTableBody.insertRow();
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
                                    <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(10)"><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Copy</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.OBJ_NO;
            cell4.textContent = row.NAME_PLANNING;
            cell5.textContent = row.START_DATE;
            cell6.textContent = row.END_DATE;
            cell7.textContent = row.RESPONSIBLE_PERSON;
            cell8.textContent = row.STATUS;
            cell9.textContent = row.EVALUATION;
            cell10.textContent = row.RESULT;
            cell11.innerHTML = `<span style="color:#007BFF; cursor:pointer;" onclick="OriginInfoISObjectives()"><i class="fas fa-map-marker-alt"></i></span>`;
        });
    </script>
    <!-- load data teble planning of change -->
    <script>
        var Data = [{
            "PLO_NO": "PLO_001",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, {
            "PLO_NO": "PLO_002",
            "NAME_PLANNING": "name",
            "START_DATE": "01/01/2024",
            "END_DATE": "01/01/2024",
            "RESPONSIBLE_PERSON": "Areeya Dengjaroen",
            "STATUS": "100%",
            "EVALUATION": "text",
            "RESULT": "text",
            "ORIGIN": "",
        }, ];

        var tableplanningofchangeTableBody = document.getElementById("table-planning-of-change").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = tableplanningofchangeTableBody.insertRow();
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
                                    <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(11)"><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Copy</a></li>
                                    <li><a class="dropdown-item" href="#">Delete</a></li>
                                    </ul>
                                </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.PLO_NO;
            cell4.textContent = row.NAME_PLANNING;
            cell5.textContent = row.START_DATE;
            cell6.textContent = row.END_DATE;
            cell7.textContent = row.RESPONSIBLE_PERSON;
            cell8.textContent = row.STATUS;
            cell9.textContent = row.EVALUATION;
            cell10.textContent = row.RESULT;
            cell11.innerHTML = `<span style="color:#007BFF; cursor:pointer;" onclick="OriginInfoPlanningofChange()"><i class="fas fa-map-marker-alt"></i></span>`;
        });
    </script>
    <script>
        function OriginInfoRiskContext() {
            // อนาคตแก้เป็นลิ้งของ ra & rtp result context นะคะ
            window.location.href = "planningAddressRisksOpp";
        }

        function OriginInfoRiskIS() {
            // อนาคตแก้เป็นลิ้งของ ra & rtp result is นะคะ
            window.location.href = "planningAddressRisksOpp";
        }

        function OriginInfoISObjectives() {
            window.location.href = "isobjective";
        }

        function OriginInfoPlanningofChange() {
            window.location.href = "planningofchange";
        }
    </script>