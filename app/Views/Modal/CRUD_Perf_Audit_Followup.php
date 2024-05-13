<style>
  #ipinconsistent,
  #ipobservation,
  #ipopportunity {
    display: none;
  }
</style>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header bg-primary">
      <h4 class="modal-title" id="title_modal" name="title_modal">Follow-up</h4>
    </div>
    <div class="modal-body">
      <form class="mb-3" id="form_crud" action="javascript:void(0)" method="post" enctype="multipart/form-data">
        <div>
          <h6>Description</h6>
        </div>
        <div>
          <h6 class="gray-text" name="description_detail" id="description_detail">
            รอใส่คำอธิบายเพิ่มเติม
          </h6>
        </div>
        <div>
          <h6 class="gray-text" name="description" id="description"></h6>
        </div>
        <div class="form-group mt-3">
          <h6>Follow-up Type</h6>
          <select class="form-select form-control" aria-label="Default select example" name="followuptype" id="followuptype">
            <option selected>Select Follow-up Type</option>
            <option value="1">Inconsistent Issues</option>
            <option value="2">Observation Issues</option>
            <option value="3">Opportunity for Improvement Issues</option>
          </select>
        </div>
        <div class="form-group mt-3" id="ipinconsistent">
          <h6>Non-Inconsistent Issue</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="inconsistent" id="inconsistent"></input>
        </div>
        <div class="form-group mt-3" id="ipobservation">
          <h6>Non-Observation Issue</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="observation" id="observation"></input>
        </div>
        <div class="form-group mt-3" id="ipopportunity">
          <h6>Non-Opportunity Issue</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="opportunity" id="opportunity"></input>
        </div>
        <div class="form-group mt-3">
          <h6>Corrective Action</h6>
          <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="correctiveaction" id="correctiveaction"></textarea>
        </div>
        <div class="form-group mt-3">
          <h6>Responsible Person</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="responsibleperson" id="responsibleperson"></input>
        </div>
        <div class="row mt-3">
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
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <h6>Annual</h6>
              <input class="form-control gray-text" type="text" name="annual" id="annual"></input>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <h6>Finish Date</h6>
              <input class="form-control gray-text" type="date" name="end_date" id="end_date"></input>
            </div>
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
<!-- backdrop -->
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

<!-- show input -->
<script>
  $(document).ready(function() {
    $('#followuptype').change(function() {
      var selectedOption = $(this).val();

      $('#ipinconsistent').hide();
      $('#ipobservation').hide();
      $('#ipopportunity').hide();

      if (selectedOption === '1') {
        $('#ipinconsistent').show();
      } else if (selectedOption === '2') {
        $('#ipobservation').show();
      } else if (selectedOption === '3') {
        $('#ipopportunity').show();
      }
    });
  });
</script>