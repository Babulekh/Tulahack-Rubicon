const button = document.getElementById("button-edit");
const profileData_editForm = document.querySelector(".profile__edit-form");
const profileData = document.getElementById("profile-data");

let isEditing = false;

function switchProfileMode (event) {
    console.log(isEditing);
    isEditing = !isEditing;
    if (isEditing) {
        profileData.classList.remove("switched_active");
        profileData_editForm.classList.add("switched_active");
    }
    else {
        profileData.classList.add("switched_active");
        profileData_editForm.classList.remove("switched_active");
    }
}

button.addEventListener("click", switchProfileMode);