<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
    <div class="modal-header bg-primary">
      <h4 class="modal-title" id="title_modal" name="title_modal">Audit Plan</h4>
    </div>
    <div class="modal-body">
      <!-- <div class="progress mb-3" style="display: none;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
      </div> -->
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
        <div class="form-group mt-3">
          <h6>Audit Scope</h6>
          <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="auditscope" id="auditscope"></textarea>
        </div>
        <div class="form-group mt-3">
          <h6>Audit Objective</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="auditobjectives" id="auditobjectives"></input>
        </div>
        <div class="form-group mt-3">
          <h6>Criteria</h6>
          <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="criteria" id="criteria"></textarea>
        </div>
        <div class="form-group mt-3">
          <h6>Audit Lead</h6>
          <input class="form-control gray-text" type="text" placeholder="Text..." name="auditlead" id="auditlead"></input>
        </div>
        <div class="form-group mt-3">
          <h6>Audit Team</h6>
          <textarea onInput="handleInput(event)" class="form-control gray-text" rows="3" placeholder="Text..." name="auditteam" id="auditteam"></textarea>
        </div>
        <div class="form-group">
          <h6>Attach File</h6>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="exampleInputFile" accept=".docx, .pdf, .xlsx , .doc" data-max-size="20971520" name="file">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <h6 class="gray-text">.doc .xls .pdf (20 MB per file)</h6>
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