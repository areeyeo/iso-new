<section class="content-header">
  <div class="container-fluid">
    <div class="d-flex justify-content-between">
      <h4>
        Risk Option
      </h4>
      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-risk-option" onclick="load_modal(1)">
        <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Risk Option
      </button>
    </div>
    <div class="mt-3">
      <table id="example3" class="table table-hover">
        <thead>
          <tr>
            <th>ACTION</th>
            <th>OPTION</th>
            <th>DESCRIPTION</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
<div class="modal fade" id="modal-risk-option">
  <div id="modal_crud_criteria_risk_option">
    <?= $this->include("Modal/CRUD_Criteria_Context_Risk_Option"); ?>
  </div>
</div>
<script>
  function load_modal(check, check_type, data_encode) {
    console.log('Function is called with check:', check, 'and check_type:', check_type);

    modal_crud_criteria_risk_option = document.getElementById("modal_crud_criteria_risk_option");
    $(".modal-body #iss").empty();

    if (check == '1') {
      //--show modal requirment--//
      console.log('Showing modal 1');;
      modal_crud_criteria_risk_option.style.display = "block";
    }
  }
</script>
<script>
  var DataSummary = [{
      "OPTION": "Risk Treatment",
      "DESCRIPTION": "การรักษาความเสี่ยง",
    },
    {
      "OPTION": "Risk Modification",
      "DESCRIPTION": "การปรับเปลี่ยนความเสี่ยง",
    },
    {
      "OPTION": "Risk Avoidance",
      "DESCRIPTION": "การหลีกเลี่ยงความเสี่ยง",
    },
    {
      "OPTION": "Risk Sharing",
      "DESCRIPTION": "การแบ่งปันความเสี่ยง",
    },
    {
      "OPTION": "Risk Acceptance",
      "DESCRIPTION": "การยอมรับความเสี่ยง",
    },
  ];

  var example3TableBody = document.getElementById("example3").getElementsByTagName("tbody")[0];

  DataSummary.forEach(function(row, index) {
    var newRow = example3TableBody.insertRow();
    var cell1 = newRow.insertCell(0);
    var cell2 = newRow.insertCell(1);
    var cell3 = newRow.insertCell(2);

    cell1.innerHTML = `<div class="dropdown">
                          <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
                                  <li data-toggle="modal" data-target="#modal-risk-option" onclick="load_modal(1)"><a class="dropdown-item" href="#" >Edit</a></li>
                                  <li><a class="dropdown-item" href="#">Delete</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li data-toggle="modal" data-target="#modal-risk-option" onclick="load_modal(1)"><a class="dropdown-item">Create</a></li>
                              </ul>
                      </div>`;
    cell2.textContent = row.OPTION;
    cell3.textContent = row.DESCRIPTION;
  });
</script>