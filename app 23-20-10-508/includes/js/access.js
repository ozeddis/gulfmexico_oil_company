//login
function login(){
    $(document).ready(function(){
        $('#loginF').on('submit', function(event){
            event.preventDefault();
            const loginBtn = document.getElementById('loginBtn');
            const loginAux = document.getElementById('loginAux');
            loginBtn.style.display = 'none';
            loginAux.style.display = 'block';
            //CHECK WHY THE FORM IS NOT SUBMITTING
            loginAux.setAttribute('value', 'Authenticating, please wait...');
            $.ajax({
                url: './cloud/access/login',
                type: "POST",
                data: new FormData(this),
                processData:false,
                contentType: false,
                
                success: function(data){
                    
                    let r = JSON.parse(data);
                    console.error(data);
                    if(r.status == 'True'){
                        if(r.auth == 'admin'){
                            jSuites.notification({

                                success: 1,
                        
                                name: 'Notification',
                        
                                message: '<span class="fa fa-check-circle"></span> ' + r.message,
                        
                            });
                            setTimeout(function(){
                                window.location = 'cloud/manager/dashboard.php'
                            },6000);
                        }else{
                            jSuites.notification({

                                success: 1,
                        
                                name: 'Notification',
                        
                                message: '<span class="fa fa-check-circle"></span> ' + r.message,
                        
                            });
                            setTimeout(function(){
                                window.location = 'cloud/dashboard/index'
                            },6000);
                        }
                    }else{
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message:  '<span class="fa fa-exclamation-triangle"></span> ' + r.message,
                    
                        });
                        loginBtn.style.display = 'block';
                        loginAux.style.display = 'none';
                    }
                    
                },
                error: function(){
                    loginBtn.style.display = 'block';
                    loginAux.style.display = 'none';
                    console.error('An error occurred...');
                }
            })

        })
    })
}
//error if terms not accepted
function g_e(){
    jSuites.notification({

        error: 1,

        name: 'Error',

        message: '<span class="fa fa-exclamation-triangle"></span> Accept Terms & Conditions to continue !!!',

    });
    return;
}
//referral link data
function w_r(){
    $(document).ready(function(){
        const link = new URLSearchParams(window.location.search);
        const x_link = link.get('ref');
        if(x_link){
            fetch('./cloud/access/create?ref=' + x_link)
            .then(response => response.json())
            .then(data => {
                if(data.status){
                    const who = data.who;
                    const email = data.email;
                    console.log(who + ' ' + email);
                    document.getElementById('upline').setAttribute('value', who);

                    if(data.status == 'success'){
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notice',
                    
                            message: '<span class="fa fa-check-circle"></span> <b>' + who + '</b> invited you.',
                    
                        });
                        return;
                    }else{
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Error',
                    
                            message: '<span class="fa fa-exclamation-triangle"></span> ' + who,
                    
                        });
                        return;
                    }
                }else{
                    console.error('Error retriving result from Server: ', data);
                }
            })
            .catch(error =>{
                console.error('Error fetching result: ', error);
            })
        }else{
            const who = 'none';
            document.getElementById('upline').setAttribute('value', who);
            console.log(who);
        }
    });
}
//if terms accepted
function accepted(){
    const v = document.getElementById('agreeRules');
    const y = document.getElementById('notAgree');
    v.setAttribute('onchange', 'dontAccept()');
    y.setAttribute('type', 'submit');
    y.removeAttribute('onclick');
    y.setAttribute('id', 'agreed');

}
//if terms not accepted
function dontAccept(){
    const v = document.getElementById('agreeRules');
    const y = document.getElementById('agreed');
    v.setAttribute('onchange', 'accepted()');
    y.setAttribute('onclick', 'g_e()');
    y.setAttribute('type', 'button');
    y.setAttribute('id', 'notAgree'); 
}
//register
function register(){
    $(document).ready(function(){
        $('#m_Rf').on('submit', function(event){
            event.preventDefault();
            const agreed = document.getElementById('agreed');
            const rg = document.getElementById('rg');
            agreed.style.display = 'none';
            rg.style.display = 'block';
            rg.setAttribute('value', 'Processing, please wait...');
            $.ajax({
                url: './cloud/access/create',
                type: "POST",
                data: new FormData(this),
                processData:false,
                contentType: false,
                //work on Google recaptcha
                success: function(data){
                    let r = JSON.parse(data);
                    console.error(data);
                    if(r.status == 'True'){
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-check-circle"></span> ' + r.message,
                    
                        });
                        setTimeout(function(){
                            window.location = './cloud/dashboard'
                        },6000);
                        
                    }else{
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-exclamation-triangle"></span> ' + r.message,
                    
                        });
                        agreed.style.display = 'block';
                        rg.style.display = 'none';
                    }
                    
                },
                error: function(){
                    console.error('An error occurred...');
                    agreed.style.display = 'block';
                    rg.style.display = 'none';
                }
            })

        })
    })
}
//verify account
function verifyAccount(){
    $(document).ready(function(){
        $('#verifyAccount').on('submit', function(event){
            event.preventDefault();
            
            $.ajax({
                url: './app/access/verify',
                type: "POST",
                data: new FormData(this),
                processData:false,
                contentType: false,

                success: function(data){
                    let r = JSON.parse(data);
                    if(r.status == 'success'){
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: r.message,
                    
                        });
                        setTimeout(function(){
                            window.location = 'app/wallet/'
                        },6000);
                    }else{
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message: r.message,
                    
                        });
                    }
                    
                },
                error: function(){
                    console.error('An error occurred...');
                }
            })

        })
    })
}

verifyAccount();
login();
w_r();
register();