<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  .custom-file {
    margin-bottom: 10px;
  }

  .file-names-container {
    /* width: 410px; */
    overflow: hidden;
  }

  .file-name {
    border: 1px solid #007bff;
    color: #007bff;
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

  .file-icon {
    margin-right: 5px;
  }
</style>


  <head>
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- <div class="overlay">
      <i class="fas fa-2x fa-sync fa-spin"></i>
    </div> -->
        <div class="modal-header bg-primary">
          <h4 class="modal-title" id="title_modal" name="title_modal">Awareness</h4>
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
            <div class="form-group mt-2">
              <h6>Course</h6>
              <input class="form-control gray-text" type="text" placeholder="Text..." name="course" id="course"></input>
            </div>
            <div class="form-group mt-2">
              <h6>Detail</h6>
              <textarea class="form-control gray-text" rows="3" placeholder="Text..." name="detail" id="detail"></textarea>
            </div>
            <div class="form-group mt-2">
              <h6>Date</h6>
              <input class="form-control gray-text" type="date" name="date" id="date"></input>
            </div>
            <div class="form-group">
              <h6>Attach Files</h6>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="exampleInputFiles" accept=".docx, .pdf, .xlsx, .doc" data-max-size="20971520" name="files[]" multiple>
                <label class="custom-file-label" for="exampleInputFiles">Choose files</label>
              </div>
              <h6 class="gray-text">.doc, .xls, .pdf (20 MB per file)</h6>
              <div id="fileNamesContainer" class="file-names-container"></div>
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
            descriptionDetail.innerText = 'คำอธิบายสำหรับ Top Management';
            break;
          case 'option2':
            descriptionDetail.innerText = 'คำอธิบายสำหรับ Information Security Management Representative (ISMR)';
            break;
          case 'option3':
            descriptionDetail.innerText = 'คำอธิบายสำหรับ Information Assurance (IA)';
            break;
          case 'option4':
            descriptionDetail.innerText = 'คำอธิบายสำหรับ Document Control';
            break;
          case 'option5':
            descriptionDetail.innerText = 'คำอธิบายสำหรับ Other (Working Team)';
            break;
          default:
            descriptionDetail.innerText = 'รอใส่คำอธิบายเพิ่มเติม';
            break;
        }
      });
    </script>
    <script>
      document.getElementById('exampleInputFiles').addEventListener('change', function() {
        const fileInput = this;
        const fileNamesContainer = document.getElementById('fileNamesContainer');
        const files = fileInput.files;

        // Clear previous content
        fileNamesContainer.innerHTML = '';

        if (files.length > 0) {
          for (let i = 0; i < files.length; i++) {
            const fileNameContainer = document.createElement('div');
            fileNameContainer.classList.add('file-name');

            const fileIcon = document.createElement('span');
            fileIcon.classList.add('fas', 'fa-file', 'file-icon');

            const fileInfo = document.createElement('span');
            fileInfo.classList.add('file-info');
            fileInfo.style.fontSize = '10pt'

            const fileName = document.createElement('span');
            fileName.textContent = files[i].name;
            fileName.style.maxWidth = '240px';
            fileName.style.overflow = 'hidden';
            fileName.style.textOverflow = 'ellipsis';
            fileName.style.whiteSpace = 'nowrap'

            const fileSize = document.createElement('span');
            fileSize.textContent = formatFileSize(files[i].size);

            fileInfo.appendChild(fileIcon);
            fileInfo.appendChild(fileName);
            fileInfo.appendChild(fileSize);

            fileNameContainer.appendChild(fileInfo);
            fileNamesContainer.appendChild(fileNameContainer);
          }
        }
      });

      function formatFileSize(size) {
        const kb = size / 1024;
        if (kb < 1024) {
          return kb.toFixed(2) + ' KB';
        } else {
          const mb = kb / 1024;
          return mb.toFixed(2) + ' MB';
        }
      }
    </script>