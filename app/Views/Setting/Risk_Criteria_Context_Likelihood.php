<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h4>
                Likelihood Level
            </h4>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default" onclick="load_modal(1)">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Likelihood
            </button>
        </div>
        <div class="mt-3">
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
</section>
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