       <style>
           .table-wrapper {
               max-height: 400px;
               overflow-y: auto;
           }

           .table-wrapper::-webkit-scrollbar {
               width: 10px;
           }

           .table-wrapper::-webkit-scrollbar-track {
               background: #f1f1f1;
           }

           .table-wrapper::-webkit-scrollbar-thumb {
               background-color: #ADB5BD;
               border-radius: 10px;
               border: 3px solid #f1f1f1;
           }

           .table-wrapper::-webkit-scrollbar-thumb:hover {
               background-color: #6C757D;
           }

           .table th,
           .table td {
               white-space: nowrap;
           }

           .custom-select {
               background-color: #fff;
               border: 1px solid #007BFF;
               color: #007BFF;
               font-size: 14px;
               padding: .375rem .75rem;
               margin-bottom: 10px;
           }
       </style>
       <!-- Main content -->
       <div class="card">
           <div class="card-header">
               <h2 class="card-title">Details</h2>
               <div class="card-tools">
                   <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                   </button>
                   <button class="badge badge-edit" style="background-color: #FFFFFF;  border: 1px solid #ADB5BD;"><a href="<?= site_url('context/context_analysis/index/') ?>" style="color: #ADB5BD;">Version</a></button>
                   <button class="badge badge-edit" style="background-color: #FFFFFF;  border: 1px solid #ADB5BD;">
                       <a href="<?= site_url('context/ISObjective/timeline_log/') ?>" style="color: #ADB5BD;">History</a>
                   </button>
                   <button class="badge badge-edit" style="background-color: #007BFF; color: #ffffff; border: 1px solid #007BFF" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                   <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                       <div class="dropdown-submenu">
                           <a class="dropdown-item dropdown-toggle" href="#">Status</a>
                           <div class="dropdown-menu">
                               <!-- Second-level dropdown items -->
                               <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Reviewed หรือไม่', 'context/status_update/id_version ?>/1')">Pending Review</a>
                               <div class="dropdown-divider"></div>

                               <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Review หรือไม่', 'context/status_update/id_version ?>/2')">Review</a>
                               <div class="dropdown-divider"></div>

                               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Reject Review</a>

                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Pending Approve หรือไม่', 'context/status_update/id_version ?>/3')">Pending
                                   Approve</a>
                               <div class="dropdown-divider"></div>

                               <a class="dropdown-item" href="#" onclick="confirm_Alert('ต้องการที่จะ Approved หรือไม่', 'context/status_update/id_version ?>/4')">Approved</a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Reject Approved</a>
                           </div>
                       </div>
                       <div class="dropdown-divider"></div>
                       <div class="dropdown-submenu">
                           <a class="dropdown-item dropdown-toggle" href="#">Update</a>
                           <div class="dropdown-menu">
                               <a class="dropdown-item">Update review date</a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item">Revise</a>
                           </div>
                       </div>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" data-toggle="modal" data-target="#modal-default" id="load-modal-button">Create Note</a>
                   </div>

                   <i class="fas fa-cog" data-toggle="modal" data-target="#modal-default" id="load-modal-button" onclick="load_modal(1)"></i>
               </div>
           </div>
           <div class="card-body">
               <div class="container-fluid">
                   <div class="row justify-content-center mb-2">
                       <div class="col-sm-3 ">
                           <h6>Version:
                               <span class="blue-text">
                               </span>
                           </h6>
                       </div>
                       <div class="col-sm-3 ">
                           <h6>Status:
                           </h6>
                       </div>
                       <div class="col-sm-3 ">
                           <h6>Approved Date:
                               <span class="gray-text">
                               </span>
                           </h6>
                       </div>
                   </div>
                   <div class="row justify-content-center mb-2">
                       <div class="col-sm-3 ">
                           <h6>Modified Date:
                               <span class="gray-text">
                               </span>
                           </h6>
                       </div>
                       <div class="col-sm-3 ">
                           <h6>Last Reviewed:
                               <span class="gray-text">
                               </span>
                           </h6>
                       </div>
                       <div class="col-sm-3 ">
                           <h6>Announce Date:
                               <span class="gray-text">
                               </span>
                           </h6>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="card" id="context-ana">
           <div class="card-body">
               <div class="d-flex justify-content-between">
                   <div>
                       <div class="form-group">
                           <ul class="nav nav-pills" id="tabs-tab" role="tablist">
                               <li class="nav-item-tab" style="padding-right: 10px;">
                                   <a class="nav-link active" id="risk-context-tab" data-toggle="pill" href="#risk-context" role="tab" aria-controls="risk-context" aria-selected="true">Risk</a>
                               </li>
                               <li class="nav-item-tab">
                                   <a class="nav-link" id="opportunity-context-tab" data-toggle="pill" href="#opportunity-context" role="tab" aria-controls="opportunity-context" aria-selected="false">Opportunity</a>
                               </li>
                           </ul>
                       </div>
                   </div>
                   <div class=" d-flex">
                       <div id="btn-Awareness" name="btn-Awareness">
                           <button type="button" class="btn btn-outline-primary" onclick="CRUDContextRiskOpp()">
                               <span class="text-nowrap"><i class="fas fa-edit"></i>Create Context</span>
                           </button>
                       </div>
                   </div>
               </div>
               <hr>
               <div class="tab-content">
                   <div class="tab-pane fade show active" id="risk-context" role="tabpanel" aria-labelledby="org-strategy-tab">
                       <div class="d-flex justify-content-start align-items-center" id="content-risk-table">
                           <span>Content:</span>
                           <div class="col-4 d-flex">
                               <select class="custom-select" id="select-content">
                                   <option selected>Select Content</option>
                                   <option value="1">Risks that must be prepared as a risk treatment plan.</option>
                                   <option value="2">Risks that do not have risks exceeding the risk assessment level.</option>
                                   <option value="3">Risks that are being done risk treatment.</option>
                                   <option value="4">Risks that have completed risk treatment</option>
                                   <option value="5">All risk context.</option>
                               </select>
                           </div>

                           <div class="col-2">
                               <select class="custom-select" id="table-display-select">
                                   <option value="full-table">Full Table</option>
                                   <option value="short-table">Short Table</option>
                               </select>
                           </div>
                       </div>
                       <div class="table-wrapper">
                           <table id="risk-context-table-full" class="table table-hover">
                               <thead>
                                   <tr>
                                       <th class="text-center">ACTION</th>
                                       <th>NO.</th>
                                       <th>ISSUE</th>
                                       <th>O</th>
                                       <th>PROD.</th>
                                       <th>R</th>
                                       <th>C</th>
                                       <th>PRIV.</th>
                                       <th>CONSEQUENCE</th>
                                       <th>LIKELIHOOD</th>
                                       <th>RISK LEVEL</th>
                                       <th>RISK ASSESSMENT LEVEL</th>
                                       <th>RISK OPTIONS</th>
                                       <th>RISK TREATMENT PLAN</th>
                                       <th>RISK OWNER</th>
                                       <th>START DATE</th>
                                       <th>END DATE</th>
                                       <th>APPROVE</th>
                                       <th>RTP STATUS</th>
                                       <th>FILE</th>
                                       <th>O</th>
                                       <th>PROD.</th>
                                       <th>R</th>
                                       <th>C</th>
                                       <th>PRIV.</th>
                                       <th>CONSEQUENCE</th>
                                       <th>LIKELIHOOD</th>
                                       <th>RESIDUAL</th>
                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                           <table id="risk-context-table-short" class="table table-hover">
                               <thead>
                                   <tr>
                                       <th class="text-center">ACTION</th>
                                       <th>NO.</th>
                                       <th>ISSUE</th>
                                       <th>CONSEQUENCE</th>
                                       <th>LIKELIHOOD</th>
                                       <th>RISK LEVEL</th>
                                       <th>RISK OPTIONS</th>
                                       <th>RISK TREATMENT PLAN</th>
                                       <th>RISK OWNER</th>
                                       <th>RESIDUAL</th>
                                   </tr>
                               </thead>
                               <tbody>
                               </tbody>
                           </table>
                       </div>

                   </div>
                   <div class="tab-pane table-wrapper fade show" id="opportunity-context" role="tabpanel" aria-labelledby="opportunity-context-tab">
                       <table id="example2" class="table table-hover">
                           <thead>
                               <tr>
                                   <th class="text-center">ACTION</th>
                                   <th>NO.</th>
                                   <th>ISSUES</th>
                                   <th>QUANTITY OF PLANNING</th>
                                   <th>OPPORTUNITY PLANNINGS</th>
                                   <th>RISK OWNNER</th>
                                   <th>START DATE</th>
                                   <th>END DATE</th>
                                   <th>FILE</th>
                               </tr>
                           </thead>
                           <tbody>
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
           <!-- <div class="overlay dark">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
              </div> -->
       </div>
       <div class="modal fade" id="modal-default">
           <div id="modal_contextver">
               <?= $this->include("Modal/Context_Ver"); ?>
           </div>
       </div>
       <script>
           function load_modal(check, data_encode) {
               console.log('Function is called with check:', check, 'and check_type:', check_type);

               modal_contextver = document.getElementById("modal_contextver");
               modal_crud_support_communication = document.getElementById("modal_crud_support_communication");
               $(".modal-body #iss").empty();

               if (check == '1') {
                   //--show modal requirment--//
                   console.log('Showing modal 1');
                   modal_contextver.style.display = "block";
                   modal_crud_support_communication.style.display = "none";
                   $(".modal-body #description").text(element.details);
                   $(".modal-body #status").val(element.status);
                   $(".modal-body #commentTextArea").text(element.comment_reject);
                   $(".modal-body #id_").val(element.id_version);
                   var modified_day = "";
                   var reviewed_day = "";
                   var approved_day = "";
                   var announce_date = "";
                   $(".modal-body #modified").val(element.modified_date);
                   $(".modal-body #reviewed").val(element.review_date);
                   $(".modal-body #approved").val(element.approved_date);
                   $(".modal-body #announce").val(element.announce_date);
                   check_status(element.status);
               }
               //    else if (check == '2') {
               //        //--show modal requirment--//
               //        console.log('Showing modal 2');
               //        modal_contextver.style.display = "none";
               //        modal_crud_support_communication.style.display = "block";
               //    }
           }
       </script>
       <script>
           document.addEventListener("DOMContentLoaded", function() {
               var selectElement = document.getElementById('table-display-select');
               var fullTable = document.getElementById('risk-context-table-full');
               var shortTable = document.getElementById('risk-context-table-short');

               fullTable.style.display = 'block';
               shortTable.style.display = 'none';

               selectElement.addEventListener('change', function(e) {
                   var selectedValue = e.target.value;

                   if (selectedValue === 'full-table') {
                       console.log('check full-table');
                       fullTable.style.display = 'block';
                       shortTable.style.display = 'none';
                   } else if (selectedValue === 'short-table') {
                       console.log('check short-table');
                       fullTable.style.display = 'none';
                       shortTable.style.display = 'block';
                   }
               });
           });
       </script>
       <script>
           document.addEventListener("DOMContentLoaded", function() {
               var contentRiskTable = document.getElementById('content-risk-table');
               var riskContextTab = document.getElementById('risk-context-tab');

               // เริ่มต้นโดยซ่อน content-risk-table
               contentRiskTable.style.display = 'none';

               riskContextTab.addEventListener('click', function() {
                   // เมื่อคลิกที่ tab "Risk" ให้แสดง content-risk-table
                   contentRiskTable.style.display = 'flex';
               });

               // ซ่อน content-risk-table เมื่อคลิกที่ tab อื่นๆ
               var opportunityContextTab = document.getElementById('opportunity-context-tab');
               opportunityContextTab.addEventListener('click', function() {
                   contentRiskTable.style.display = 'none';
               });
           });
       </script>
       <script>
           var Data = [{
                   "ISSUES": "กระบวนการตัดสินใจ (decision-making processes)",
                   "OPERATIONAL": "4",
                   "PRODUCTIVITY": "1",
                   "REPUTATION": "3",
                   "COMPLIANCE": "2",
                   "PRIVACY": "4",
                   "CONSEQUENCE": "4",
                   "LIKELIHOOD": "2",
                   "RISK_LEVEL": "8",
                   "RISK_ASSESSMENT_LEVEL": "2",
                   "RISK_OPTIONS": "การลดความเสี่ยง",
                   "RISK_TREATMENT_PLAN": "จัดทำขั้นตอนการวิเคราะห์ภัยคุกคามทางไซเบอร์ (Cyber Threat Intelligence Procedure)",
                   "RISK_OWNNER": "Areeya Dengjaroen",
                   "START_DATE": "01/01/2024",
                   "END_DATE": "01/01/2024",
                   "APPROVE": "Jones Olivia",
                   "RTP_STATUS": "รอดำเนินการ",
                   "FILE": "risk_treatments.pdf",
                   "OPERATIONAL2": "1",
                   "PRODUCTIVITY2": "2",
                   "REPUTATION2": "1",
                   "COMPLIANCE2": "1",
                   "PRIVACY2": "1",
                   "CONSEQUENCE2": "2",
                   "LIKELIHOOD2": "2",
                   "RESIDUAL": "4",
               },
               {
                   "ISSUES": "นโยบาย (policies)",
                   "OPERATIONAL": "2",
                   "PRODUCTIVITY": "3",
                   "REPUTATION": "1",
                   "COMPLIANCE": "1",
                   "PRIVACY": "1",
                   "CONSEQUENCE": "3",
                   "LIKELIHOOD": "2",
                   "RISK_LEVEL": "6",
                   "RISK_ASSESSMENT_LEVEL": "2",
                   "RISK_OPTIONS": "การลดความเสี่ยง",
                   "RISK_TREATMENT_PLAN": "จัดทำขั้นตอนการวิเคราะห์ภัยคุกคามทางไซเบอร์ (Cyber Threat Intelligence Procedure)",
                   "RISK_OWNNER": "Areeya Dengjaroen",
                   "START_DATE": "01/01/2024",
                   "END_DATE": "01/01/2024",
                   "APPROVE": "Jones Olivia",
                   "RTP_STATUS": "กำลังดำเนินการ",
                   "FILE": "risk_treatments.pdf",
                   "OPERATIONAL2": "1",
                   "PRODUCTIVITY2": "2",
                   "REPUTATION2": "1",
                   "COMPLIANCE2": "1",
                   "PRIVACY2": "1",
                   "CONSEQUENCE2": "2",
                   "LIKELIHOOD2": "2",
                   "RESIDUAL": "4",
               },
               {
                   "ISSUES": "มาตรฐาน (Standards)",
                   "OPERATIONAL": "2",
                   "PRODUCTIVITY": "2",
                   "REPUTATION": "1",
                   "COMPLIANCE": "1",
                   "PRIVACY": "1",
                   "CONSEQUENCE": "3",
                   "LIKELIHOOD": "1",
                   "RISK_LEVEL": "2",
                   "RISK_ASSESSMENT_LEVEL": "2",
               },
           ];

           var riskcontextshort = document.getElementById("risk-context-table-full").getElementsByTagName("tbody")[0];

           Data.forEach(function(row, index) {
               var newRow = riskcontextshort.insertRow();
               var cell1 = newRow.insertCell(0);
               var cell2 = newRow.insertCell(1);
               var cell3 = newRow.insertCell(2);
               var cell4 = newRow.insertCell(3);
               var cell5 = newRow.insertCell(4);
               var cell6 = newRow.insertCell(5);
               var cell7 = newRow.insertCell(6);
               var cell8 = newRow.insertCell(7);
               var cell9 = newRow.insertCell(8);
               var cell10 = newRow.insertCell(9);
               var cell11 = newRow.insertCell(10);
               var cell12 = newRow.insertCell(11);
               var cell13 = newRow.insertCell(12);
               var cell14 = newRow.insertCell(13);
               var cell15 = newRow.insertCell(14);
               var cell16 = newRow.insertCell(15);
               var cell17 = newRow.insertCell(16);
               var cell18 = newRow.insertCell(17);
               var cell19 = newRow.insertCell(18);
               var cell20 = newRow.insertCell(19);
               var cell21 = newRow.insertCell(20);
               var cell22 = newRow.insertCell(21);
               var cell23 = newRow.insertCell(22);
               var cell24 = newRow.insertCell(23);
               var cell25 = newRow.insertCell(24);
               var cell26 = newRow.insertCell(25);
               var cell27 = newRow.insertCell(26);
               var cell28 = newRow.insertCell(27);

               cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">View</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
               cell2.textContent = index + 1;
               cell3.textContent = row.ISSUES;
               cell4.textContent = row.OPERATIONAL;
               cell5.textContent = row.PRODUCTIVITY;
               cell6.textContent = row.REPUTATION;
               cell7.textContent = row.COMPLIANCE;
               cell8.textContent = row.PRIVACY;
               cell9.textContent = row.CONSEQUENCE;
               cell10.textContent = row.LIKELIHOOD;
               cell11.textContent = row.RISK_LEVEL;
               cell12.textContent = row.RISK_ASSESSMENT_LEVEL;
               cell13.textContent = row.RISK_OPTIONS;
               cell14.textContent = row.RISK_TREATMENT_PLAN;
               cell15.textContent = row.RISK_OWNNER;
               cell16.textContent = row.START_DATE;
               cell17.textContent = row.END_DATE;
               cell18.textContent = row.APPROVE;
               cell19.innerHTML = row.RTP_STATUS === 'รอดำเนินการ' ? '<span class="badge badge-danger">รอดำเนินการ</span>' : row.RTP_STATUS === 'กำลังดำเนินการ' ? '<span class="badge badge-warning">กำลังดำเนินการ</span>' : row.RTP_STATUS === 'กำลังดำเนินการ' ? '<span class="badge badge-warning">กำลังดำเนินการ</span>' : '';
               cell20.textContent = row.FILE;
               cell21.textContent = row.OPERATIONAL2;
               cell22.textContent = row.PRODUCTIVITY2;
               cell23.textContent = row.REPUTATION2;
               cell24.textContent = row.COMPLIANCE2;
               cell25.textContent = row.PRIVACY2;
               cell26.textContent = row.CONSEQUENCE2;
               cell27.textContent = row.LIKELIHOOD2;
               cell28.textContent = row.RESIDUAL;

           });
       </script>
       <script>
           var Data = [{
                   "ISSUES": "กระบวนการตัดสินใจ (decision-making processes)",
                   "CONSEQUENCE": "4",
                   "LIKELIHOOD": "2",
                   "RISK_LEVEL": "8",
                   "RISK_OPTIONS": "การลดความเสี่ยง",
                   "RISK_TREATMENT_PLAN": "จัดทำขั้นตอนการวิเคราะห์ภัยคุกคามทางไซเบอร์ (Cyber Threat Intelligence Procedure)",
                   "RISK_OWNNER": "Areeya Dengjaroen",
                   "RESIDUAL": "4",
               },
               {
                   "ISSUES": "นโยบาย (policies)",
                   "CONSEQUENCE": "3",
                   "LIKELIHOOD": "2",
                   "RISK_LEVEL": "6",
                   "RISK_OPTIONS": "การลดความเสี่ยง",
                   "RISK_TREATMENT_PLAN": "จัดทำขั้นตอนการวิเคราะห์ภัยคุกคามทางไซเบอร์ (Cyber Threat Intelligence Procedure)",
                   "RISK_OWNNER": "Areeya Dengjaroen",
                   "RESIDUAL": "4",
               },
               {
                   "ISSUES": "มาตรฐาน (Standards)",
                   "CONSEQUENCE": "1",
                   "LIKELIHOOD": "2",
                   "RISK_LEVEL": "2",
               },
           ];

           var riskcontextshort = document.getElementById("risk-context-table-short").getElementsByTagName("tbody")[0];

           Data.forEach(function(row, index) {
               var newRow = riskcontextshort.insertRow();
               var cell1 = newRow.insertCell(0);
               var cell2 = newRow.insertCell(1);
               var cell3 = newRow.insertCell(2);
               var cell4 = newRow.insertCell(3);
               var cell5 = newRow.insertCell(4);
               var cell6 = newRow.insertCell(5);
               var cell7 = newRow.insertCell(6);
               var cell8 = newRow.insertCell(7);
               var cell9 = newRow.insertCell(8);
               var cell10 = newRow.insertCell(9);

               cell1.innerHTML = `<div class="dropdown">
    <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButton${index}" data-toggle="dropdown" aria-expanded="false"></i>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton${index}">
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
      <li><a class="dropdown-item" href="#">View</a></li>
      <li><a class="dropdown-item" href="#">Delete</a></li>
      <li><hr class="dropdown-divider"></li>
      <li data-toggle="modal" data-target="#modal-default " onclick="load_modal(2)"><a class="dropdown-item" href="#">Create</a></li>
    </ul>
  </div>`;
               cell2.textContent = index + 1;
               cell3.textContent = row.ISSUES;
               cell4.textContent = row.CONSEQUENCE;
               cell5.textContent = row.LIKELIHOOD;
               cell6.textContent = row.RISK_LEVEL;
               cell7.textContent = row.RISK_OPTIONS;
               cell8.textContent = row.RISK_TREATMENT_PLAN;
               cell9.textContent = row.RISK_OWNNER;
               cell10.textContent = row.RESIDUAL;

           });
       </script>
       <script>
           function CRUDContextRiskOpp() {
               window.location.href = "crud_context_risk_opp";
           }
       </script>