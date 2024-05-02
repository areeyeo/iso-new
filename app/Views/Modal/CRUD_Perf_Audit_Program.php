<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
    <div class="modal-header bg-primary">
      <h4 class="modal-title" id="title_modal" name="title_modal">Audit Program</h4>
    </div>
    <div class="modal-body">
      <!-- <div class="progress mb-3" style="display: none;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
      </div> -->
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
          <h6>Program Name</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="programname" id="programname"></input>
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
</script>