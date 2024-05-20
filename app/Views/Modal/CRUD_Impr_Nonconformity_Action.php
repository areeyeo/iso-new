<style>
    .custom-file {
        margin-bottom: 10px;
    }

    .file-names-container {
        overflow: hidden;
    }

    .file-name {
        width: 370px;
        border: 1px solid #007bff;
        /* color: #007bff; */
        padding: 8px;
        border-radius: 5px;
        background-color: #fff;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
        white-space: nowrap;
    }

    .file-info {
        display: flex;
        align-items: center;
    }

    .filename {
        max-width: '200px';
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        margin-right: 5px;
        color: #495057;
    }

    .file-icon {
        margin-right: 3px;
        color: #007bff;

    }

    .file-icon-bin {
        margin-left: auto;
        color: #007bff;
    }

    .tooltip-inner {
        background-color: #F8F9FA;
        border: 1px solid #CED4DA;
        color: black;
    }
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
        <div class="modal-header bg-primary">
            <h4 class="modal-title" id="title_modal" name="title_modal">Nonconformity & Action</h4>
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
                    <h6>Improvements List</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="improvementslist" id="improvementslist"></input>
                </div>
                <div class="form-group mt-3">
                    <h6>Responsible Person</h6>
                    <input class="form-control gray-text" type="text" placeholder="Text..." name="responsibleperson" id="responsibleperson"></input>
                </div>
                <div class="form-group">
                    <h6>Attach file</h6>
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