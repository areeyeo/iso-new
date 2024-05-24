<!DOCTYPE html>
<html lang="en">
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

<body>

    <!-- section audit result -->
    <section>
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between">
                        <h4>Audit Result</h4>
                        <button type="button" class="btn btn-outline-primary" style="margin-inline-start: auto;" data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)">
                            <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Audit Result
                        </button>
                    </div>
                    <hr>
                    <div class="accordion">
                        <div class="accordion-item">
                            <div class="accordion-title">Nonconformity</div>
                            <div class="accordion-content">
                                <table id="examplefollow1" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ACTION</th>
                                            <th>AR NO.</th>
                                            <th>NONCONFORMITY ISSUE</th>
                                            <th>LEVEL OF NONCONFORMITY</th>
                                            <th>DETAIL</th>
                                            <th>REQUIREMENTS/CONTROL</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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

    <!-- table data nonconformity -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "TYPE": "Major",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "TYPE": "Minor",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "TYPE": "Major",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",

            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "NONCONFORMITY": "TEXT",
                "TYPE": "Minor",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
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

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.NONCONFORMITY;
            cell4.textContent = row.TYPE;
            cell5.textContent = row.DETAIL;
            cell6.textContent = row.CONTROL;
        });
    </script>

    <!-- table data observation -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OBSERVATION": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
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

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.OBSERVATION;
            cell4.textContent = row.DETAIL;
            cell5.textContent = row.CONTROL;
        });
    </script>

    <!-- table data opportunity -->
    <script>
        var Data = [{
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
            },
            {
                "ARNO": "AR_001 รายงานโปรเจคตัวอย่างที่ 1",
                "OPPORTUNITY": "TEXT",
                "DETAIL": "TEXT",
                "CONTROL": "TEXT",
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

            cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">Copy</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default" onclick="load_modal(12)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
            cell2.textContent = row.ARNO;
            cell3.textContent = row.OPPORTUNITY;
            cell4.textContent = row.DETAIL;
            cell5.textContent = row.CONTROL;
        });
    </script>
</body>

</html>