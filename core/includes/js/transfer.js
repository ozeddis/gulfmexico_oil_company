function withdraw(){
    $(document).ready(function(){
        $('#tForm').on('submit', function(event){
            event.preventDefault(); // prevent form submit
            const tfBtn = document.getElementById('tfBtn');
            $.ajax({
                url: 'api/transfer',
                type: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                
                success: function(data){
                    console.log(data);
                    let r = JSON.parse(data);
                    tfBtn.setAttribute('disabled', 'true');
                    tfBtn.innerHTML = 'Processing, please wait...';
                    if(r.status == true){
                        tfBtn.setAttribute('disabled', 'true');
                        tfBtn.innerHTML = 'Processing, please wait...';
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-check-circle"></span> ' + r.response,
                    
                        });
                        setTimeout(() => {window.location.replace('./coins?coin=' + r.response.coin)},  3000);  // redirect to chat page after 3 seconds
                    
                    }
                    if(r.status == false){
                        jSuites.notification({

                            error: 1,
                    
                            name: 'Notification',
                    
                            message: '<span class="fa fa-exclamation-triangle"></span> ' + r.response,
                    
                        });
                    }
                }
            })
        });
    });
}
withdraw();