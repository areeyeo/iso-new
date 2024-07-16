<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Permission Management</title>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?= base_url('plugins/daterangepicker/daterangepicker.css'); ?>">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?= base_url('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'); ?>">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('plugins/select2/css/select2.min.css'); ?>">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?= base_url('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css'); ?>">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        tr:nth-child(even) {
            background-color: #F5F5F5;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
            color: #333;
            height: 50px;
            /* Set height for each cell */
        }

        th {
            background-color: #F5F6FA;
            text-align: center;
            border-bottom: none;
            height: 50px;
        }

        tbody {
            border-bottom: 10px solid #ccc;
            text-align: center;
        }

        .table thead th {
            border-bottom: none;
        }

        .table-wrapper {
            overflow-x: auto;
            overflow-y: auto;
            max-width: 100%;
        }

        .badge-edit {
            font-size: 100%;
        }

        .blue-text {
            color: #0000FF;
        }

        .gray-text {
            color: #adb5bd;
        }

        .modal-footer {
            justify-content: space-evenly;
        }

        .swal2-popup textarea.swal2-textarea {
            width: 90%;
        }

        label[for="topic"] {
            color: white;
        }

        .fixed-width {
            width: 10%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mt-5">
                                <div class="card-header">
                                    <h3 class="card-title">Permission Management</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <span>Categories</span>
                                                <select class="form-control select2bs4 mt-1" style="width: 100%;" id="topic" name="topic">
                                                    <option value="all">All</option>
                                                    <?php if ($topic_table) : ?>
                                                        <?php foreach ($topic_table as $item) : ?>
                                                            <option value="<?= $item['id_topic'] ?>">
                                                                <?= $item['topic_standard'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <span>Group</span>
                                                <select class="form-control select2bs4 mt-1" style="width: 100%;" id="group" name="group">
                                                    <option value="all">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <span>Role</span>
                                                <select class="form-control select2bs4 mt-1" style="width: 100%;" id="role" name="role">
                                                    <option value="all">All</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <span for="topic">.</span>
                                            <div class="form-group">
                                                <button type="button" class="btn btn-block btn-success mt-1"><i class="fas fa-check"></i>&nbsp;&nbsp;Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-wrapper">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">Username</th>
                                                    <th rowspan="2">Group</th>
                                                    <th rowspan="2">Role</th>
                                                    <th colspan="4">Permissions</th>
                                                </tr>
                                                <tr>
                                                    <th class="fixed-width">Create/Update/Delete</th>
                                                    <th class="fixed-width">Review</th>
                                                    <th class="fixed-width">Approved</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $roles = ['Top Management', 'Assistant', 'Manager', 'Operator', 'Member', 'Document Control'];
                                                $username = 'Areeya Dengjaroen';
                                                $group = 'Admin System';
                                                foreach ($roles as $role) {
                                                    echo "<tr>";
                                                    echo "<td><a href='#'>$username</a></td>";
                                                    echo "<td><a href='#'>$group</a></td>";
                                                    echo "<td><a href='#'>$role</a></td>";
                                                    echo '<td><input type="checkbox"></td>';
                                                    echo '<td><input type="checkbox"></td>';
                                                    echo '<td><input type="checkbox"></td>';
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/jszip/jszip.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
    <script src="<?= base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
    <!-- InputMask -->
    <script src="<?= base_url('plugins/moment/moment.min.js'); ?>"></script>
    <!-- date-range-picker -->
    <script src="<?= base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?= base_url('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- Select2 -->
    <script src="<?= base_url('plugins/select2/js/select2.full.min.js'); ?>"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            changeData();
        });

        function changeData() {
            var selectTopic = document.getElementById("topic").value;
            var topic_table = <?php echo json_encode($topic_table); ?>;
            var create_id_user = topic_table[selectTopic - 1]['create_id_user'];
            var review_id_user = topic_table[selectTopic - 1]['review_id_user'];
            var approved_id_user = topic_table[selectTopic - 1]['approved_id_user'];

            // Split the user IDs into an array
            if (create_id_user) {
                var selectedUserIds1 = create_id_user.split(',');
            }
            if (review_id_user) {
                var selectedUserIds2 = review_id_user.split(',');
            }
            if (approved_id_user) {
                var selectedUserIds3 = approved_id_user.split(',');
            }

            // Set selected options in the dropdown
            $("#Create_Select").val(selectedUserIds1).trigger('change');
            $("#Review_Select").val(selectedUserIds2).trigger('change');
            $("#Approved_Select").val(selectedUserIds3).trigger('change');
        }
    </script>
</body>

</html>