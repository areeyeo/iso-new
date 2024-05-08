<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Offcanvas Example</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <style>
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
  </style>
</head>

<body>
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
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
              <div class="col-6">
                <div class="form-group">
                  <h6>Start date</h6>
                  <div style=" color: #666666; font-size: 11pt;" name="startdate_detail" id="startdate_detail">
                    01 January 2024
                  </div>
                </div>
              </div>
              <div class="col-6">
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
              <a class="nav-link active" aria-current="page" href="#" onclick="showTab('tab1')">Audit Plan Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" onclick="showTab('tab2')">Date Time</a>
            </li>
          </ul>
          <!-- tab audit plan details-->
          <div id="tab1Content" style="display: block;">
            <div class="d-flex justify-between align-items-center mt-3">
              <i class="fas fa-question-circle" style="color: #007BFF;"></i>&nbsp;&nbsp;
              <span style="color: red;">กรุณากรอกแผนการตรวจสอบอย่างครบถ้วน และกำหนดตารางเวลาของแผนในแต่ละวัน</span>
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
                  <h6>Criteria</h6>
                  <textarea class="form-control gray-text" rows="2" placeholder="Text..." name="criteria" id="criteria"></textarea>
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
                  <h6>Attach File</h6>
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

          <!-- tab date time -->
          <div id="tab2Content" style="display: none;">
            <div class="container">
              <h5 class="mt-3">Audit Inspection Schedule</h5>
              <table class="table table-bordered" id="dataTable">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Action</th>
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

  <!-- canvas details audit inspection schedule-->
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
        <h6>Monitoring Recipient</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="monitoringrecipient" id="monitoringrecipient"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Topic</h6>
        <input class="form-control gray-text" type="text" placeholder="Text..." name="topic" id="topic"></input>
      </div>
      <div class="form-group mt-3">
        <h6>Deteils</h6>
        <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="deteils" id="deteils"></textarea>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-success" name="submit" value="Submit">SAVE</button>&nbsp;&nbsp;&nbsp;
      <button type="button" class="btn btn-danger" onclick="closeOffcanvas()">CANCEL</button>
    </div>
  </div>
  <div id="offcanvasBackdrop" class="offcanvas-backdrop"></div>

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
  <script>
    var data = [{
        date: "01 May 2024",
        starttime: "",
        endtime: ""
      },
      {
        date: "02 May 2024",
        starttime: "",
        endtime: ""
      },
      {
        date: "03 May 2024",
        starttime: "",
        endtime: ""
      },
      {
        date: "04 May 2024",
        starttime: "",
        endtime: ""
      },
      {
        date: "05 May 2024",
        starttime: "",
        endtime: ""
      }
    ];

    var table = document.getElementById("dataTable").getElementsByTagName("tbody")[0];

    data.forEach(function(item, index) {
      var newRow = table.insertRow();
      var cell1 = newRow.insertCell(0);
      var cell2 = newRow.insertCell(1);
      var cell3 = newRow.insertCell(2);
      var cell4 = newRow.insertCell(3);

      cell1.innerHTML = item.date;
      cell2.innerHTML = item.starttime;
      cell3.innerHTML = item.endtime;
      cell4.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li onclick="toggleOffcanvas()"><a class="dropdown-item" href="#">Edit</a></li>
      <li onclick="toggleOffcanvas()"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
    });

    function updateData(input, field) {
      var rowIndex = input.parentNode.parentNode.rowIndex - 1;
      data[rowIndex][field] = input.value;
    }
  </script>
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
  </script>
</body>

</html>