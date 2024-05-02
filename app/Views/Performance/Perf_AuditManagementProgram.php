<!DOCTYPE html>
<html lang="en">
<style>
    .accordion {
        margin: 0 auto;
    }

    .accordion-item {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        margin-bottom: 0.5rem;
        overflow: hidden;
    }

    .accordion-header {
        background-color: #f8f9fa;
        padding: 0.75rem 1rem;
        cursor: pointer;
        border-bottom: 1px solid #dee2e6;
    }

    .accordion-header:hover {
        background-color: #e9ecef;
    }

    .accordion-content {
        padding: 1rem;
        background-color: #fff;
        display: none;
        max-height: 0;
        overflow: hidden;
    }

    .accordion-item.active .accordion-content {
        display: block;
        max-height: 500px;
    }

    .accordion-header::after {
        content: "\02795";
        font-size: 0.75rem;
        float: right;
        margin-left: 5px;
    }

    .accordion-item.active .accordion-header::after {
        content: "\2796";
    }
</style>

<body>
    <div class="card">
        <div class="card-body">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <h4>Audit Management Program</h4>
                    <button type="button" class="btn btn-dark" onclick="load_modal(9)" data-toggle="modal" data-target="#modal-default"><i class="fas fa-book"></i>&nbsp;&nbsp;Audit testtt</button>
                    <button type="button" class="btn btn-dark" onclick="OpenAuditManagement()"><i class="fas fa-book"></i>&nbsp;&nbsp;Audit Program Main</button>
                </div>
                <hr>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header d-flex" id="headingOne" style="background-color: #E2F0FF;">
                            <h5 class="mb-0">
                                <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" onclick="toggleAccordion(this.querySelector('i'))">
                                    <i class="fas fa-chevron-right"></i>&nbsp;&nbsp;Audit Program
                                </button>
                            </h5>
                            <button type="button" class="btn btn-outline-primary" style="margin-inline-start: auto;" data-toggle="modal" data-target="#modal-default" onclick="load_modal(3)">
                                <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Program
                            </button>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
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
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo" style="background-color: #E2F0FF;">
                            <h5 class="mb-0">
                                <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onclick="toggleAccordion(this.querySelector('i'))">
                                    <i class="fas fa-chevron-right"></i>&nbsp;&nbsp;Audit Plan
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
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
                    <div class="card">
                        <div class="card-header d-flex" id="headingThree" style="background-color: #E2F0FF;">
                            <h5 class="mb-0">
                                <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree" onclick="toggleAccordion(this.querySelector('i'))">
                                    <i class="fas fa-chevron-right"></i>&nbsp;&nbsp;Audit Checklist
                                </button>
                            </h5>
                            <button type="button" class="btn btn-outline-primary" style=" margin-inline-start: auto;"><i class="fas fa-edit"></i>&nbsp;&nbsp;Create Checklist</button>
                        </div>
                        <div id="collapsethree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <table id="example3" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ACTION</th>
                                            <th>NO.</th>
                                            <th>NAME</th>
                                            <th>FILE</th>
                                            <th>UPLOAD DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex" id="headingFour" style="background-color: #E2F0FF;">
                            <h5 class="mb-0">
                                <button class="btn btn-link btn-lg collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" onclick="toggleAccordion(this.querySelector('i'))">
                                    <i class="fas fa-chevron-right"></i>&nbsp;&nbsp;Audit Report
                                </button>
                            </h5>
                            <button type="button" class="btn btn-outline-primary" style=" margin-inline-start: auto;"><i class="fas fa-edit"></i>&nbsp;&nbsp;Create Report</button>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                            <div class="card-body">
                                <table id="example4" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ACTION</th>
                                            <th>NO.</th>
                                            <th>NAME</th>
                                            <th>FILE</th>
                                            <th>UPLOAD DATE</th>
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
    <script>
        function collapseAll() {
            var acc = document.querySelectorAll('.collapse');
            acc.forEach(function(item) {
                item.classList.remove('show');
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            collapseAll();
        });
    </script>
    <script>
        function toggleAccordion(iconElement) {
            if (iconElement.classList.contains('fa-chevron-right')) {
                iconElement.classList.remove('fa-chevron-right');
                iconElement.classList.add('fa-chevron-down');
            } else {
                iconElement.classList.remove('fa-chevron-down');
                iconElement.classList.add('fa-chevron-right');
            }
        }
    </script>
    <script>
        function OpenAuditManagement() {
            window.location.href = "internal_audit";
        }
    </script>
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
      <li data-toggle="modal" data-target="#modal-default" onclick=""><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.APNO;
            cell4.textContent = row.PROGRAMNAME;
            cell5.textContent = row.STARTDATE;
            cell6.textContent = row.ENDDATE;
        });
    </script>
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
        var Data = [{
                "NAME": "-",
                "FILE": "-",
                "UPLOADDATE": "01/01/2024",
            },
            {
                "NAME": "-",
                "FILE": "-",
                "UPLOADDATE": "01/01/2024",
            },
        ];

        var example3TableBody = document.getElementById("example3").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = example3TableBody.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick=""><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick=""><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.NAME;
            cell4.textContent = row.FILE;
            cell5.textContent = row.UPLOADDATE;
        });
    </script>
    <script>
        var Data = [{
                "NAME": "-",
                "FILE": "-",
                "UPLOADDATE": "01/01/2024",
            },
            {
                "NAME": "-",
                "FILE": "-",
                "UPLOADDATE": "01/01/2024",
            },
        ];

        var example4TableBody = document.getElementById("example4").getElementsByTagName("tbody")[0];

        Data.forEach(function(row, index) {
            var newRow = example4TableBody.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick=""><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick=""><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = index + 1;
            cell3.textContent = row.NAME;
            cell4.textContent = row.FILE;
            cell5.textContent = row.UPLOADDATE;
        });
    </script>
</body>

</html>