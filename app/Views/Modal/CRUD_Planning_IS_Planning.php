<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
    <div class="modal-header bg-primary">
      <h4 class="modal-title" id="title_modal" name="title_modal">Planning</h4>
    </div>
    <div class="modal-body">
      <!-- <div class="progress mb-3" style="display: none;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
      </div> -->
      <form class="mb-3" id="form_crud" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        <h6>Description</h6>
        <h6 class="gray-text" name="description_detail" id="description_detail">
          รอใส่คำอธิบายเพิ่มเติม
        </h6>
        <!-- <h6 class="gray-text" name="description" id="description"></h6> -->
        <div class="row">
          <div class="form-group mt-2 col-12">
            <h6>Objective and Evaluation</h6>
            <select class="form-control" name="objective_evaluation" id="objective_evaluation">
              <option value="option1">Option 1</option>
              <option value="option2">Option 2</option>
              <option value="option3">Option 3</option>
            </select>
            <h6 class="gray-text mt-2" name="evaluation_detail" id="evaluation_detail"></h6>
          </div>
        </div>
        <div class="form-group mt-2">
          <h6>Project Name</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="project_name" id="project_name"></input>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <h6>Start date</h6>
              <input class="form-control gray-text" type="date" name="start_date" id="start_date"></input>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <h6>End date</h6>
              <input class="form-control gray-text" type="date" name="end_date" id="end_date"></input>
            </div>
          </div>
        </div>
        <div class="form-group">
          <h6>Owner</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="owner" id="owner"></input>
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

    <input type="text" id="url_route" name="url_route" hidden>
    <input type="text" id="check_type" name="check_type" hidden>
    <input type="text" id="id_" name="id_" hidden>
    <div class="modal-footer">
      <button type="submit" class="btn btn-success" name="submit" value="Submit">Save</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
    </div>
    </form>
  </div>
</div>
</div>



<script>
  $(document).ready(function() {
    $(".overlay").hide();
  });

  $("#form_crud").on('submit', function(e) {
    e.preventDefault();
    const urlRouteInput = document.getElementById("url_route");
    action_(urlRouteInput.value, 'form_crud');
  });

  document.getElementById('objective_evaluation').addEventListener('change', function() {
    var selectedOption = this.value;
    var descriptionDetail = document.getElementById('evaluation_detail');

    switch (selectedOption) {
      case 'option1':
        descriptionDetail.innerText = 'คำอธิบายสำหรับ Option 1';
        break;
      case 'option2':
        descriptionDetail.innerText = 'คำอธิบายสำหรับ Option 2';
        break;
      case 'option3':
        descriptionDetail.innerText = 'คำอธิบายสำหรับ Option 3';
        break;
      default:
        descriptionDetail.innerText = 'รอใส่คำอธิบายเพิ่มเติม';
        break;
    }
  });
</script>