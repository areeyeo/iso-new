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
                        <h1>Performance Evaluation
                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Performance Evaluation</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div style="display: flex; flex-direction: column; align-items: flex-end;">
                    <div>
                        <span style="color: #007bff;">จำนวนรายการที่ผ่านการประเมิน:</span>
                        <span style="color: #666666;">20 รายการ (Pass)</span>
                    </div>
                    <div>
                        <span style="color: #007bff;">จำนวนรายการที่ไม่ผ่านการประเมิน:</span>
                        <span style="color: #666666;">10 รายการ (Fail)</span>
                    </div>
                </div>

                <div class="card mt-3">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="tab-content" id="tabs-tabContent">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Performance Evaluation</h4>
                                    <div>
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option selected>Search About...</option>
                                            <option value="1">Items that pass the evaluation.</option>
                                            <option value="2">Items that do not pass the evaluation criteria.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="table-wrapper">
                                    <table id="example1" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NO.</th>
                                                <th>OBJ NO.</th>
                                                <th>OBJECTIVE</th>
                                                <th>EVALUATION</th>
                                                <th>PLANNING</th>
                                                <th>WHEN TO EVALUATED</th>
                                                <th>ACTUAL</th>
                                                <th>WHO SHALL MONITOR</th>
                                                <th>METHODS FOR MONITORING</th>
                                                <th>CRITERIA</th>
                                                <th>RESULT</th>
                                                <th>ACTION</th>
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
            <?= $this->include("Modal/CRUD_Perf_Performance_Evaluation"); ?>
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
        function load_modal(check, check_type, data_encode) {
            console.log('Function is called with check:', check, 'and check_type:', check_type);

            modal1 = document.getElementById("modal1");
            modal2 = document.getElementById("modal2");
            $(".modal-body #iss").empty();

            if (check == '1') {
                //--show modal requirment--//
                console.log('Showing modal 1');
                modal1.style.display = "block";
                modal2.style.display = "none";
            } else if (check == '2') {
                //--show modal requirment--//
                console.log('Showing modal 2');
                modal1.style.display = "none";
                modal2.style.display = "block";
            }
        }
    </script>

    <!-- table data performance evaluation -->
    <script>
        var Data = [{
                "NO": "1",
                "OBJNO": "OBJ_001",
                "OBJECTIVE": "text",
                "EVALUATION": "text",
            },
            {
                "Data": "1",
                "PLANNING": "planning1",
                "ACTUAL": "10/01/2024",
                "WHENEVALUATED": "10/01/2024",
                "WHOSHALLMONITOR": "text",
                "METHODSFORMONITORING": "text",
                "CRITERIA": "text",
                "RESULT": "text",
            },
            {
                "Data": "1",
                "PLANNING": "planning2",
                "ACTUAL": "10/01/2024",
                "WHENEVALUATED": "10/01/2024",
                "WHOSHALLMONITOR": "text",
                "METHODSFORMONITORING": "text",
                "CRITERIA": "text",
                "RESULT": "text",
            },
            {
                "NO": "2",
                "OBJNO": "OBJ_002",
                "OBJECTIVE": "text",
                "EVALUATION": "text",

            },
            {
                "Data": "1",
                "PLANNING": "planning3",
                "ACTUAL": "10/01/2024",
                "WHENEVALUATED": "10/01/2024",
                "WHOSHALLMONITOR": "text",
                "METHODSFORMONITORING": "text",
                "CRITERIA": "text",
                "RESULT": "text",
            },
            {
                "Data": "1",
                "PLANNING": "planning4",
                "ACTUAL": "10/01/2024",
                "WHENEVALUATED": "10/01/2024",
                "WHOSHALLMONITOR": "text",
                "METHODSFORMONITORING": "text",
                "CRITERIA": "text",
                "RESULT": "text",
            },
            {
                "Data": "1",
                "PLANNING": "planning5",
                "ACTUAL": "10/01/2024",
                "WHENEVALUATED": "10/01/2024",
                "WHOSHALLMONITOR": "text",
                "METHODSFORMONITORING": "text",
                "CRITERIA": "text",
                "RESULT": "text",
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
            var cell12 = newRow.insertCell(11);

            cell1.textContent = row.NO;
            cell2.textContent = row.OBJNO;
            cell3.textContent = row.OBJECTIVE;
            cell4.textContent = row.EVALUATION;
            displayArrayInCell(cell5, row.PLANNING);
            displayArrayInCell(cell6, row.ACTUAL);
            displayArrayInCell(cell7, row.WHENEVALUATED);
            displayArrayInCell(cell8, row.WHOSHALLMONITOR);
            displayArrayInCell(cell9, row.METHODSFORMONITORING);
            displayArrayInCell(cell10, row.CRITERIA);
            displayArrayInCell(cell11, row.RESULT);

            if (Number.isInteger(Number(row.NO))) {
                cell1.textContent = row.NO;;
                newRow.style.backgroundColor = '#E2F0FF';
                for (var i = 0; i < newRow.cells.length; i++) {
                    newRow.cells[i].style.backgroundColor = '#E2F0FF';
                    newRow.cells[i].style.color = '#007BFF';
                }
            }

            if (row["Data"] === "1") {
                cell12.innerHTML = `<span style="color:#007BFF; cursor:pointer;" data-toggle="modal" data-target="#modal-default" onclick="load_modal(2)"><i class="fas fa-user-edit"></i></span>`;
            }
        });

        function displayArrayInCell(cell, dataArray) {
            if (Array.isArray(dataArray) && dataArray.length > 1) {
                cell.innerHTML = dataArray.join('<br>');
            } else {
                cell.textContent = Array.isArray(dataArray) ? dataArray[0] : dataArray;
            }
        }
    </script>
</body>