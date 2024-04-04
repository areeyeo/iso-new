<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
        <div class="modal-header bg-primary">
            <h4 class="modal-title" id="title_modal" name="title_modal">Risk Context Operations</h4>
        </div>
        <form class="mb-3" id="form_crud" action="javascript:void(0)" method="post" enctype="multipart/form-data">

            <div class="modal-body">
                <!-- <div class="progress mb-3" style="display: none;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0"
          aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
      </div> -->
                <h6>Description</h6>
                <h6 class="gray-text" name="description_detail" id="description_detail">
                    รอใส่คำอธิบายเพิ่มเติม
                </h6>
                <!-- <h6 class="gray-text" name="description" id="description"></h6> -->
                <div class="row">
                    <div class="form-group mt-3 col-6">
                        <h6>RTP Context No</h6>
                        <input class="form-control gray-text" type="text" placeholder="Text..." name="rtp_context_no" id="rtp_context_no"></input>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <h6>Planning Name</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="name" id="planning_name"></input>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <h6>Start Date</h6>
                            <input class="form-control gray-text" type="date" name="start_date" id="start_date"></input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3">
                            <h6>End Date</h6>
                            <input class="form-control gray-text" type="date" name="end_date" id="end_date"></input>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <h6>Responsible Person</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="owner" id="owner"></input>
                </div>
                <div class="row">
                    <div class="form-group mt-3 col-6">
                        <h6>Status (%)</h6>
                        <div class="input-group">
                            <input class="form-control gray-text" type="number" id="status" name="status" min="0" max="100" step="0.01">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <h6>Evaluation</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="evaluation" id="evaluation"></input>
                </div>
                <div class="form-group mt-4">
                    <h6>Result</h6>
                    <textarea class="form-control" type="text" name="result" id="result" rows="3"></textarea>
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
