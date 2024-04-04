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
<!DOCTYPE html>
<html lang="en">
<style>
    .select2-container--default .select2-selection--multiple {
        border: 1px solid #ced4da !important;
    }

    .select2-selection__choice {
        background-color: #1D2124 !important;
        border: 1px solid #1D2124 !important;
        color: #fff !important;
    }

    .select2-selection__choice__remove {
        color: #fff !important;
    }

    .input-group button {
        padding: 5px 10px;
        background-color: transparent;
        color: #007bff;
        border: 1px solid #007bff;
        border-radius: 0px 4px 4px 0px;
        cursor: pointer;
    }

    .input-group button:hover {
        background-color: #007bff;
        color: #fff;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documented Information Version</title>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100%;
        }

        .select2-selection__choice {
            background-color: #343A40;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 3px 10px;
            margin-right: 5px;
        }

        .select2-search__field {
            width: 100%;
            border: none;
        }

        .select2-dropdown {
            border: 1px solid #343A40;
        }

        .select2-results__option {
            padding: 8px 12px;
        }

        .select2-results__option--highlighted {
            background-color: #343A40;
            color: #fff;
        }
    </style>
</head>
<?php
$statuses = [
    "Draft" => ["background-color" => "#343A40", "color" => "#fff"],
    "Rejected" => ["background-color" => "#D40000", "color" => "#fff"],
    "Pending Review" => ["background-color" => "#E2F0FF", "color" => "#0062FF"],
    "Pending Approval" => ["background-color" => "#D4EDDA", "color" => "#28A745"],
    "Approved" => ["background-color" => "#28A745", "color" => "#fff"],
    "Request Modification" => ["background-color" => "#FBCB0A", "color" => "#fff"]
];

// $status = "Pending Review";
$status = "Approved";
$badgeStyle = $statuses[$status];
?>

