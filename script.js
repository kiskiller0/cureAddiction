
// const phoneField = document.getElementById("phoneField");
// const phoneLabel = document.getElementById("phoneLabel");

const doctorCheckBox = document. getElementById("isDoctor");
doctorCheckBox.checked = false;

const patientFields = document.getElementsByClassName("doctorSpecific");
const doctorFields = document.getElementsByClassName("patientSpecific");

const form = document.getElementById('signupForm');

// if (!doctorCheckBox.checked) {
//     for(let docField of doctorFields) {
//         docField.style.display = "none";
//     }
// } else {
//     for(let patientField of patientFields) {
//         patientField.style.display = "init";
//     }
// }



function showRightObjects() {
    if (!document. getElementById("isDoctor").checked) {
        for(let docField of doctorFields) {
            docField.style.display = "inline";
        }
        for(let patientField of patientFields) {
            patientField.style.display = "none";
        }
    } else {
        for(let docField of doctorFields) {
            docField.style.display = "none";
        }
        for(let patientField of patientFields) {
            patientField.style.display = "inline";
        }
    }
}
doctorCheckBox.addEventListener("click", e => {showRightObjects();});

form.addEventListener("mouseenter", e => {showRightObjects();});

    


// phoneField.addEventListener("click", e => {
//     alert("clicked!");
// });



