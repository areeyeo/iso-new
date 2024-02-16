<script>
    <?php
    $data = [
        [
            'id' => 'opportunity',
            'title' => 'Opportunity',
            'active' => true,
            'data' => [
                ['action' => 'Action 1', 'name' => 'Name 1', 'impact_level' => 1, 'content' => 'Content 1'],
                ['action' => 'Action 2', 'name' => 'Name 2', 'impact_level' => 2, 'content' => 'Content 2'],
                ['action' => 'Action 3', 'name' => 'Name 3', 'impact_level' => 3, 'content' => 'Content 3'],
                ['action' => 'Action 4', 'name' => 'Name 4', 'impact_level' => 4, 'content' => 'Content 4'],
                ['action' => 'Action 5', 'name' => 'Name 5', 'impact_level' => 5, 'content' => 'Content 5'],
            ]
        ],
        [
            'id' => 'productivity',
            'title' => 'Productivity',
            'active' => false,
            'data' => [
                ['action' => 'Action 1', 'name' => 'Name 1', 'impact_level' => 1, 'content' => 'Content 1'],
                ['action' => 'Action 2', 'name' => 'Name 2', 'impact_level' => 2, 'content' => 'Content 2'],
                ['action' => 'Action 3', 'name' => 'Name 3', 'impact_level' => 3, 'content' => 'Content 3'],
                ['action' => 'Action 4', 'name' => 'Name 4', 'impact_level' => 4, 'content' => 'Content 4'],
                ['action' => 'Action 5', 'name' => 'Name 5', 'impact_level' => 5, 'content' => 'Content 5'],
            ]
        ],
        [
            'id' => 'reputation',
            'title' => 'Reputation',
            'active' => false,
            'data' => [
                ['action' => 'Action 1', 'name' => 'Name 1', 'impact_level' => 1, 'content' => 'Content 1'],
                ['action' => 'Action 2', 'name' => 'Name 2', 'impact_level' => 2, 'content' => 'Content 2'],
                ['action' => 'Action 3', 'name' => 'Name 3', 'impact_level' => 3, 'content' => 'Content 3'],
                ['action' => 'Action 4', 'name' => 'Name 4', 'impact_level' => 4, 'content' => 'Content 4'],
                ['action' => 'Action 5', 'name' => 'Name 5', 'impact_level' => 5, 'content' => 'Content 5'],
            ]
        ],
        [
            'id' => 'compliance',
            'title' => 'Compliance',
            'active' => false,
            'data' => [
                ['action' => 'Action 1', 'name' => 'Name 1', 'impact_level' => 1, 'content' => 'Content 1'],
                ['action' => 'Action 2', 'name' => 'Name 2', 'impact_level' => 2, 'content' => 'Content 2'],
                ['action' => 'Action 3', 'name' => 'Name 3', 'impact_level' => 3, 'content' => 'Content 3'],
                ['action' => 'Action 4', 'name' => 'Name 4', 'impact_level' => 4, 'content' => 'Content 4'],
                ['action' => 'Action 5', 'name' => 'Name 5', 'impact_level' => 5, 'content' => 'Content 5'],
            ]
        ],
        [
            'id' => 'privacy',
            'title' => 'Privacy',
            'active' => false,
            'data' => [
                ['action' => 'Action 1', 'name' => 'Name 1', 'impact_level' => 1, 'content' => 'Content 1'],
                ['action' => 'Action 2', 'name' => 'Name 2', 'impact_level' => 2, 'content' => 'Content 2'],
                ['action' => 'Action 3', 'name' => 'Name 3', 'impact_level' => 3, 'content' => 'Content 3'],
                ['action' => 'Action 4', 'name' => 'Name 4', 'impact_level' => 4, 'content' => 'Content 4'],
                ['action' => 'Action 5', 'name' => 'Name 5', 'impact_level' => 5, 'content' => 'Content 5'],
            ]
        ]
    ];

    function generateTabsAndTables($data)
    {
        $html = '';

        $html .= '<nav>';
        $html .= '<div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">';
        foreach ($data as $item) {
            $html .= '<button class="nav-link ' . ($item['active'] ? 'active' : '') . '" id="nav-' . $item['id'] . '-tab" data-toggle="tab" data-target="#nav-' . $item['id'] . '" type="button" role="tab" aria-controls="nav-' . $item['id'] . '" aria-selected="' . ($item['active'] ? 'true' : 'false') . '">' . $item['title'] . '</button>';
        }
        $html .= '</div>';
        $html .= '</nav>';

        $html .= '<div class="tab-content mt-3" id="nav-tabContent">';
        foreach ($data as $item) {
            $html .= '<div class="tab-pane fade ' . ($item['active'] ? 'show active' : '') . '" id="nav-' . $item['id'] . '" role="tabpanel" aria-labelledby="nav-' . $item['id'] . '-tab" style="padding: 10px;">';
            $html .= '<span>' . $item['title'] . '</span>';
            $html .= '<table id="consequence" class="table table-hover mt-3">';
            $html .= '<thead>';
            $html .= '<tr>';
            $html .= '<th class="text-center">ACTION</th>';
            $html .= '<th>NAME</th>';
            $html .= '<th>IMPACT LEVEL</th>';
            $html .= '<th>CONTENT</th>';
            $html .= '</tr>';
            $html .= '</thead>';
            $html .= '<tbody>';
            foreach ($item['data'] as $row) {
                $html .= '<tr>';
                $html .= '<td>' . $row['action'] . '</td>';
                $html .= '<td>' . $row['name'] . '</td>';
                $html .= '<td>' . $row['impact_level'] . '</td>';
                $html .= '<td>' . $row['content'] . '</td>';
                $html .= '</tr>';
            }
            $html .= '</tbody>';
            $html .= '</table>';
            $html .= '</div>';
        }
        $html .= '</div>';

        return $html;
    }
    echo generateTabsAndTables($data);
    ?>
