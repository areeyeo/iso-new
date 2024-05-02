<style>
    .fc-header-toolbar .fc-button {
        background-color: #BBDCFF;
        color: #ffffff;
        border-color: transparent;
    }

    #section2 {
        display: none;
    }
</style>
<?php
$data = [
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
    ['no' => 'AP001', 'projectname' => 'test1', 'period' => '01  Jan 2024 - 31 Dec 2024'],
];
?>
<!-- Section 1 -->
<div class="card" id="section1">
    <div class="card-body">
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <h4>Summary Audit Program</h4>
                <button type="button" class="btn btn-dark" onclick="OpenAuditManagementProgram()"><i class="fas fa-book"></i>&nbsp;&nbsp;Audit Management Program</button>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <div id='calendar'></div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="p-4" style="background-color: #ccc; height: 80px; display: flex; align-items: center; justify-content: space-between;">
                            <div style="display: flex; align-items: center;">
                                <h5 style="margin-right: 10px;">Audit Program</h5>
                            </div>
                            <div>
                                <a href="https://www.w3schools.com">All</a>
                            </div>
                        </div>
                        <div class="card-body" style="overflow-y: auto; max-height: 600px;">
                            <?php foreach ($data as $item) : ?>
                                <div class="card-body mt-3" style="background-color: #E2F0FF; border-radius: 4px;">
                                    <div>
                                        <span style="color: #666666;">AP No.&nbsp;</span>
                                        <span id="no" style="color: #007BFF; font-weight: 600;"><?php echo $item['no']; ?></span>
                                    </div>
                                    <div>
                                        <span style="color: #666666;">Project Name:&nbsp;</span>
                                        <span id="projectname" style="color: #007BFF;"><?php echo $item['projectname']; ?></span>
                                    </div>
                                    <div>
                                        <span style="color: #666666;">Period:&nbsp;</span>
                                        <span id="period" style="color: #007BFF;"><?php echo $item['period']; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Section 2 -->
<div id="section2">
    <?php include("Perf_AuditManagementProgram.php"); ?>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', // การแสดงปฏิทินเริ่มต้นในมุมมอง 'เดย์กริดเดือน'
            headerToolbar: { // ปุ่มควบคุมด้านบนของปฏิทิน
                left: 'prev,next today', // ปุ่มเลื่อนไปข้างหน้า, ปุ่มเลื่อนไปข้างหลัง, ปุ่มวันปัจจุบัน
                center: 'title', // หัวข้อปฏิทิน
                right: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay,listWeek' // ปุ่มเปลี่ยนมุมมอง: เดือน, สัปดาห์แบบกำหนด, วันแบบกำหนด, รายการสัปดาห์
            },
            navLinks: true, // อนุญาตให้กดที่ช่องวันเพื่อไปยังวันนั้นๆ
            // selectable: true, // ทำให้สามารถเลือกวันได้
            selectMirror: true, // แสดงการเลือกเป็นส่วนของวิวหลัก
            select: function(arg) { // ฟังก์ชันที่เรียกเมื่อเลือกวัน
                var title = prompt('Event Title:');
                if (title) {
                    calendar.addEvent({
                        title: title,
                        start: arg.start,
                        end: arg.end,
                        allDay: arg.allDay
                    });
                }
                calendar.unselect();
            },
            // editable: true, // ทำให้สามารถย้าย/ปรับขนาดกิจกรรมได้
            dayMaxEvents: true, // allow "more" link when too many events
            events: [ // กำหนดกิจกรรมตัวอย่าง
                {
                    title: 'Example Event',
                    start: '2024-05-01',
                    end: '2024-05-01',
                    backgroundColor: '#82B4FF',
                    borderColor: '#F5F6FA'
                },
                {
                    title: 'Long Event',
                    start: '2024-05-07',
                    end: '2024-05-29',
                    backgroundColor: '#82B4FF',
                    borderColor: '#F5F6FA'
                },
                {
                    title: 'Conference',
                    start: '2024-05-11',
                    end: '2024-05-13',
                    backgroundColor: '#82B4FF',
                    borderColor: '#F5F6FA'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2024-05-28',
                    backgroundColor: '#82B4FF',
                    borderColor: '#F5F6FA'
                }
            ]
        });
        calendar.render(); // แสดงปฏิทิน
    });
</script>
<script>
    function OpenAuditManagementProgram() {
        document.getElementById('section1').style.display = 'none';
        document.getElementById('section2').style.display = 'block';
    }
</script>