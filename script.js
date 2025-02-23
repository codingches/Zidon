const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

//function show error
function showError(input, message) {
    const formcontrol = input.parentElement;
    formcontrol.className = 'form-control error'
    const small = formcontrol.querySelector('small');
    small.innerText = message;
}
//show success
    function showSuccess(input) {
      const  formControl = input.parentElement;
        formControl.className = 'form-control  success';
    }

    //check required
    function checkRequired(inputArr) {
        inputArr.forEach(function (input){
       if (input.value.trim() === '') {
        showError(input, `${getFieldName(input)} is Required`);
       }
        });
    }
    //acessing the input field
    function getFieldName(input) {
        return input.id.charAt(0).toUpperCase() + input.id.slice(1);
    }
//check for valid email

function checkValidEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
form.addEventListener('submit', function(e){
    e.preventDefault();
    checkRequired([username,password,password2,email])
    if (username.value === '') {
        showError(username, 'username is Required');
    }
   else{
    showSuccess(username);
   }

   if (email.value === '') {
    showError(email, 'Email is Required');
}
else if (!checkValidEmail(email.value)) {
    showError(email, 'Valid Email Is Required')
} else{
showSuccess(email);
}

if (password.value === '') {
    showError(password, 'Password is Required');
}
else{
showSuccess(password);
}


if (password2.value === '') {
    showError(password2, 'please Confirm Your Password');
}
else{
showSuccess(password2);
}
});

//function to change button color
function buttonColorChanger() {
    const newButtonColor = document.getElementById('submit');
    newButtonColor.style.backgroundColor = 'green';
    newButtonColor.style.borderColor = 'green'
}

//function to change  label color
function changeLabelColor() {
    const newLabelColor = document.getElementById("label");
    newLabelColor.style.color = 'orange';
}
function changeUsernameLabelColor() {
    const newUsernameLabelColor = document.getElementById("usernameLabel");
    newUsernameLabelColor.style.color = 'orange';
}
function changePasswordLabelColor() {
    const newPasswordLabelColor = document.getElementById("passwordlabel");
    newPasswordLabelColor.style.color = 'orange';
}

function changePassword2LabelColor() {
    const newPassword2LabelColor = document.getElementById("password2label");
    newPassword2LabelColor.style.color = 'orange';
}