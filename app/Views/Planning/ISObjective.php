<title>IS Objectives Version</title>
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
            <h1>IS Objectives
              <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Requirement</button>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
              <li class="breadcrumb-item"><a>IS Objectives</a></li>

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Reviewed หรือไม่', 'context/status_update/id_version ?>/1')">Pending Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Review หรือไม่', 'context/status_update/id_version ?>/2')">Review</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Reject Review</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Approve หรือไม่', 'context/status_update/id_version ?>/3')">Pending
                          Approve</a>
                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/id_version ?>/4')">Approved</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(4)">Reject Approved</a>
                      </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-submenu">
                      <a class="dropdown-item dropdown-toggle" href="#">Update</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item">Update review date</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item">Revise</a>
                      </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Create Note</a>
                  </div>

                  <i class="fas fa-cog" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)"></i>
                </div>
              </div>
              <div class="card-body">
                <div class="container-fluid">
                  <div class="row justify-content-center mb-2">
                    <div class="col-sm-3 ">
                      <h6>Version: <span class="blue-text">
                        </span></h6>
                    </div>
                    <div class="col-sm-3 ">
                      <h6>Status:

                      </h6>
                    </div>
                    <div class="col-sm-3 ">
                      <h6>Approved Date: <span class="gray-text"></span></h6>
                    </div>
                  </div>
                  <div class="row justify-content-center mb-2">
                    <div class="col-sm-3 ">
                      <h6>Modified Date: <span class="gray-text"></span></h6>
                    </div>
                    <div class="col-sm-3 ">
                      <h6>Last Reviewed: <span class="gray-text"></span></h6>
                    </div>
                    <div class="col-sm-3 ">
                      <h6>Announce Date: <span class="gray-text"></span></h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card" id="context-ana">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                  <div>
                    <div class="form-group">
                      <ul class="nav nav-pills" id="tabs-tab" role="tablist">
                        <li class="nav-item-tab" style="padding-right: 10px;">
                          <a class="nav-link active" id="Objectives-tab" data-toggle="pill" href="#Objectives" role="tab" aria-controls="Objectives" aria-selected="true">Objectives</a>
                        </li>
                        <li class="nav-item-tab">
                          <a class="nav-link" id="Planning-tab" data-toggle="pill" href="#Planning" role="tab" aria-controls="Planning" aria-selected="false" onclick="getTableData2();">Planning</a>
                        </li>
                        <li class="nav-item-tab">
                          <a class="nav-link" id="Summary-tab" data-toggle="pill" href="#Summary" role="tab" aria-controls="Summary" aria-selected="false" onclick="getTableData2();">Summary</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="d-flex">
                    <div id="btn-Objectives" name="btn-Objectives">
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)">
                        <span class="text-nowrap"><i class="fas fa-edit"></i>Create Objectives</span>
                      </button>
                    </div>
                    <div id="btn-Planning" name="btn-Planning">
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default" onclick="load_modal(3)">
                        <span class="text-nowrap"><i class="fas fa-edit"></i>Create Planning</span>
                    </div>
                  </div>
                </div>
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="Objectives" role="tabpanel" aria-labelledby="org-strategy-tab">
                    <table id="example1" class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">ACTION</th>
                          <th>No.</th>
                          <th>OBJECTIVES</th>
                          <th>EVALUATION</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade show" id="Planning" role="tabpanel" aria-labelledby="Planning-tab">
                    <table id="example2" class="table table-hover">
                      <thead>
                        <tr>
                          <th class="text-center">ACTION</th>
                          <th>No.</th>
                          <th>OBJECTIVES</th>
                          <th>EVALUATION</th>
                          <th>PLANNING</th>
                          <th>START DATE</th>
                          <th>END DATE</th>
                          <th>OWNER</th>
                          <th>FILE</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade show" id="Summary" role="tabpanel" aria-labelledby="Summary-tab">
                    <table id="example3" class="table table-hover">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>OBJECTIVES</th>
                          <th>EVALUATION</th>
                          <th>PLANNING</th>
                          <th>START DATE</th>
                          <th>END DATE</th>
                          <th>OWNER</th>
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
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="modal-default">
    <div id="modal_contextver">
      <?= $this->include("Modal/Context_Ver"); ?>
    </div>
    <div id="modal_crud_planning_is_objectives">
      <?= $this->include("Modal/CRUD_Planning_IS_Objectives"); ?>
    </div>
    <div id="modal_crud_planning_is_planning">
      <?= $this->include("Modal/CRUD_Planning_IS_Planning"); ?>
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
    $('#btn-Planning').hide();
  </script>
  <script>
    function load_modal(check, check_type, data_encode) {
      console.log('Function is called with check:', check, 'and check_type:', check_type);

      modal_contextver = document.getElementById("modal_contextver");
      modal_crud_planning_is_objectives = document.getElementById("modal_crud_planning_is_objectives");
      modal_crud_planning_is_planning = document.getElementById("modal_crud_planning_is_planning");
      modal_requirement = document.getElementById("modal_requirement");
      $(".modal-body #iss").empty();

      //--set header--//
      if (check_type == '1') {
        $(".modal-header #title_modal").text("Objectives");
        $(".modal-body #topic_title_select").text("Objectives");
      } else if (check_type == '2') {
        $(".modal-header #title_modal").text("Planning");
        $(".modal-body #topic_title_select").text("Planning");
      } else if (check_type == '3') {
        $(".modal-header #title_modal").text("Summary");
        $(".modal-body #topic_title_select").text("Summary");
      }
      if (check == '1') {
        //--show modal requirment--//
        console.log('Showing modal 1');
        modal_contextver.style.display = "block";
        modal_crud_planning_is_objectives.style.display = "none";
        modal_crud_planning_is_planning.style.display = "none";
        modal_requirement.style.display = "none";
        modal_reject.style.display = "none";
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
      } else if (check == '2') {
        //--show modal requirment--//
        console.log('Showing modal 2');
        modal_contextver.style.display = "none";
        modal_crud_planning_is_objectives.style.display = "block";
        modal_crud_planning_is_planning.style.display = "none";
        modal_requirement.style.display = "none";
        modal_reject.style.display = "none";
      } else if (check == '3') {
        console.log('Showing modal 3');
        modal_contextver.style.display = "none";
        modal_crud_planning_is_objectives.style.display = "none";
        modal_crud_planning_is_planning.style.display = "block";
        modal_requirement.style.display = "none";
        modal_reject.style.display = "none";

      } 
    }
  </script>
  <script>
    $('#Objectives-tab').on('click', function() {
      console.log('Objectives-tab');
      $('#btn-Objectives').show();
      $('#btn-Planning').hide();
    });
    $('#Planning-tab').on('click', function() {
      console.log('Planning-tab');
      $('#btn-Objectives').hide();
      $('#btn-Planning').show();
    })
    $('#Summary-tab').on('click', function() {
      console.log('Summary-tab');
      $('#btn-Objectives').hide();
      $('#btn-Planning').hide();
    })
  </script>
  <!-- objectives -->
  <script>
    var Data = [{
        "OBJECTIVES": "text1",
        "EVALUATION": "text1"
      },
      {
        "OBJECTIVES": "text2",
        "EVALUATION": "text2"
      }
    ];

    var example1TableBody = document.getElementById("example1").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
      var newRow = example1TableBody.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);

      cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
      cell2.textContent = index + 1;
      cell3.textContent = row.OBJECTIVES;
      cell4.textContent = row.EVALUATION;
    });
  </script>
  <!-- planning -->
  <script>
    var DataPlanning = [{
        "OBJECTIVES": "text1",
        "EVALUATION": "text1",
        "PLANNING": "text1",
        "START_DATE": "2024-01-01",
        "END_DATE": "2024-01-31",
        "OWNER": "John Doe",
        "FILE": "file1.pdf"
      },
      {
        "OBJECTIVES": "text2",
        "EVALUATION": "text2",
        "PLANNING": "text2",
        "START_DATE": "2024-02-01",
        "END_DATE": "2024-02-29",
        "OWNER": "Jane Doe",
        "FILE": "file2.pdf"
      }
    ];

    var example2TableBody = document.getElementById("example2").getElementsByTagName("tbody")[0];

    DataPlanning.forEach(function(row, index) {
      var newRow = example2TableBody.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);
      var cell5 = newRow.insertCell(4);
      var cell6 = newRow.insertCell(5);
      var cell7 = newRow.insertCell(6);
      var cell8 = newRow.insertCell(7);
      var cell9 = newRow.insertCell(8);

      cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButtonPlanning${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonPlanning${index}">
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(3)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(3)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
      cell2.textContent = index + 1;
      cell3.textContent = row.OBJECTIVES;
      cell4.textContent = row.EVALUATION;
      cell5.textContent = row.PLANNING;
      cell6.textContent = row.START_DATE;
      cell7.textContent = row.END_DATE;
      cell8.textContent = row.OWNER;
      cell9.textContent = row.FILE;
    });
  </script>
  <!-- summary -->
  <script>
    var DataSummary = [{
        "OBJECTIVES": "text1",
        "EVALUATION": "text1",
        "PLANNING": ["text1", "text1", "text1"],
        "START_DATE": ["2024-01-01", "2024-01-01", "2024-01-01"],
        "END_DATE": ["2024-01-01", "2024-01-01", "2024-01-01"],
        "OWNER": ["Jane Doe", "Jane Doe", "Jane Doe"],
        "FILE": ["file1.pdf", "file1.pdf", "file1.pdf"],
      },
      {
        "OBJECTIVES": "text2",
        "EVALUATION": "text2",
        "PLANNING": "text2",
        "START_DATE": "2024-02-01",
        "END_DATE": "2024-02-29",
        "OWNER": "Jane Doe",
        "FILE": "file2.pdf",
      },
    ];

    var example3TableBody = document.getElementById("example3").getElementsByTagName("tbody")[0];

    DataSummary.forEach(function(row, index) {
      var newRow = example3TableBody.insertRow();

      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);
      var cell5 = newRow.insertCell(4);
      var cell6 = newRow.insertCell(5);
      var cell7 = newRow.insertCell(6);
      var cell8 = newRow.insertCell(7);

      cell1.textContent = index + 1;
      cell2.textContent = row.OBJECTIVES;
      cell3.textContent = row.EVALUATION;
      displayArrayInCell(cell4, row.PLANNING);
      displayArrayInCell(cell5, row.START_DATE);
      displayArrayInCell(cell6, row.END_DATE);
      displayArrayInCell(cell7, row.OWNER);
      displayArrayInCell(cell8, row.FILE);
    });

    function displayArrayInCell(cell, dataArray) {
      if (Array.isArray(dataArray) && dataArray.length > 1) {
        cell.innerHTML = dataArray.join('<br>');
      } else {
        cell.textContent = Array.isArray(dataArray) ? dataArray[0] : dataArray;
      }
    }
  </script>