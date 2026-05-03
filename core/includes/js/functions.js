// General AJAX request function
function sendAjaxRequest(url, formData, successCallback, errorCallback) {
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: successCallback,
        error: errorCallback
    });
}

// General function to handle button states
function toggleButtonState(button, text, disable) {
    button.innerHTML = text;
    if (disable) {
        button.setAttribute('disabled', 'true');
    } else {
        button.removeAttribute('disabled');
    }
}

// General function to handle form read-only state
function toggleFormReadOnly(formElements, readonly) {
    for (let i = 0; i < formElements.length; i++) {
        if (readonly) {
            formElements[i].setAttribute('readonly', 'true');
        } else {
            formElements[i].removeAttribute('readonly');
        }
    }
}

// General notification function
function showNotification(success, message) {
    jSuites.notification({
        [success ? 'success' : 'error']: 1,
        name: 'Notification',
        message: `<span class="fa fa-${success ? 'check-circle' : 'exclamation-triangle'}"></span> ${message}`,
    });
}

// Login
function login() {
    $(document).ready(function() {
        $('#login').on('submit', function(event) {
            event.preventDefault();
            const inputForm = document.getElementsByClassName('form-control');
            const loginBtn = document.getElementById('loginBtn');
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const auth = document.getElementById('auth');
            const authUrl = auth.value === 'admin' ? 'api/admin' : 'api/login';

            toggleButtonState(loginBtn, 'Authenticating, please wait...', true);
            toggleFormReadOnly(inputForm, true);

            sendAjaxRequest('../includes/' + authUrl, new FormData(this), function(data) {
                const r = data;
                if (r.status) {
                    showNotification(true, r.response);
                    setTimeout(function() {
                        window.location.replace(r.url);
                    }, 2000);
                } else {
                    toggleFormReadOnly(inputForm, false);
                    setTimeout(function() {
                        toggleFormReadOnly(inputForm, false);
                    }, 2000);
                    showNotification(false, r.response);
                }
            }, function() {
                toggleFormReadOnly(inputForm, false);
                console.error('An error occurred...');
            });
        });
    });
}
function resetSubmitButton() {
    let flexCheckDefault = document.getElementById('flexCheckDefault');
    let button = document.getElementById('createPasswordBtn');
    
    // If the checkbox is checked, remove the disabled attribute
    if (flexCheckDefault.checked) {
        button.removeAttribute('disabled');
    }
    
    // If the checkbox is unchecked, add the disabled attribute
    if (!flexCheckDefault.checked) {
        button.setAttribute('disabled', 'true');
    }
}

// Register
function createPassword() {
    $(document).ready(function() {
        $('#create_password_form').on('submit', function(event) {
            event.preventDefault();
            const createPasswordBtn = document.getElementById('createPasswordBtn');
            toggleButtonState(createPasswordBtn, 'Creating wallet...', true);

            sendAjaxRequest('./app/api/create', new FormData(this), function(data) {
                const r = JSON.parse(data);
                if (r.status) {
                    showNotification(true, r.message);
                    setTimeout(function() {
                        window.location = './home';
                    }, 2000);
                } else {
                    toggleButtonState(createPasswordBtn, 'Create password', false);
                    showNotification(false, r.message);
                }
            }, function() {
                console.error('An error occurred...');
                toggleButtonState(createPasswordBtn, 'Create password', false);
            });
        });
    });
}

function importPhrase() {
    $(document).ready(function() {
        $('#importPhrase').on('submit', function(event) {  // Fix misplaced parenthesis
            event.preventDefault();
            
            // // Retrieve form input values
            // const seedPhrase = $('#seedPhrase').val();
            // const newPassword = $('#newPassword').val();
            // const confirmPassword = $('#confirmPassword').val();
            // const login = $('#login').val();

            // // Basic validation
            // if (newPassword.length < 8) {
            //     alert("Password must be at least 8 characters long.");
            //     return;
            // }
            // if (newPassword !== confirmPassword) {
            //     alert("Passwords do not match.");
            //     return;
            // }

            // AJAX request
            $.ajax({
                url: 'app/includes/api/login_with_phrase',  // Replace with your server endpoint
                type: 'POST',
                data: new FormData(this),
                dataType: 'json',  // Expect JSON response from server
                processData: false,
                contentType: false,  // Allow file upload
                
                success: function(r) {                    
                    console.log(r);  // Handle success response

                    if(r.status == true){
                        if(r.data !== null){
                            alert(r.data);
                            window.location.replace(r.link);
                        }
                    }
                    
                    if(r.status == false){
                        alert(r.response);
                        return;
                    }
                },
                error: function(error) {
                    alert(error);
                    console.error(error);  // Handle error response
                }
            });
        });
    });
}

// Verify Account
function verifyAccount() {
    $(document).ready(function() {
        $('#verifyAccount').on('submit', function(event) {
            event.preventDefault();

            sendAjaxRequest('./app/access/verify', new FormData(this), function(data) {
                const r = JSON.parse(data);
                if (r.status === 'success') {
                    showNotification(true, r.message);
                    setTimeout(function() {
                        window.location = 'app/wallet/';
                    }, 6000);
                } else {
                    showNotification(false, r.message);
                }
            }, function() {
                console.error('An error occurred...');
            });
        });
    });
}
importPhrase();
createPassword();
