import '../../app.js';

document.getElementById('profile_photo').addEventListener('change', function() {
	let reader = new FileReader();

	reader.onload = function(e) {
		let preview = document.getElementById('imagePreview');
		preview.src = e.target.result;
		preview.style.display = 'block';
	};

	reader.readAsDataURL(this.files[0]);
});
