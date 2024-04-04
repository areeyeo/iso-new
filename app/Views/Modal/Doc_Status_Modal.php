<?php
if (isset($_GET['check'])) {
    $check = $_GET['check'];
} else {
    $check = 3;
}
?>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <!-- <div class="overlay">
            <i class="fas fa-2x fa-sync fa-spin"></i>
        </div> -->
        <div class="modal-header" id="dynamicModalHeader">
            <h4 class="modal-title"></h4>
        </div>

        <div class="modal-body">
            <form class="mb-3" id="form_request_modification" action="javascript:void(0)" method="post" enctype="multipart/form-data">
                <div>
                    <h6>Description</h6>
                </div>
                <div>
                    <h6 class="gray-text" name="description_request_modify" id="description_request_modify">คำอธิบาย</h6>
                </div>
                <div class="form-group">
                    <h6>Note</h6>
                    <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="text_request_modify" id="text_request_modify"></textarea>
                </div>
                <input type="text" id="status_request_modify" name="status_request_modify" hidden>
                <div class="input-group date" id="reservationdat_modified_request_modify" data-target-input="nearest" hidden>
                    <input type="text" class="form-control datetimepicker-input gray-text" data-target="#reservationdat_modified" name="modified_date_request_modify" id="modified_date_request_modify" />
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="submit" value="Submit">CONFIRM</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<script>
    var xhttp = new XMLHttpRequest();
    var modalHeaderData = [{
            "title": "Rejected",
            "color": "bg-danger"
        },
        {
            "title": "Request Modification",
            "color": "bg-warning"
        },
        {
            "title": "Test Title",
            "color": "bg-dark"
        }
    ];

    var check = <?php echo $check; ?>;
    var selectedHeader;

    if (check === 1) {
        selectedHeader = modalHeaderData[0];
    } else if (check === 2) {
        selectedHeader = modalHeaderData[1];
    } else if (check === 3) {
        selectedHeader = modalHeaderData[2];
    }

    var modalTitle = selectedHeader.title;
    var modalColor = selectedHeader.color;

    document.querySelector('#dynamicModalHeader .modal-title').textContent = modalTitle;
    document.querySelector('#dynamicModalHeader').classList.add(modalColor);
</script>