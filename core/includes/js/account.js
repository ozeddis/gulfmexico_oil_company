function exchange(){
    $(document).ready(function(){
        $('#exchange').on('submit', function(event){
            event.preventDefault();
            var from = document.getElementById('from').value;
            var to = document.getElementById('to').value;
            var amountToSwap = document.getElementById('amountToSwap').value;
            
            $.ajax({
                url: './xchange.php',
                type: 'POST',
                data: {
                    from: from,
                    to: to,
                    amountToSwap: amountToSwap,
                },
                processData: false,
                contentType: false,


                success: function(data){
                    console.log(data)
                    let r = JSON.parse(data);
                    if(r.status == 'success'){ 
                        jSuites.notification({

                            success: 1,
                    
                            name: 'Notification',
                    
                            message: r.message,
                    
                        });
                        setTimeout(function(){
                            window.location.reload();
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
            });
        });
    });
}
exchange();