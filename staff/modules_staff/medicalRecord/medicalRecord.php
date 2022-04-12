<!-- <main>
    <div class="container-fluid">
        <div class="card-container">
            <div class="link-nav-pages">
                <a href="">Bệnh án điện tử</a>
            </div>
            <div class="card-header">
                <h2>Hồ sơ bệnh nhân</h2>
            </div>
            <div class="radio-options">
                <input type="text" name="search" id="search" placeholder="Nhập mã bệnh nhân/mã bệnh án">
                <button onclick="search()">Tìm kiếm</button>
                
            </div>
            <?php include './modules_staff/medicalRecord/record.php'; ?>
        </div>
    </div>
</main>

<script>
    function search(){
        var search = document.getElementById('search').value;
        // alert(search);


        // call ajax
        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "index.php?page_layout=medicalRecord&search="+search;
        var asynchronous = true;
        ajax.open(method, url, asynchronous);

        //send
        ajax.send();
            
        //receive
        ajax.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                // alert(response);
                // window.location.href='./index.php?page_layout=cart';
            }
        }
            
    }
</script> -->
