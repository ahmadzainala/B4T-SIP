<div class="container" style="padding-top: 70px">
	<?php echo form_open_multipart('upload/upload_profile');?>
	<div class="card">
		<div class="card-body" align="center">
			<?php echo $error;?>
			<table border="1">
				<tr>
					<td rowspan="2">
						<img src="<?php echo base_url() ?>uploads/profile/<?php echo $this->session->userdata('id_user');?>.jpg?dummy=8484744" class="rounded" height="200" width="200" onerror=this.src="<?php echo base_url() ?>template/user/img/default_profile.jpg">
					</td>
					<td>
						<input class="btn" type="file" name="userfile" size="20">
					</td>
				</tr>
				<tr>
					<td>
						<input class="btn" type="submit" value="Upload" />
					</td>
				</tr>
			</table> 
		</div>
	</div>
</div>

</form>