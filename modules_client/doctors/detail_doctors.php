<?php
    include './config.php';
    $ID_Staff= $_GET['id'];
	$sql = "SELECT *
			FROM staff  
			JOIN dept ON dept.ID_Dept=staff.ID_Dept
			JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
			WHERE staff.ID_Staff=$ID_Staff";
    $query = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($query);
	$dept_name = $rows["Name_Dept"];

	if(!isset($_SESSION['login_client'])){
        header('location: ./modules_client/login-signin/loginForm.php');
    }
?>

<section class="doctorDetail">
    <div id="content-wrapper">
		
		<div class="title_doc">
			<h1><?php echo $rows["Name_Staff"]; ?></h1>
			<hr>
			<h3><?php echo $rows["Position"]; ?></h3>
			<h4><?php echo $rows["Name_Dept"]; ?></h4>
			<p>Giới tính: <?php echo $rows["Sex_Staff"]; ?></p>
			<p>Ngày sinh: 
				<?php 
					$DOB =$rows["DOB_Staff"];
					echo date('d/m/Y', strtotime($DOB));
				?> 
			</p>
			<p>Số điện thoại: <?php echo $rows["PhoneNumber_Staff"]; ?></p>
			<p>Địa chỉ: <?php echo $rows["Address_Staff"]; ?></p>
			<p>CMND: <?php echo $rows["CMND_Staff"]; ?></p>
			<p>Ngày vào làm: 
				<?php
				  	$date = getdate();

					$DateStartWork =$rows["DateStartWork"];
					echo date('d/m/Y', strtotime($DateStartWork));
					$yearWork = date('Y', strtotime($DateStartWork));
				?> 
				(kinh nghiệm <?php echo $date['year']-$yearWork ?> năm)</p>
            <div class="rating-slider">
                <?php
                    $numberOfStar = round($rows["VoteRate"]);
                    // echo 'full:'.$numberOfStar;
                    $fullStart=0;
                    while($fullStart < $numberOfStar){
                        $fullStart++;
                    ?>
                        <i class="fas fa-star"></i>
                <?php } 
                    $numberOfStar_empty = 5-round($rows["VoteRate"]);
                    // echo 'empty:'.$numberOfStar_empty;
                    $i=0;
                    while($i < $numberOfStar_empty){
                        $i++;
                ?>
                    <i class="far fa-star"></i>
                <?php } ?>
            </div>
		</div>
		<div class="column_detail">
			<img id=featured_detail src="./img/staff/<?php echo $rows["imgName"] ?>">
			
			<div id="slide-wrapper_detail" >
				<img id="slideLeft_detail" class="arrow_detail" src="./img/images/arrow-left.png" style="padding-right: 2%;">
				
				<div id="slider_detail">
					<img class="thumbnail_detail active" src="./img/staff/<?php echo $rows["imgName"] ?>">
					<?php while($rows = mysqli_fetch_array($query)){ ?>
						<img class="thumbnail_detail" src="./img/staff/<?php echo $rows["imgName"] ?>">
                    <?php } ?>
				</div>
				<img id="slideRight_detail" class="arrow_detail" src="./img/images/arrow-right.png" style="padding-left: 2%;">
			</div>
		</div>
	</div>

	<div class="home-text">
		<h1>Bạn muốn đăng ký đặt lịch với Bác sĩ?</h1>
		<p class="animate-text">
			<span>Kiểm tra lịch bên dưới.</span>
			<span>Bấm vào nút đăng ký theo thời gian bạn muốn.</span>
			<span>Chờ xác nhận đặt lịch.</span>
			<span>Kiểm tra thông tin và thời gian</span>
			<span>Đến bệnh viện vào đúng thời gian và địa điểm</span>
		</p>
	</div>

	<div class="doctorList">
		<?php
			$sql_get_schedule = "SELECT DISTINCT st.Name_Staff,DATE(s.start) AS start,d.Name_Dept
			FROM schedule s JOIN staff st ON s.ID_Staff=st.ID_Staff
				JOIN dept d ON d.ID_Dept=st.ID_Dept
			WHERE st.ID_Staff=$ID_Staff AND s.start>=NOW()";
			$query_get_schedule = mysqli_query($conn, $sql_get_schedule);
		?>

		<div class="container-card">

			<?php
			while($rows_get_schedule = mysqli_fetch_array($query_get_schedule)){
			?>

				<div class="card">
					<div class="card-image">
						<img src="./img/images/img1.jpg">
					</div>
					<h2><?php echo date('d-m-Y', strtotime($rows_get_schedule['start'])); ?></h2>
					<h3><?php echo $rows_get_schedule['Name_Dept']; ?></h3>
					<a href="./index.php?page_layout=clipboard&
						ID_Staff=<?php echo $ID_Staff ?>&date=<?php echo $rows_get_schedule['start'] ?>"
						onclick="return confirm_Booking()">
						Đặt lịch</a>
				</div>
			<?php } ?>
		</div>
	</div>

	
	<div class="doctorList">
		<?php
			include './config.php';
			$sql_get_anotherDoctor = "SELECT * FROM staff JOIN dept ON dept.ID_Dept=staff.ID_Dept
				JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
				WHERE staff.Position != 'Admin' AND dept.Name_Dept='$dept_name' AND staff.ID_Staff!=$ID_Staff
				GROUP BY staff.ID_Staff
				ORDER BY staff.ID_Staff ASC";
			$query_get_anotherDoctor = mysqli_query($conn, $sql_get_anotherDoctor);
		?>

		<h1> Các bác sĩ thuộc <?php echo $dept_name; ?> khác </h1>
		<div class="container-card">

			<?php
			while($rows_get_anotherDoctor = mysqli_fetch_array($query_get_anotherDoctor)){
			?>

				<div class="card">
					<div class="card-image">
						<img src="./img/staff/<?php echo $rows_get_anotherDoctor["imgName"] ?>">
					</div>
					<h2><?php echo $rows_get_anotherDoctor["Name_Staff"] ?></h2>
					<h3><?php echo $rows_get_anotherDoctor["Position"] ?></h3>
					<h3><?php echo $rows_get_anotherDoctor["Name_Dept"] ?></h3>
					<!-- <h3><?php echo $rows_get_anotherDoctor["VoteRate"] ?></h3> -->
					
					<div class="rating-slider">
						<?php
							$numberOfStar = round($rows_get_anotherDoctor["VoteRate"]);
							// echo 'full:'.$numberOfStar;
							$fullStart=0;
							while($fullStart < $numberOfStar){
							$fullStart++;
						?>
							<i class="fas fa-star"></i>
						<?php }
							$numberOfStar_empty = 5-round($rows_get_anotherDoctor["VoteRate"]);
							// echo 'empty:'.$numberOfStar_empty;
							$i=0;
							while($i < $numberOfStar_empty){
							$i++;
						?>
							<i class="far fa-star"></i>
						<?php } ?>
					</div>
					<a href="./index.php?page_layout=detail_doctors&id= <?php echo $rows_get_anotherDoctor['ID_Staff'] ?>">Xem thông tin</a>
					<a href="">Đặt lịch</a>
				</div>
			<?php } ?>
		</div>
	</div>





	
	<div id="chatbot">
		<div id="chatbot-icon">
			<i class="fas fa-star chatbot-icon"></i>
		</div>
		
		<div id="chatbot-box">
			<iframe allow="microphone;" width="350" height="430" src="https://console.dialogflow.com/api-client/demo/embedded/b2bf0f49-fe97-4245-92d8-70f39718bc37"></iframe>
		</div>
		
	</div>

	<!-- ======================Điều chỉnh CSS list_doctor.php====================== -->
    <script src="./modules_client/doctors/detail_doctor.js"></script>

</section>