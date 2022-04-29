<main>
    <center>
		<h4 class="sent-notification"></h4>

		<form id="myForm">
			<h2>Gửi Email</h2>

			<label>Tên</label>
			<input id="name" type="text" placeholder="Nhập tên">
			<br><br>

			<label>Email</label>
			<input id="email" type="text" placeholder="Nhập địa chỉ Email" value="staff@imets.com">
			<br><br>

            <!-- <label>Email</label>
			<input id="email" type="text" placeholder="Enter Email" value="staff@imets.com">
			<br><br> -->

			<label>Chủ đề</label>
			<input id="subject" type="text" placeholder="Nhập chủ đề"> 
			<br><br>

			<p>Tin nhắn</p>
			<textarea id="bodytext" rows="5" placeholder="Gõ..."></textarea>
			<br><br>

			<button type="button" onclick="sendEmail()" value="Send An Email">Gửi</button> 
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#bodytext");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: './modules_staff/sendMail/sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</main>