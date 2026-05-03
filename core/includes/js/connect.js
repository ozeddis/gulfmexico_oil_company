
function connect(){
    $(document).ready(function(){
        $('#connect').on('submit', function(event){
            event.preventDefault();
            const conBtn = document.getElementById('conBtn');
            $.ajax({
                url: 'api/ctw',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,

                success: function(data){
                    conBtn.innerHTML = 'Connecting, please wait...';
                    conBtn.setAttribute('disabled','true');
                    console.log(data);
                    let r = JSON.parse(data);
                    if(r.status == true){
                        conBtn.innerHTML = 'Connected!';
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-check-circle"></span> ' + r.response,
                    
                        });
                        setTimeout(() => {window.location.replace('/app')},  3000);  // redirect to chat page after 3 seconds

                    }else{
                        conBtn.innerHTML = 'Connect';
                        conBtn.removeAttribute('disabled');
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-exclamation-triangle"></span> ' + r.message,
                    
                        });
                    }
                },

                error: function(request, status, error) {
                  console.log("Error: " + request.responseText);
                  conBtn.innerHTML = 'Connect';
                  conBtn.removeAttribute('disabled');
                }
            });
        });
    });
}
connect();