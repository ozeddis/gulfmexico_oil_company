function withdraw(){
    $(document).ready(function(){
        $('#withdrawalForm').on('submit', function(event){
            event.preventDefault(); // prevent form submit
            const withBtn = document.getElementById('withBtn');
            $.ajax({
                url: 'api/withdrawal',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                
                success: function(data){
                    console.log(data);
                    let r = JSON.parse(data);
                    withBtn.setAttribute('disabled', 'true');
                    withBtn.innerHTML = 'Processing, please wait...';
                    if(r.status == true){
                        withBtn.setAttribute('disabled', 'true');
                        withBtn.innerHTML = 'Processing, please wait...';
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-check-circle"></span> ' + r.response,
                    
                        });
                        //setTimeout(() => {window.location.replace('./coins?coin=' + r.response.coin)},  3000);  // redirect to chat page after 3 seconds
                    
                    }
                    if(r.status == false){
                        withBtn.removeAttribute('disabled');
                        withBtn.innerHTML = 'Withdraw';
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-exclamation-triangle"></span> ' + r.message,
                    
                        });
                    }
                }, 
                error: function(){
                    alert("Error");
                }
            })
        });
    });
}
withdraw();