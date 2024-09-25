const changePictureBtn = document.getElementById("change-picture-btn");
const avatarInput = document.getElementById("avatar-input");
const fileNameDisplay = document.getElementById("file-name");

// Trigger the file input when the button is clicked
changePictureBtn.addEventListener("click", function () {
    avatarInput.click();
});

// Automatically submit the form when a file is selected
avatarInput.addEventListener("change", function () {
    if (avatarInput.files.length > 0) {
        // Display file name (optional)
        fileNameDisplay.textContent = `Selected file: ${avatarInput.files[0].name}`;
        // Submit the form to upload the avatar
        avatarInput.closest("form").submit();
    }
});
