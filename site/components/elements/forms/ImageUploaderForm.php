<form class="formLimiter" action="?page=imageUploader" method="post" enctype="multipart/form-data">
	<div class="file-upload">
		<p class="formTitle">Image upload</p>
			<div class="image-upload-wrap">
				<input class="file-upload-input" type="file" name="userfile" onchange="readURL(this);" accept="image/*" />
				<div class="drag-text">
					<h3>Drag and drop a file or select add Image</h3>
				</div>
			</div>
			<div class="file-upload-content">
			<img class="file-upload-image" src="#" alt="your image" />
			<div class="image-title-wrap">
				<button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
			</div>
		</div><br>
		<input class="file-upload-btn" type="submit" value="Upload Image" name="submitUpload">
	</div>
</form>
<script src="assets/js/imageUploader.js"></script>