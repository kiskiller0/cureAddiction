const doctorCheckBox = document.getElementById("isDoctor");
const phoneField = document.getElementById("phoneField");
const phoneLabel = document.getElementById("phoneLabel");

if (!doctorCheckBox.checked) {
    phoneLabel.style.display = 'none';
    phoneField.style.display = 'none';
}

doctorCheckBox.addEventListener("click", e => {

    if (doctorCheckBox.checked) {
        // alert("checked!")
        phoneField.style.display = "initial";
        phoneLabel.style.display = "initial";
    } else {
        phoneField.style.display = "none";
        phoneLabel.style.display = "none";
        // alert("not checked!");
    }

});

// phoneField.addEventListener("click", e => {
//     alert("clicked!");
// });