<main>
    <div class="container-table">
        <div class="table-header">
            <h1>Danh sách phòng ban làm việc</h1>
        </div>
        <div class="table-body">
            <!-- Button trigger modal -->
            <input type="week" id="week">
            <button type="button" class="btn_add" onclick="getDate()" >Chọn ngày</button>
            <?php include './modules_admin/room_management/scheduleRoom.php'; ?>
        </div>
    </div>
</main>

<script>
    function getDate(){
        var week = document.getElementById("week").value;
        // alert(date);
        window.location.href='./index.php?page_layout=room_management&week='+week;
    }
</script>