<body class="hold-transition sidebar-mini">
    <div class="content-wrapper">
        <!-- Page header -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Documented Information
                            <button type="button" class="btn btn-secondary btn-xs btn-requirement" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(2)">
                                Requirement
                            </button>
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                            <li class="breadcrumb-item"><a>Documented Information</a></li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2 class="card-title">Management Control</h2>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-dark btn-sm btn-save-draft" onclick="confirm_Alert('ต้องการที่จะ Save Draft หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/1')">
                                    <i class="fas fa-save"></i>
                                    &nbsp;Save Draft
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-sm btn-send-review" onclick="confirm_Alert('ต้องการที่จะ Send Review หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/1')">
                                    <i class="fas fa-user-check"></i>
                                    &nbsp;Send Review
                                </button>
                                <button type="button" class="btn btn-outline-success btn-sm btn-send-approval" onclick="confirm_Alert('ต้องการที่จะ Send Approval หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/1')">
                                    <i class="fas fa-paper-plane"></i>
                                    &nbsp;Send Approval
                                </button>
                                <button type="button" class="btn btn-success btn-sm btn-approved" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/<?= $data['id_version'] ?>/1')">
                                    <i class="fas fa-check-circle"></i>
                                    &nbsp;Approved
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-rejected" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">
                                    <i class="fas fa-times-circle"></i>
                                    &nbsp;Rejected
                                </button>
                                <button type="button" class="btn btn-outline-danger btn-sm btn-view-rejection-details" id="view-rejection-details-button">
                                    <i class="fas fa-eye"></i>
                                    &nbsp;View Rejection Details
                                </button>
                                <button type="button" class="btn btn-warning btn-sm btn-request-modification" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)">
                                    <i class="fas fa-sync-alt"></i>
                                    &nbsp;Request Modification
                                </button>

                                <button type="button" class="btn btn-outline-warning btn-sm btn-view-request-details" id="view-request-details-button">
                                    <i class="fas fa-eye"></i>
                                    &nbsp;View Request Modification Details
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-baseline">
                            <span>Status Document:&nbsp;&nbsp;</span>
                            <span class="badge rounded-pill" style="background-color: <?= $badgeStyle['background-color']; ?>; color: <?= $badgeStyle['color']; ?>;"><?= $status; ?></span>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Type</h6>
                                    <select class="custom-select" id="doc-type-select">
                                        <option selected>Select Document Type</option>
                                        <option value="1">Management system manaul</option>
                                        <option value="2">Policy</option>
                                        <option value="3">Plan</option>
                                        <option value="4">Procedure</option>
                                        <option value="5">Workintruction</option>
                                        <option value="6">Form</option>
                                        <option value="7">External</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Abbreviation</h6>
                                    <input class="form-control gray-text" type="text" name="document_abbreviation" id="document_abbreviation"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Name TH</h6>
                                    <input class="form-control gray-text" type="text" name="nameth" id="nameth"></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Document Name ENG</h6>
                                    <input class="form-control gray-text" type="text" name="nameen" id="nameen"></input>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group mt-3">
                                    <h6>Secret Level</h6>
                                    <select class="custom-select" id="doc-secret-level">
                                        <option selected>Select Secret Level</option>
                                        <option value="1">Top secret</option>
                                        <option value="2">Secret</option>
                                        <option value="3">Confidential</option>
                                        <option value="4">Internal use</option>
                                        <option value="5">Public</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <h6>Management Permissions</h6>
                                    <select id="tags-management-doc" multiple="multiple" class="form-control select2tags" disabled>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-3">
                                <div class="form-group user-upload">
                                    <h6>Attach File</h6>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="doc-file" accept=".docx, .pdf, .xlsx , .doc" data-max-size="20971520" name="file">
                                        <label class="custom-file-label" for="doc-file">Choose file</label>
                                    </div>
                                    <h6 class="gray-text">.doc .xls .pdf (20 MB per file)</h6>
                                </div>
                                <div class="form-group user-view">
                                    <h6>File</h6>
                                    <div class="input-group">
                                        <input class="form-control gray-text" type="text" name="file" id="file" disabled></input>
                                        <button type="button" id="button-addon2"><i class="fas fa-search"></i>&nbsp;View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 d-flex justify-content-end">
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Created By</h6>
                                    <input class="form-control gray-text" type="text" name="createdby" id="createdby" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Creation Date</h6>
                                    <input class="form-control gray-text" type="datetime-local" name="creationtime" id="creationtime" disabled></input>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Last Modified By</h6>
                                    <input class="form-control gray-text" type="text" name="lastmodifiedby" id="lastmodifiedby" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Last Modified Date</h6>
                                    <input class="form-control gray-text" type="datetime-local" name="lastmodifiedtime" id="lastmodifiedtime" disabled></input>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Approved By</h6>
                                    <input class="form-control gray-text" type="text" name="approvedby" id="approvedby" disabled></input>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mt-3">
                                    <h6>Approval Date</h6>
                                    <input class="form-control gray-text" type="datetime-local" name="approvaldate" id="approvaldate" disabled></input>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit" class="btn btn-success" name="submit" value="Submit">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left: 30px;">Cancel</button>
                    </div>
                </div>
            </div>
    </div>
    </section>
    <div class="modal fade" id="modal-default">
        <div id="requirement_modal">
            <?= $this->include("Modal/Requirement_Modal"); ?>
        </div>
        <div id="doc_status_modal">
            <?= $this->include("Modal/Doc_Status_Modal"); ?>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- Your JavaScript -->
    <script>
        $(document).ready(function() {
            $('#tags-management-doc').select2({
                data: ["Create/Update/Upload", "Review", "Approval"],
                placeholder: "Select Tags",
                tags: false,
                tokenSeparators: [',', ' '],
                width: '100%',
            });

            $('#tags-management-doc').val(["Create/Update/Upload", "Review", "Approval"]).trigger('change');
        });
    </script>
    <script>
        var documentStatus = "<?php echo $status; ?>";

        $("button.btn").hide();
        $(".user-upload, .user-view").hide();
        $(".btn-requirement").show();

        if (documentStatus === "Draft") {
            $("button.btn-save-draft").show();
            $("button.btn-send-review").show();
            $(".user-upload").show();
            $(".user-view").hide();
        } else if (documentStatus === "Rejected") {
            $("button.btn-save-draft").show();
            $("button.btn-send-review").show();
            $("button.btn-view-rejection-details").show();
            $(".user-upload").show();
            $(".user-view").hide();
        } else if (documentStatus === "Pending Review") {
            $("button.btn-send-approval").show();
            $("button.btn-rejected").show();
            $(".user-upload").hide();
            $(".user-view").show();
        } else if (documentStatus === "Pending Approval") {
            $("button.btn-approved").show();
            $("button.btn-rejected").show();
            $(".user-upload").hide();
            $(".user-view").show();
        } else if (documentStatus === "Approved") {
            $("button.btn-request-modification").show();
            $(".user-upload").hide();
            $(".user-view").show();
        } else if (documentStatus === "Request Modification") {
            $("button.btn-save-draft").show();
            $("button.btn-send-review").show();
            $("button.btn-view-request-details").show();
            $(".user-upload").show();
            $(".user-view").hide();
        }
    </script>
    <script>
        function load_modal(check, data_, status) {
            doc_status_modal = document.getElementById("doc_status_modal");
            requirement_modal = document.getElementById("requirement_modal");
            if (check == 1) {
                doc_status_modal.style.display = "block";
                requirement_modal.style.display = "none";
            } else if (check == 2) {
                doc_status_modal.style.display = "none";
                requirement_modal.style.display = "block";
            }
        }
    </script>
    <script>
        $('#view-request-details-button').click(function() {
            Swal.fire({
                title: 'Request Modification Details',
                html: '<p>Example of a short message Example of a short message Example of a short message Example of a short message.</p>',
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });

        $('#view-rejection-details-button').click(function() {
            Swal.fire({
                title: 'Rejection Details',
                html: '<p>Example of a short message Example of a short message Example of a short message Example of a short message.</p>',
                icon: 'info',
                confirmButtonText: 'Close'
            });
        });
    </script>
</body>

</html>