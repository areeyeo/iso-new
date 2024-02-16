<section class="content-header">
  <div class="container-fluid">
    <div class="d-flex justify-content-between">
      <h4>
        Likelihood Level
      </h4>
      <!-- <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-likelihood" onclick="load_modal(1)">
        <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Likelihood
      </button> -->

    </div>
    <div class="mt-3">
      <table id="likelihood" class="table table-hover">
        <thead>
          <tr>
            <th style="width: 50px;">ACTION</th>
            <th style="width: 100px;">LIKELIHOOD NAME</th>
            <th style="width: 50px;">LIKELIHOOD LEVEL</th>
            <th style="width: 100px;">DESCRIPTION</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-likelihood">
  <div id="modal_crud_criteria_likelihood">
    <?= $this->include("Modal/CRUD_Criteria_Context_Likelihood"); ?>
  </div>
</div>
<script>
  function load_modal(check, check_type, data_encode) {
    console.log('Function is called with check:', check, 'and check_type:', check_type);

    modal_likelihood = document.getElementById("modal-likelihood");
    $(".modal-body #iss").empty();

    if (check == '1') {
      //--show modal requirment--//
      console.log('Showing modal 1');
      modal_likelihood.style.display = "block";
    }
  }
</script>
<script>
  var Data = [{
      "LIKELIHOODNAME": "น้อยมาก",
      "LIKELIHOODLEVEL": 1,
      "DESCRIPTION": "แทบจะไม่เกิดหรืออย่างมากปีละ 1 ครั้ง",
    },
    {
      "LIKELIHOODNAME": "น้อย",
      "LIKELIHOODLEVEL": 2,
      "DESCRIPTION": "โอกาสเกิดน้อยหรืออย่างมากไม่เกินปีละ 2 ครั้ง",
    },
    {
      "LIKELIHOODNAME": "ปานกลาง",
      "LIKELIHOODLEVEL": 3,
      "DESCRIPTION": "ปานกลาง ปีละ 3-5 ครั้ง",
    },
    {
      "LIKELIHOODNAME": "สูง",
      "LIKELIHOODLEVEL": 4,
      "DESCRIPTION": "ค่อนข้างบ่อย ปีละ 6-10 ครั้ง",
    },
    {
      "LIKELIHOODNAME": "สูงมาก",
      "LIKELIHOODLEVEL": 5,
      "DESCRIPTION": "บ่อยครั้ง ปีละ 11-15 ครั้ง",
    },
  ];

  var likelihoodTableBody = document.getElementById("likelihood").getElementsByTagName("tbody")[0];

  Data.forEach(function(row, index) {
    var newRow = likelihoodTableBody.insertRow();
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);
    var cell4 = newRow.insertCell(3);

    cell1.innerHTML = `<div class="dropdown">
                          <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
                                  <li data-toggle="modal" data-target="#modal-likelihood" onclick="load_modal(1)"><a class="dropdown-item" href="#" >Edit</a></li>
                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                              </ul>
                      </div>`;
    cell2.textContent = row.LIKELIHOODNAME;
    cell3.textContent = row.LIKELIHOODLEVEL;
    cell4.textContent = row.DESCRIPTION;
  });
</script>