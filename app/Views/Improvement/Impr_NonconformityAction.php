<title>Nonconformity & Action Version</title>
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

    .accordion-item {
        border-bottom: 1px solid #ddd;
    }

    .accordion-title {
        padding: 20px;
        background-color: #BEDEFF;
        color: #818181;
        font-size: 1.2em;
        cursor: pointer;
        position: relative;
        border-radius: 10px;
        transition: background-color 0.3s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .accordion-title:hover {
        background-color: #E1F0FF;
    }

    .accordion-item.active .accordion-title {
        background-color: #E1F0FF;
    }

    .accordion-content {
        padding: 10px;
        display: none;
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.5s ease-out;
    }

    .accordion-item.active .accordion-content {
        display: block;
        max-height: 500px;
    }

    .accordion-item.active .accordion-content {
        animation: fadeIn 0.5s ease-out;
    }

    .accordion-title::before {
        content: '+';
        display: inline-block;
        margin-right: 10px;
        font-size: 1.2em;
        transition: transform 0.5s ease;
        transform-origin: center;
    }

    .accordion-title::before {
        content: '+';
        display: inline-block;
        margin-right: 10px;
        font-size: 1.2em;
        transition: transform 0.3s ease;
        transform-origin: center;
    }

    .accordion-item.active .accordion-title::before {
        content: '-';
        transform: rotate(180deg);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nonconformity & Action
                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item active">Nonconformity & Action</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- section audit result -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div>
                                <h4>Nonconformity & Action</h4>
                            </div>
                            <hr>
                            <div class="accordion">
                                <div class="accordion-item">
                                    <div class="accordion-title">Nonconformity</div>
                                    <div class="accordion-content">
                                        <div class="table-wrapper">
                                            <table id="examplefollow1" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">ACTION</th>
                                                        <th>AR NO.</th>
                                                        <th>NONCONFORMITY ISSUE</th>
                                                        <th>LEVEL OF NONCONFORMITY</th>
                                                        <th>DETAIL</th>
                                                        <th>REQUIREMENTS/CONTROL</th>
                                                        <th>CORRECTIVE ACTION</th>
                                                        <th>RESPONSIBLE PERSON</th>
                                                        <th>START DATE</th>
                                                        <th>END DATE</th>
                                                        <th>STATUS</th>
                                                        <th>ANNUAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <div class="accordion-title">Observation</div>
                                    <div class="accordion-content">
                                        <div class="table-wrapper">
                                            <table id="examplefollow2" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">ACTION</th>
                                                        <th>AR NO.</th>
                                                        <th>OBSERVATION ISSUE</th>
                                                        <th>DETAIL</th>
                                                        <th>REQUIREMENTS/CONTROL</th>
                                                        <th>CORRECTIVE ACTION</th>
                                                        <th>RESPONSIBLE PERSON</th>
                                                        <th>START DATE</th>
                                                        <th>END DATE</th>
                                                        <th>STATUS</th>
                                                        <th>ANNUAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mt-3">
                                    <div class="accordion-title">Opportunity</div>
                                    <div class="accordion-content">
                                        <div class="table-wrapper">
                                            <table id="examplefollow3" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">ACTION</th>
                                                        <th>AR NO.</th>
                                                        <th>OPPORTUNITY ISSUE</th>
                                                        <th>DETAIL</th>
                                                        <th>REQUIREMENTS/CONTROL</th>
                                                        <th>CORRECTIVE ACTION</th>
                                                        <th>RESPONSIBLE PERSON</th>
                                                        <th>START DATE</th>
                                                        <th>END DATE</th>
                                                        <th>STATUS</th>
                                                        <th>ANNUAL</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            <?= $this->include("Modal/CRUD_Impr_Nonconformity_Action"); ?>
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
            console.log('Function is called with check:', check, 'and check_type:', check.check_type);

            modal1 = document.getElementById("modal1");
            modal2 = document.getElementById("modal2");
            $(".modal-body #iss").empty();

            if (check == '1') {
                modal1.style.display = "block";
                modal2.style.display = "none";
            } else if (check == '2') {
                modal1.style.display = "none";
                modal2.style.display = "block";
            }
        }
    </script>


    <!-- open close tab -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll('.accordion-item');

            items.forEach(item => {
                const title = item.querySelector('.accordion-title');
                title.addEventListener('click', () => {
                    items.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                            otherItem.querySelector('.accordion-content').style.display = 'none';
                        }
                    });

                    item.classList.toggle('active');
                    const content = item.querySelector('.accordion-content');
                    content.style.display = content.style.display === 'block' ? 'none' : 'block';
                });
            });
        });
    </script>

    <!-- table data Nonconformity -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Pending",
                "ANNUAL": "2567",
                "LEVEL": "Major",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Incomplete",
                "ANNUAL": "2567",
                "LEVEL": "Major",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "In Progress",
                "ANNUAL": "2567",
                "LEVEL": "Major",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Completed",
                "ANNUAL": "2567",
                "LEVEL": "Minor",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
        ];

        var examplefollow1TableBody = document.getElementById("examplefollow1").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = examplefollow1TableBody.insertRow();
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

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
    <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.NONCONFORMITY;
            cell4.textContent = row.LEVEL;
            cell5.textContent = row.DETAIL;
            cell6.textContent = row.CONTROL;
            cell7.textContent = row.CORRECTIVE;
            cell8.textContent = row.RESPONSIBLEPERSON;
            cell9.textContent = row.STARTDATE;
            cell10.textContent = row.ENDDATE;
            cell11.innerHTML = row.STATUS === 'Pending' ? '<span class="badge badge-dark">Pending</span>' :
                row.STATUS === 'Incomplete' ? '<span class="badge badge-danger">Incomplete</span>' :
                row.STATUS === 'In Progress' ? '<span class="badge badge-warning">In Progress</span>' :
                row.STATUS === 'Completed' ? '<span class="badge badge-success">Completed</span>' : '';
            cell12.textContent = row.ANNUAL;
        });
    </script>

    <!-- table data observation -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Pending",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Incomplete",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "In Progress",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Completed",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
        ];

        var examplefollow2TableBody = document.getElementById("examplefollow2").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = examplefollow2TableBody.insertRow();
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
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.OBSERVATION;
            cell4.textContent = row.DETAIL;
            cell5.textContent = row.CONTROL;
            cell6.textContent = row.CORRECTIVE;
            cell7.textContent = row.RESPONSIBLEPERSON;
            cell8.textContent = row.STARTDATE;
            cell9.textContent = row.ENDDATE;
            cell10.innerHTML = row.STATUS === 'Pending' ? '<span class="badge badge-dark">Pending</span>' :
                row.STATUS === 'Incomplete' ? '<span class="badge badge-danger">Incomplete</span>' :
                row.STATUS === 'In Progress' ? '<span class="badge badge-warning">In Progress</span>' :
                row.STATUS === 'Completed' ? '<span class="badge badge-success">Completed</span>' : '';
            cell11.textContent = row.ANNUAL;
        });
    </script>

    <!-- table data opportunity -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Pending",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Incomplete",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "In Progress",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "CORRECTIVE": "TEXT",
                "RESPONSIBLEPERSON": "TEXT",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
                "STATUS": "Completed",
                "ANNUAL": "2567",
                "DETAIL": "-",
                "CONTROL": "3.1.2",
            },
        ];

        var examplefollow3TableBody = document.getElementById("examplefollow3").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = examplefollow3TableBody.insertRow();
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
        <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
        <li><a class="dropdown-item" href="#">Copy</a></li>
        <li><a class="dropdown-item" href="#">Delete</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.OPPORTUNITY;
            cell4.textContent = row.DETAIL;
            cell5.textContent = row.CONTROL;
            cell6.textContent = row.CORRECTIVE;
            cell7.textContent = row.RESPONSIBLEPERSON;
            cell8.textContent = row.STARTDATE;
            cell9.textContent = row.ENDDATE;
            cell10.innerHTML = row.STATUS === 'Pending' ? '<span class="badge badge-dark">Pending</span>' :
                row.STATUS === 'Incomplete' ? '<span class="badge badge-danger">Incomplete</span>' :
                row.STATUS === 'In Progress' ? '<span class="badge badge-warning">In Progress</span>' :
                row.STATUS === 'Completed' ? '<span class="badge badge-success">Completed</span>' : '';
            cell11.textContent = row.ANNUAL;
        });
    </script>
</body>