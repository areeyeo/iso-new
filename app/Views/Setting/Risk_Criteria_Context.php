<title>Awareness Version</title>
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
    tr:nth-child(even) {
        background-color: #F5F5F5;
    }

    th {
        background-color: #F5F6FA;
        text-align: center;
        border-bottom: none;
    }

    tbody {
        /* border-bottom: 10px solid #ccc; */
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

    .btn {
        font-size: 10pt;
        text-align: left;
    }

    .nav-link.active {
        background-color: #E2F0FF;
        color: #007BFF;
    }
</style>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            Risk Criteria Context
                            <button class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Requirement</button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a>Risk Criteria Context</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-consequence-tab" data-toggle="pill" href="#v-pills-consequence" aria-controls="v-pills-consequence" aria-selected="true" data-url="risk_Criteria_Context_Consequence">
                                        <i class="fas fa-list-ul"></i>
                                        &nbsp;&nbsp;&nbsp;Consequence Level
                                    </a>
                                    <a class="nav-link mt-3" id="v-pills-likelihood-tab" data-toggle="pill" href="#v-pills-likelihood" aria-controls="v-pills-likelihood" aria-selected="false" data-url="risk_Criteria_Context_Likelihood">
                                        <i class="fas fa-chart-line"></i>
                                        &nbsp;&nbsp;&nbsp;Likelihood Level
                                    </a>
                                    <a class="nav-link mt-3" id="v-pills-risk-level-tab" data-toggle="pill" href="#v-pills-risk-level" aria-controls="v-pills-risk-level" aria-selected="false" data-url="risk_Criteria_Context_Risk_Level">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        &nbsp;&nbsp;&nbsp;Risk Level
                                    </a>
                                    <a class="nav-link mt-3" id="v-pills-risk-option-tab" data-toggle="pill" href="#v-pills-risk-option" aria-controls="v-pills-risk-option" aria-selected="false" data-url="risk_Criteria_Context_Risk_Option">
                                        <i class="fas fa-sliders-h"></i>
                                        &nbsp;&nbsp;&nbsp;Risk Options
                                    </a>

                                </div>
                            </div>

                            <div class="col-lg col-md">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-consequence" role="tabpanel" aria-labelledby="v-pills-consequence-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-likelihood" role="tabpanel" aria-labelledby="v-pills-likelihood-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-risk-level" role="tabpanel" aria-labelledby="v-pills-risk-level-tab">
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-risk-option" role="tabpanel" aria-labelledby="v-pills-risk-option-tab">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>
<script>
    $(document).ready(function() {
        $('#v-pills-consequence').load($('#v-pills-consequence-tab').attr('data-url'));
        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            var tab_id = $(this).attr('href');
            var url = $(this).attr('data-url');
            $(tab_id).load(url);
            $(this).tab('show');
        });
    });
</script>