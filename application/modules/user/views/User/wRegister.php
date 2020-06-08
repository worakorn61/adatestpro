<form role="form" id="ofmSaveRegister" name="ofmSaveRegister" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="olaName"><?php echo $this->lang->line("fname"); ?></label>
		<input type="text" id="oetName" class="form-control" name="oetName" placeholder="Example: John">
	</div>
	<div class="form-group">
		<label for="olaLastName"><?php echo $this->lang->line("lname"); ?></label>
		<input type="text" id="oetLastName" class="form-control" name="oetLastName" placeholder="Example: Doe">
	</div>
	<div class="form-group">
		<label for="olaPhone">Phone</label>
		<input type="text" id="onbPhne" class="form-control" name="onbPhne" placeholder="Example: 0889997777">
	</div>
	<div class="form-group">
		<label for="olaGender"><?php echo $this->lang->line("gender"); ?></label>
		<select id="ocmGender" class="form-control" name="ocmGender">
			<option value=""><?php echo $this->lang->line("please_choose"); ?></option>
			<option value="male"><?php echo $this->lang->line("male"); ?></option>
			<option value="female"><?php echo $this->lang->line("female"); ?></option>
		</select>
	</div>
	<div class="form-group">
		<label for="olaEmail"><?php echo $this->lang->line("email"); ?></label>
		<input type="email" id="oemEmail" class="form-control" name="oemEmail" placeholder="Example: john.doe@gmail.com" pattern=".+@beststartupever.com">
	</div>
	<div class="form-group">
		<label for="olaPassword"><?php echo $this->lang->line("password"); ?></label>
		<input type="password" id="oetPassword" class="form-control" name="oetPassword" placeholder="">
	</div>
	<div class="form-group">
		<label for="olaVerifypass"><?php echo $this->lang->line("v_password"); ?></label>
		<input type="password" id="oetConPassword" class="form-control" name="oetConPassword" placeholder="">
	</div>
	<div class="form-group">
		<input type="file" accept="image/png, image/jpeg, image/gif" id="oflSaveUpload" name="oflSaveUpload[]" class="file_upload" multiple source="">
	</div>


	<div class="form-group text-center">
		<!-- <button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit"><?php echo $this->lang->line("signup"); ?></button> -->
		<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
		<button type="button" id="obtSaveRegister" class="btn btn-primary"><?php echo $this->lang->line("submit"); ?></button>
	</div>
</form>






<div class="modal fade" id="modalChkPass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-content panel-danger">
				<div class="modal-header panel-heading">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h4 class="modal-title"><?php echo $this->lang->line('alert'); ?></h4> <!-- แจ้งเตือน-->
				</div>
				<div class="modal-body">
					<div class="alert alert-danger text-center" role="alert">
						<!-- <span class="sr-only">Error:</span> -->
						<?php echo $this->lang->line('please_enter_the_password_to_match'); ?>
						<!-- กรุณาใส่รหัสผ่านให้ตรงกัน -->
					</div>
				</div>
				<div class="modal-footer">
					<button id="obtCloseModalChkPass" name="obtCloseModalChkPass" type="button" class="btn btn-default">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalChkLength" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-content panel-danger">
				<div class="modal-header panel-heading">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h4 class="modal-title"><?php echo $this->lang->line('alert'); ?></h4> <!-- แจ้งเตือน-->
				</div>
				<div class="modal-body">
					<div class="alert alert-danger text-center" role="alert">
						<!-- <span class="sr-only">Error:</span> -->
						<?php echo $this->lang->line('please_enter_a_password_of_more_than_6_characters'); ?>
						<!-- กรุณาใส่รหัสผ่านมากกว่า 6 ตัวอักษร -->
					</div>
				</div>
				<div class="modal-footer">
					<button id="obtCloseModalChkLength" name="obtCloseModalChkLength" type="button" class="btn btn-default">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalChkForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-content panel-danger">
				<div class="modal-header panel-heading">
					<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					<h4 class="modal-title"><?php echo $this->lang->line('alert'); ?></h4> <!-- แจ้งเตือน-->
				</div>
				<div class="modal-body">
					<div class="alert alert-danger text-center" role="alert">
						<!-- <span class="sr-only">Error:</span> -->
						<?php echo 'กรูณาใส่ข้อมูลให้ครบ' //$this->lang->line('please_enter_a_password_of_more_than_6_characters'); 
						?>
						<!-- กรุณาใส่รหัสผ่านมากกว่า 6 ตัวอักษร -->
					</div>
				</div>
				<div class="modal-footer">
					<button id="obtCloseModalChkForm" name="obtCloseModalChkLength" type="button" class="btn btn-default">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function() {
		$("#obtSaveRegister").click(function() {
			//let ofmFormData = $('#save_register').serializeArray();
			let oetName = $("#oetName").val();
			let oetLastName = $("#oetLastName").val();
			let ocmGender = $("#ocmGender").val();
			let oemEmail = $("#oemEmail").val();

			let oetPassword = $("#oetPassword").val();
			let oetConPassword = $("#oetConPassword").val();

			let ofmFormData = new FormData($('#ofmSaveRegister')[0]);

			var aFileImg = $('#oflSaveUpload').prop('files');

			ofmFormData.append('oflSaveUpload', aFileImg);

			if (oetName && oetLastName && oemEmail != '') {
				if (oetPassword.length < 6) {
					$('#modalChkLength').modal('show');
				} else if (oetPassword != oetConPassword) {
					$('#modalChkPass').modal('show');
				} else {
					$.ajax({
						type: "POST",
						url: "masUSRSaveRegister",
						data: ofmFormData,
						async: false,
						contentType: false,
						processData: false,
						cache: false,
						success: function(data) {
							$('#modalRegister').modal('hide');
							window.location = "masUSRShowUser";
						}
					});
				}
			} else {
				$('#modalChkForm').modal('show');
			}
		});

		$("#obtCloseModalChkPass").click(function() {
			$('#modalChkPass').modal('hide');
		});

		$("#obtCloseModalChkLength").click(function() {
			$('#modalChkLength').modal('hide');
		});

		$("#obtCloseModalChkForm").click(function() {
			$('#modalChkForm').modal('hide');
		});
	});
</script>