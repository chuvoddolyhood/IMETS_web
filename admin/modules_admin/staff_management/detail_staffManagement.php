<?php
	include './../config.php';
    $ID_Staff= $_GET['id'];
	$sql = "SELECT *
			FROM staff  
			JOIN dept ON dept.ID_Dept=staff.ID_Dept
			JOIN img_staff ON staff.ID_Staff=img_staff.ID_Staff
			WHERE staff.ID_Staff=$ID_Staff";
    $query = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_array($query);
	// echo $rows["Name"];
?>

<main>
	<div class="nav_tool">
		<div class="link-nav-pages">
			<a href="./index.php?page_layout=staff_management">Quản Lý Thông Tin Nhân Viên</a> / 
			<a href="">Xem chi tiết</a>
		</div>
		<div class="tool">
			<a href="./index.php?page_layout=modifyStaff&id= <?php echo $rows["ID_Staff"] ?>" 
                    style="background-color: rgb(255, 187, 0);color: white;padding: 8px 15px;text-align: center;text-decoration: none;display: inline-block;border-radius: 5px;">Sửa</a>
			<a onclick="return confirm_Del('<?php echo $rows['Name'] ?>')" 
                href="./modules_admin/staff_management/delete_staff.php?id=<?php echo $ID_Staff ?>" class="btn_delete">Xóa</a>
		</div>
	</div>

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
			<p>Tỉ lệ đánh giá: <?php echo $rows["VoteRate"]; ?></p>
		</div>
		<div class="column">
			<img id=featured src="./../img/staff/<?php echo $rows["imgName"] ?>">
			
			<div id="slide-wrapper" >
				<img id="slideLeft" class="arrow" src="./../img/images/arrow-left.png" style="padding-right: 2%;">
				
				<div id="slider">
					<img class="thumbnail active" src="./../img/staff/<?php echo $rows["imgName"] ?>">
					<?php while($rows = mysqli_fetch_array($query)){ ?>
						<img class="thumbnail" src="./../img/staff/<?php echo $rows["imgName"] ?>">
                    <?php } ?>
				</div>
				<img id="slideRight" class="arrow" src="./../img/images/arrow-right.png" style="padding-left: 2%;">
			</div>
		</div>
		
		


	</div>

	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})

		function confirm_Del(name){
        	return confirm("Bạn có chắc muốn xóa mặt hàng "+ name + "?");
    	}

	</script>
</main>