</script>
<script>
    function load_modal(check, check_type, data_encode) {
        console.log('Function is called with check:', check, 'and check_type:', check_type);

        modal_crud_criteria_consequence = document.getElementById("modal_crud_criteria_consequence");
        modal_crud_criteria_consequence_item = document.getElementById("modal_crud_criteria_consequence_item");
        $(".modal-body #iss").empty();

        if (check == '1') {
            //--show modal requirment--//
            console.log('Showing modal 1');;
            modal_crud_criteria_consequence.style.display = "block";
            modal_crud_criteria_consequence_item.style.display = "none"
        } else if (check == '2') {
            console.log('Showing modal 2');;
            modal_crud_criteria_consequence.style.display = "none";
            modal_crud_criteria_consequence_item.style.display = "block"
        }
    }
</script>
<div class="modal fade" id="modal-consequence">
    <div id="modal_crud_criteria_consequence">
        <?= $this->include("Modal/CRUD_Criteria_Context_Consequence"); ?>
    </div>
    <div id="modal_crud_criteria_consequence_item">
        <?= $this->include("Modal/CRUD_Criteria_Context_Consequence_Item"); ?>
    </div>
</div>
<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h4>
                Consequence Level
            </h4>
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-consequence" onclick="load_modal(1)">
            <i class="fas fa-edit"></i>&nbsp;&nbsp;Create Consequence
            </button>
        </div>
        <nav>
            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                <?php foreach ($data as $item) { ?>
                    <button class="nav-link <?php echo $item['active'] ? 'active' : ''; ?>" id="nav-<?php echo $item['id']; ?>-tab" data-toggle="tab" data-target="#nav-<?php echo $item['id']; ?>" type="button" role="tab" aria-controls="nav-<?php echo $item['id']; ?>" aria-selected="<?php echo $item['active'] ? 'true' : 'false'; ?>"><?php echo $item['title']; ?></button>
                <?php } ?>

            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <?php foreach ($data as $item) { ?>
                <div class="tab-pane fade <?php echo $item['active'] ? 'show active' : ''; ?>" id="nav-<?php echo $item['id']; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $item['id']; ?>-tab" style="padding: 10px;">
                    <div class="d-flex justify-content-between">
                        <span style="font-size: 15pt;"><?php echo $item['title']; ?></span>
                        <button type="button" class="btn btn-outline-danger">
                            <i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Delete this Consequence
                        </button>
                    </div>
                    <table id="consequence" class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th class="text-center">ACTION</th>
                                <th>NAME</th>
                                <th>IMPACT LEVEL</th>
                                <th>CONTENT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($item['data'] as $index => $row) { ?>
                                <tr>
                                    <td>
                                        <div class="dropdown">
                                            <i class="fas fa-ellipsis-v pointer text-primary" id="dropdownMenuButtonPlanning<?php echo $index; ?>" data-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButtonPlanning<?php echo $index; ?>">
                                                <li data-toggle="modal" data-target="#modal-consequence" onclick="load_modal(2)"><a class="dropdown-item" href="#">Edit</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li data-toggle="modal" data-target="#modal-consequence" onclick="load_modal(2)"><a class="dropdown-item" href="#">Create</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['impact_level']; ?></td>
                                    <td><?php echo $row['content']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</section>