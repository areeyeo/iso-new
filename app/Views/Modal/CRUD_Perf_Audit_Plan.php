<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offcanvas Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <style>
    #dataTable tbody tr {
      background-color: white;
    }

    #dataTable thead th {
      background-color: #8ec4ff;
      color: #143e6c;
    }

    .offcanvas {
      width: 400px;
      height: 100%;
      position: fixed;
      top: 0;
      right: -400px;
      /* Hide offcanvas by default */
      background-color: white;
      z-index: 1051;
      /* Bootstrap modal backdrop z-index is 1030 */
      transition: right 0.3s ease-in-out;
    }

    .offcanvas.show {
      right: 0;
    }

    .offcanvas-backdrop {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2);
      z-index: 1050;
      display: none;
    }

    .offcanvas-backdrop.show {
      display: block;
    }

    .offcanvaschecklist {
      width: 400px;
      height: 100%;
      position: fixed;
      top: 0;
      right: -400px;
      /* Hide offcanvas by default */
      background-color: white;
      z-index: 1051;
      /* Bootstrap modal backdrop z-index is 1030 */
      transition: right 0.3s ease-in-out;
    }

    .offcanvaschecklist.show {
      right: 0;
    }

    .offcanvas-backdrop-checklist {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2);
      z-index: 1050;
      display: none;
    }

    .offcanvas-backdrop-checklist.show {
      display: block;
    }

    .offcanvasreport {
      width: 400px;
      height: 100%;
      position: fixed;
      top: 0;
      right: -400px;
      /* Hide offcanvas by default */
      background-color: white;
      z-index: 1051;
      /* Bootstrap modal backdrop z-index is 1030 */
      transition: right 0.3s ease-in-out;
    }

    .offcanvasreport.show {
      right: 0;
    }

    .offcanvas-backdrop-report {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2);
      z-index: 1050;
      display: none;
    }

    .offcanvas-backdrop-report.show {
      display: block;
    }
  </style>
</head>

