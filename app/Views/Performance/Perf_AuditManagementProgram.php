<!DOCTYPE html>
<html lang="en">
<body>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <h4>Audit Management Program</h4>
                    <button type="button" class="btn btn-dark" onclick="OpenAuditManagement()"><i class="fas fa-book"></i>&nbsp;&nbsp;Audit Program Main</button>
                </div>
                <hr>
                <div>
                    <ul class="nav nav-pills" id="tabs-tab" role="tablist">
                        <li class="nav-item-tab" style="padding-right: 10px;">
                            <a class="nav-link active" id="Create-Update-tab" data-toggle="pill" href="#Create-Update" role="tab" aria-controls="Create-Update" aria-selected="true">
                                Audit Program
                            </a>
                        </li>
                        <li class="nav-item-tab">
                            <a class="nav-link" id="Management-Doc-tab" data-toggle="pill" href="#Management-Doc" role="tab" aria-controls="Management-Doc" aria-selected="false" onclick="getTableData2();">
                                Audit Plan
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="Create-Update" role="tabpanel" aria-labelledby="org-strategy-tab">
                        <div class="table-wrapper">
                            <table id="example1" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ACTION</th>
                                        <th>NO.</th>
                                        <th>AP NO.</th>
                                        <th>PROGRAM NAME</th>
                                        <th>START DATE</th>
                                        <th>END DATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="Management-Doc" role="tabpanel" aria-labelledby="Management-Doc-tab">
                        <div class="table-wrapper">
                            <table id="example2" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ACTION</th>
                                        <th>AP NO.</th>
                                        <th>PROGRAM NAME</th>
                                        <th>SCOPE</th>
                                        <th>OBJECTIVE</th>
                                        <th>CRITERIA</th>
                                        <th>AUDIT LEAD</th>
                                        <th>AUDIT TEAM</th>
                                        <th>FILE</th>
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

    <!-- change page -->
    <script>
        function OpenAuditManagement() {
            window.location.href = "internal_audit";
        }
    </script>

    <!-- table audit program -->
    <script>
        var Data = [{
                "APNO": "AP_001",
                "PROGRAMNAME": "-",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
            },
            {
                "APNO": "AP_002",
                "PROGRAMNAME": "-",
                "STARTDATE": "01/01/2024",
                "ENDDATE": "01/01/2024",
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


            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(3)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(3)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.APNO;
            cell4.textContent = row.PROGRAMNAME;
            cell5.textContent = row.STARTDATE;
            cell6.textContent = row.ENDDATE;
        });
    </script>

    <!-- table audit plan -->
    <script>
        var Data = [{
                "APNO": "AP_001",
                "PROGRAMNAME": "-",
                "SCOPE": "-",
                "OBJECTIVE": "-",
                "CRITERIA": "-",
                "AUDITLEAD": "-",
                "AUDITTEAM": ["name1", "name2", "name3"],
                "FILE": "-",
            },
            {
                "APNO": "AP_002",
                "PROGRAMNAME": "-",
                "SCOPE": "-",
                "OBJECTIVE": "-",
                "CRITERIA": "-",
                "AUDITLEAD": "-",
                "AUDITTEAM": ["name1", "name2"],
                "FILE": "-",
            },
        ];

        var example2TableBody = document.getElementById("example2").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
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

            cell1.innerHTML = `<span style="color:#007BFF; cursor:pointer;" onclick="load_modal(9)" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-edit"></i></span>`;
            cell2.textContent = row.APNO;
            cell3.textContent = row.PROGRAMNAME;
            cell4.textContent = row.SCOPE;
            cell5.textContent = row.OBJECTIVE;
            cell6.textContent = row.CRITERIA;
            cell7.textContent = row.AUDITLEAD;
            displayArrayInCell(cell8, row.AUDITTEAM);
            cell9.textContent = row.FILE;
        });


        function displayArrayInCell(cell, dataArray) {
            if (Array.isArray(dataArray) && dataArray.length > 1) {
                cell.innerHTML = dataArray.join('<br>');
            } else {
                cell.textContent = Array.isArray(dataArray) ? dataArray[0] : dataArray;
            }
        }
    </script>

    <script>
        $('#Create-Update-tab').on('click', function() {
            console.log('Create-Update-tab');
            $('#btn-Document').show();
        });
        $('#Management-Doc-tab').on('click', function() {
            console.log('Management-Doc-tab');
            $('#btn-Document').hide();
        })
    </script>
</body>

</html>