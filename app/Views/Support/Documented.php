<title>Documented Information Version</title>
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
<style>
    tr:nth-child(even) {
        background-color: #F5F5F5;
    }

    th {
        background-color: #F5F6FA;
        text-align: center;
        border-bottom: none;
    }

    tbody {
        border-bottom: 10px solid #ccc;
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
</style>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Documented Information
                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Documented Information</li>
                            <li class="breadcrumb-item topic active">
                                <?php
                                $active_tab = 'create-update';
                                if (isset($_GET['active_tab'])) {
                                    $active_tab = $_GET['active_tab'];
                                }
                                if ($active_tab == 'create-update') {
                                    echo 'Creating & Updating';
                                } elseif ($active_tab == 'control') {
                                    echo 'Document Control';
                                }
                                ?>
                            </li>
                            <li class="breadcrumb-item version active">
                                <?php
                                $active_tab = isset($_GET['active_tab']) ? $_GET['active_tab'] : 'create-update';
                                if ($active_tab == 'create-update' && isset($data_createup['num_ver'])) {
                                    echo ' Version ' . $data_createup['num_ver'];
                                } elseif ($active_tab == 'control' && isset($data_control['num_ver'])) {
                                    echo ' Version ' . $data_control['num_ver'];
                                }
                                ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link title-topic active" id="pills-create-update-tab" data-toggle="pill" data-target="#pills-create-update" type="button" role="tab" aria-controls="pills-create-update" aria-selected="true">
                            Creating & Updating</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link title-topic btn" id="pills-control-tab" data-toggle="pill" data-target="#pills-control" type="button" role="tab" aria-controls="pills-control" aria-selected="false">
                            Document Control</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-create-update" role="tabpanel" aria-labelledby="pills-create-update-tab">
                        <?php include("Doc_Create_Update.php"); ?>
                    </div>
                    <div class="tab-pane fade" id="pills-control" role="tabpanel" aria-labelledby="pills-control-tab">
                        <?php include("Doc_Control.php"); ?>
                    </div>
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
            <?= $this->include("Modal/File_Rename_Modal"); ?>
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
    <script>
        function load_modal(check, data_, status) {
            modal1 = document.getElementById("modal1");
            modal2 = document.getElementById("modal2");
            modal3 = document.getElementById("modal3");
            modal4 = document.getElementById("modal4");
            modal5 = document.getElementById("modal5");
            modal6 = document.getElementById("modal6");

            if (check == '1') {
                //--show modal requirment--//
                modal1.style.display = "block";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";
            } else if (check == '2') {
                //--show modal Version Control--//
                modal1.style.display = "none";
                modal2.style.display = "block";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "none";

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

                $(".modal-body #status").val(data_);
                var element = <?php echo json_encode($data); ?>;
                $(".modal-body #modified_date").val(element.modified_date);
            } else if (check == '8') {
                //--show modal Rename File--//
                modal1.style.display = "none";
                modal2.style.display = "none";
                modal3.style.display = "none";
                modal4.style.display = "none";
                modal5.style.display = "none";
                modal6.style.display = "block";

                const rowData = JSON.parse(decodeURIComponent(data_));
                // แบ่งข้อความด้วยจุด (.)
                var parts = rowData.name_file.split('.');

                // นับจำนวนส่วนหลังจากการแบ่งด้วยจุด
                var numberOfParts = parts.length;

                // สร้างตัวแปรเพื่อเก็บส่วนทั้งหมดยกเว้นส่วนสุดท้าย
                var exceptLastPart = "";

                for (var i = 0; i < numberOfParts - 1; i++) {
                    exceptLastPart += parts[i];
                    if (i < numberOfParts - 2) {
                        exceptLastPart += "."; // เพิ่มจุด (.) หลังจากทุกส่วนยกเว้นส่วนสุดท้าย
                    }
                }

                // กำหนดค่าให้กับองค์ประกอบที่มี ID "namefile" ใน Modal Body
                $(".modal-body #oldname").val(rowData.name_file);
                $(".modal-body #oldnameFile").val(exceptLastPart);
                $(".modal-body #namefile").val(exceptLastPart);
                $(".modal-body #url_route").val("leadership/file_ls/rename/" + rowData.id_ls_file);
            }
        }
    </script>
    <script>
        $('.title-topic').on('click', function() {
            var tabText = $(this).text();
            $('.topic.active').text(tabText);
        });
    </script>
    <script>
        function updateVersion(activeTab) {
            var versionElement = document.querySelector('.breadcrumb-item.version.active');
            var versionText = '';

            if (activeTab === 'create-update' && <?= isset($data_createup['num_ver']) ? 'true' : 'false'; ?>) {
                versionText = ' Version <?= $data_createup['num_ver']; ?>';
            } else if (activeTab === 'control' && <?= isset($data_control['num_ver']) ? 'true' : 'false'; ?>) {
                versionText = ' Version <?= $data_control['num_ver']; ?>';
            }

            versionElement.textContent = versionText;
        }

        document.getElementById("pills-create-update-tab").addEventListener("click", function() {
            updateVersion('create-update');
        });

        document.getElementById("pills-control-tab").addEventListener("click", function() {
            updateVersion('control');
        });

        window.addEventListener('DOMContentLoaded', function() {
            var activeTab = '<?= isset($_GET['active_tab']) ? $_GET['active_tab'] : 'create-update'; ?>';
            updateVersion(activeTab);
        });
    </script>