<body>
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title" id="title_modal" name="title_modal">Audit Plan</h4>
      </div>
      <div class="modal-body">
        <form class="mb-3" id="form_crud" action="javascript:void(0)" method="post" enctype="multipart/form-data">
          <div class="form-group mt-3">
            <div style="font-weight: 600;">
              <h6>Program Name</h6>
            </div>
            <div>
              <h6 style="color: #007BFF;" name="projectname_detail" id="projectname_detail">
                Example of a short message
              </h6>
            </div>
          </div>
          <div class="form-group mt-3">
            <div class="row mt-3">
              <div class="col-3">
                <div class="form-group">
                  <h6>Start date</h6>
                  <div style=" color: #666666; font-size: 11pt;" name="startdate_detail" id="startdate_detail">
                    01 January 2024
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="form-group">
                  <h6>End date</h6>
                  <div style=" color: #666666; font-size: 11pt;" name="enddate_detail" id="enddate_detail">
                    01 January 2024
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#" onclick="showTab('tab1')">Initial Data</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showTab('tab2')">Schedule Plan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showTab('tab3')">Audit Checklist</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showTab('tab4')">Audit Report</a>
            </li>
          </ul>
          <!-- tab initial data-->
          <div id="tab1Content" style="display: block;">
            <div class="container">
              <h5 class="mt-3">Initial Data</h5>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
              </div>
              <div class="form-group mt-3">
                <h6>Audit Objective</h6>
                <input class="form-control gray-text" type="text" placeholder="Text..." name="auditobjectives" id="auditobjectives"></input>
              </div>
              <div class="row mt-3">
                <div class="col-6">
                  <div class="form-group">
                    <h6>Audit Scope</h6>
                    <textarea class="form-control gray-text" rows="2" placeholder="Text..." name="auditscope" id="auditscope"></textarea>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <h6>Audit Criteria</h6>
                    <textarea class="form-control gray-text" rows="2" placeholder="Text..." name="auditcriteria" id="auditcriteria"></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="form-group mt-3">
                    <h6>Audit Lead</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="auditlead" id="auditlead"></input>
                  </div>
                  <div class="form-group">
                    <h6>Attach File Audit Plan</h6>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" accept=".docx, .pdf, .xlsx , .doc" data-max-size="20971520" name="file">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <h6 class="gray-text">.doc .xls .pdf (20 MB per file)</h6>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group mt-3">
                    <h6>Audit Team</h6>
                    <textarea onInput="handleInput(event)" class="form-control gray-text" rows="5" placeholder="Text..." name="auditteam" id="auditteam"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- tab schedule plan -->
          <div id="tab2Content" style="display: none;">
            <div class="container">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mt-3">Schedule Plan</h5>
                <button type="button" class="btn btn-outline-primary btn-sm mt-3" onclick="toggleOffcanvas()"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add an event</button>
              </div>
              <table id="dataTable" class="table table-hover">
                <thead>
                  <tr>
                    <th style="border-radius: 10px 0px 0px 0px;">No.</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Topic</th>
                    <th>Auditee</th>
                    <th style="border-radius: 0px 10px 0px 0px;">Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <!-- tab audit checklist -->
          <div id="tab3Content" style="display: none;">
            <div class="container">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mt-3">Audit Checklist</h5>
                <button type="button" class="btn btn-outline-primary btn-sm mt-3" onclick="toggleOffcanvaschecklist()">
                  <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Audit Checklist
                </button>
              </div>

              <table class="table table table-hover" id="dataTableChecklist">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>INSPECTION TOPIC</th>
                    <th>FILE</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <!-- tab audit report -->
          <div id="tab4Content" style="display: none;">
            <div class="container">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mt-3">Audit Report</h5>
                <button type="button" class="btn btn-outline-primary btn-sm mt-3" onclick="toggleOffcanvasreport()">
                  <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Audit Report
                </button>
              </div>

              <table class="table table table-hover" id="dataTableReport">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>REPORT ABOUT</th>
                    <th>NOTE</th>
                    <th>FILE</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>

          <input type="text" id="url_route" name="url_route" hidden>
          <input type="text" id="check_type" name="check_type" hidden>
          <input type="text" id="id_" name="id_" hidden>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit" value="Submit">SAVE</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- canvas details schedule-->
  <div id="offcanvas" class="offcanvas">
    <div class="p-4">
      <div class="d-flex justify-content-between align-items-center">
        <h4>Daily Audit Schedule</h4>
        <span style="cursor: pointer;" onclick="closeOffcanvas()"><i class="fas fa-times"></i></span>
      </div>
      <hr>
      <div class="form-group mt-3">
        <h6>Date</h6>
        <input class="form-control gray-text" type="date" placeholder="Text..." name="date" id="date"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Start Time</h6>
        <input class="form-control gray-text" type="time" placeholder="Text..." name="starttime" id="starttime"></input>
      </div>
      <div class="form-group mt-3">
        <h6>End Time</h6>
        <input class="form-control gray-text" type="time" placeholder="Text..." name="enddate" id="enddate"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Topic</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="topic" id="topic"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Deteils</h6>
        <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="deteils" id="deteils"></textarea>
      </div>
      <div class="form-group mt-3">
        <h6>Auditee</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="auditee" id="auditee"></input>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-success" name="submit" value="Submit">SAVE</button>&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-danger" onclick="closeOffcanvas()">CANCEL</button>
    </div>
  </div>
  <div id="offcanvasBackdrop" class="offcanvas-backdrop"></div>

  <!-- canvas audit checklist-->
  <div id="offcanvaschecklist" class="offcanvaschecklist">
    <div class="p-4">
      <div class="d-flex justify-content-between align-items-center">
        <h4>Audit Checklist</h4>
        <span style="cursor: pointer;" onclick="closeOffcanvaschecklist()"><i class="fas fa-times"></i></span>
      </div>
      <hr>
      <div class="form-group mt-3">
        <h6>Inspection topic</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="inspectiontopic" id="inspectiontopic"></input>
      </div>
      <div class="form-group">
        <h6>Attach File Checklist</h6>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="exampleInputFile" accept=".docx, .pdf, .xlsx , .doc" data-max-size="20971520" name="file">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <h6 class="gray-text">.doc .xls .pdf (20 MB per file)</h6>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-success" name="submit" value="Submit">SAVE</button>&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-danger" onclick="closeOffcanvaschecklist()">CANCEL</button>
    </div>
  </div>
  <div id="offcanvasBackdropchecklist" class="offcanvas-backdrop-checklist"></div>

  <!-- canvas audit report-->
  <div id="offcanvasreport" class="offcanvasreport">
    <div class="p-4">
      <div class="d-flex justify-content-between align-items-center">
        <h4>Audit Report</h4>
        <span style="cursor: pointer;" onclick="closeOffcanvasreport()"><i class="fas fa-times"></i></span>
      </div>
      <hr>
      <div class="form-group mt-3">
        <h6>Report About</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="report" id="report"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Note</h6>
        <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="note" id="note"></textarea>
      </div>
      <div class="form-group">
        <h6>Attach File Audit Report</h6>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="exampleInputFile" accept=".docx, .pdf, .xlsx , .doc" data-max-size="20971520" name="file">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
        <h6 class="gray-text">.doc .xls .pdf (20 MB per file)</h6>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-success" name="submit" value="Submit">SAVE</button>&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-danger" onclick="closeOffcanvasreport()">CANCEL</button>
    </div>
  </div>
  <div id="offcanvasBackdropreport" class="offcanvas-backdrop-report"></div>

  <!-- overlay modal -->
  <script>
    $(document).ready(function() {
      $(".overlay").hide();
    });

    $("#form_crud").on('submit', function(e) {
      e.preventDefault();
      const urlRouteInput = document.getElementById("url_route");
      action_(urlRouteInput.value, 'form_crud');
    });
  </script>

  <!-- bullet textarea -->
  <script>
    let previousLength = 0;

    const handleInput = (event) => {
      const bullet = "\u2022";
      const newLength = event.target.value.length;
      const characterCode = event.target.value.substr(-1).charCodeAt(0);

      if (newLength > previousLength) {
        if (characterCode === 10) {
          event.target.value = `${event.target.value}${bullet} `;
        } else if (newLength === 1) {
          event.target.value = `${bullet} ${event.target.value}`;
        }
      }

      previousLength = newLength;
    }
  </script>

  <!-- show tab switch -->
  <script>
    function showTab(tabId) {
      document.querySelectorAll('[id^="tab"]').forEach(tab => {
        tab.style.display = 'none';
      });

      document.querySelectorAll('.nav-link').forEach(item => {
        item.classList.remove('active');
      });

      document.getElementById(tabId + 'Content').style.display = 'block';

      document.querySelector('[href="#' + tabId + '"]').classList.add('active');
    }
  </script>

  <!-- table schedule plan -->
  <script>
    var Data = [{
        "ROWTYPE": "date",
        "NO": "วันที่ 1",
        "DATE": "1 January 2024",
      },
      {
        "Data": "1",
        "TIME": "09:00 - 12:00",
        "TOPIC": "ประชุมเปิดการตรวจสอบ (Open Meeting)",
        "AUDITEE": "All",
      },
      {
        "Data": "1",
        "TIME": "13:00 - 15:00",
        "TOPIC": "สัมภาษณ์ผู้บริหาร (Top Management)",
        "AUDITEE": "Top Management",
      },
      {
        "ROWTYPE": "date",
        "NO": "วันที่ 2",
        "DATE": "2 January 2024",

      },
      {
        "Data": "1",
        "TIME": "09:00 - 10:00",
        "TOPIC": "มาตรการควบคุมความเสี่ยงสำหรับระบบเครือข่าย",
        "AUDITEE": "IT",
      },
      {
        "Data": "1",
        "TIME": "10:00 - 12:00",
        "TOPIC": "มาตรการควบคุมความเสี่ยงสำหรับระบบกองทุนให้กู้ยืม",
        "AUDITEE": "Accountant",
      },
      {
        "Data": "1",
        "TIME": "13:00 - 16:00",
        "TOPIC": "สรุปประจำวัน (Daily Progress Report)",
        "AUDITEE": "All",
      },
    ];
    var example1TableBody = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
      var newRow = example1TableBody.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);
      var cell5 = newRow.insertCell(4);
      var cell6 = newRow.insertCell(5);

      cell1.textContent = row.NO;
      cell2.textContent = row.DATE;
      displayArrayInCell(cell3, row.TIME);
      displayArrayInCell(cell4, row.TOPIC);
      displayArrayInCell(cell5, row.AUDITEE);

      if (row.ROWTYPE === 'date') {
        newRow.style.backgroundColor = '#E2F0FF';
        for (var i = 0; i < newRow.cells.length; i++) {
          newRow.cells[i].style.backgroundColor = '#E2F0FF';
          newRow.cells[i].style.color = '#007BFF';
        }
      }

      if (row["Data"] === "1") {
        cell6.innerHTML = `<div class="dropdown">
                                <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
                                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
                                    <li onclick="toggleOffcanvas()"><a class="dropdown-item" href="#">Edit</a></li>
                                    <li onclick="toggleOffcanvas()"><a class="dropdown-item" href="#">View</a></li>
                                    <li onclick="toggleOffcanvas()"><a class="dropdown-item" href="#">Delete</a></li>
                                  </ul>
                            </div>`;
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

  <!-- table checklist -->
  <script>
    var Data = [{
        "INSPECTIONTOPIC": "สิทธิในทรัพย์สินทางปัญญา1",
        "FILE": "123456.pdf",
      },
      {
        "INSPECTIONTOPIC": "สิทธิในทรัพย์สินทางปัญญา2",
        "FILE": "123456.pdf",
      },
      {
        "INSPECTIONTOPIC": "สิทธิในทรัพย์สินทางปัญญา3",
        "FILE": "123456.pdf",
      },
      {
        "INSPECTIONTOPIC": "สิทธิในทรัพย์สินทางปัญญา4",
        "FILE": "123456.pdf",
      },
      {
        "INSPECTIONTOPIC": "สิทธิในทรัพย์สินทางปัญญา5",
        "FILE": "123456.pdf",
      },
    ];

    var dataTableChecklistBody = document.getElementById("dataTableChecklist").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
      var newRow = dataTableChecklistBody.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);

      cell1.innerHTML = index + 1;
      cell2.textContent = row.INSPECTIONTOPIC;
      cell3.textContent = row.FILE;
      cell4.innerHTML = `<div class="dropdown">
                              <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
                                <li><a class="dropdown-item" href="#" onclick="toggleOffcanvaschecklist()">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Copy</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#" onclick="toggleOffcanvaschecklist()">Create</a></li>
                              </ul>
                          </div>`;
    });
  </script>

  <!-- table report -->
  <script>
    var Data = [{
      "REPORT": "รายงานแผนการตรวจสอบ",
      "NOTE": "-",
      "FILE": "123456.pdf",
    }, ];

    var dataTableChecklistBody = document.getElementById("dataTableReport").getElementsByTagName("tbody")[0];

    Data.forEach(function(row, index) {
      var newRow = dataTableChecklistBody.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);
      var cell5 = newRow.insertCell(4);

      cell1.innerHTML = index + 1;
      cell2.textContent = row.REPORT;
      cell3.textContent = row.NOTE;
      cell4.textContent = row.FILE;
      cell5.innerHTML = `<div class="dropdown">
                              <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Copy</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Create</a></li>
                              </ul>
                          </div>`;
    });
  </script>

  <!-- canvas open and close -->
  <script>
    function toggleOffcanvas() {
      const offcanvas = document.getElementById('offcanvas');
      const offcanvasBackdrop = document.getElementById('offcanvasBackdrop');
      offcanvas.classList.toggle('show');
      offcanvasBackdrop.classList.toggle('show');
    }

    function closeOffcanvas() {
      const offcanvas = document.getElementById('offcanvas');
      const offcanvasBackdrop = document.getElementById('offcanvasBackdrop');
      offcanvas.classList.remove('show');
      offcanvasBackdrop.classList.remove('show');
    }

    function toggleOffcanvaschecklist() {
      const offcanvaschecklist = document.getElementById('offcanvaschecklist');
      const offcanvasBackdropchecklist = document.getElementById('offcanvasBackdropchecklist');
      offcanvaschecklist.classList.toggle('show');
      offcanvasBackdropchecklist.classList.toggle('show');
    }

    function closeOffcanvaschecklist() {
      const offcanvaschecklist = document.getElementById('offcanvaschecklist');
      const offcanvasBackdropchecklist = document.getElementById('offcanvasBackdropchecklist');
      offcanvaschecklist.classList.remove('show');
      offcanvasBackdropchecklist.classList.remove('show');
    }

    function toggleOffcanvasreport() {
      const offcanvasreport = document.getElementById('offcanvasreport');
      const offcanvasBackdropreport = document.getElementById('offcanvasBackdropreport');
      offcanvasreport.classList.toggle('show');
      offcanvasBackdropreport.classList.toggle('show');
    }

    function closeOffcanvasreport() {
      const offcanvasreport = document.getElementById('offcanvasreport');
      const offcanvasBackdropreport = document.getElementById('offcanvasBackdropreport');
      offcanvasreport.classList.remove('show');
      offcanvasBackdropreport.classList.remove('show');
    }
  </script>
</body>

</html>