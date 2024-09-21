const container = document.querySelector(".container"),
  pwShowHide = document.querySelectorAll(".showHide"),
  pwFields = document.querySelectorAll(".password"),
  signUp = document.querySelector(".signup-link"),
  logIn = document.querySelector(".login-link");

const birtdate = ['month, " "', 'day, " "'];

pwShowHide.forEach((eyeIcon) => {
  eyeIcon.addEventListener("click", () => {
    pwFields.forEach((pwField) => {
      if (pwField.type === "password") {
        pwField.type = "text";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye-slash", "uil-eye");
        });
      } else {
        pwField.type = "password";

        pwShowHide.forEach((icon) => {
          icon.classList.replace("uil-eye", "uil-eye-slash");
        });
      }
    });
  });
});

// Function to display sign up and login form
signUp.addEventListener("click", () => {
  container.classList.add("active");
});

logIn.addEventListener("click", () => {
  container.classList.remove("active");
});

/*========== Modal ==========*/
// const modal = document.querySelector("#modal");
// const openModal = document.querySelector("#submit-form");
// // const closeModal = document.querySelector(".closed");

// openModal.addEventListener('click', () =>{
//     modal.showModal()
// });

// closeModal.addEventListener('click', () =>{
//     modal.close()
// });

// function showModal(showMod, popButt) {
//   var showPopup = document.querySelect(showMod);
//   var button = document.querySelector(popButt);

//   button.addEventListener('click', () => {
//     showPopup.showModal();
//   });
// }

// const sigupEl = document.getElementById("submit-form");
// const sucMod = document.getElementById("registered");

// sigupEl.addEventListener("click", () => {

function checkFormInputs(formId) {
  var form = document.getElementById(formId);

  var inputs = form.getElementsByTagName("input");

  for (let i = 0; i < inputs.length; i++) {
    if (inputs[i].value) {
      return false;
    }
  }
}
// const registerForm = document.getElementById("signup-forms");
// const logForm = document.getElementById("form-login");

// registerForm.addEventListener("submit", (event) => {
//   if(!checkFormInputs("signup-forms")) {
//     event.preventDefault();
//   }
// });

// const registerBut = document.getElementById("submit-form");

// registerBut.addEventListener("click", function () {
//   if (checkFormInputs("signup-forms")) {
//     showmodal.showmodal();
//   }
// });

//Checks the form input fields if they are filled
function checkForms() {
  const wholeCont = document.querySelector(".forms");
  const submitForm = document.getElementById("signup-forms");

  submitForm.addEventListener("submit", (event) => {
    event.preventDefault();
    showModal("modal");
    wholeCont.style.display = "none";
    submitForm.reset();
  });
}

function showModal(modal) {
  const succModal = document.getElementById(modal);
  succModal.showModal();
}

function closeModal() {
  const succModal = document.getElementById("modal");

  succModal.close();
  location.reload();
}

checkForms();
