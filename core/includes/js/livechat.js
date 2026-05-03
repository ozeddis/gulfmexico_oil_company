/*
smartsupp live chat
v 1.0
*/

var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd6fa525e09751bad6ee60225b711e532123d4aca';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);

function getOauthData(){
    $.ajax({
        url: 'cloud/includes/firebase',
        type: 'POST',
        dataType: "json",
        
        success: function (data) {
            
            const googleOAuth = document.getElementById('Oauth');
            if(data.status == 'success'){
                googleOAuth.setAttribute('href', data.value);
                console.log('OAuth Data link created');
            }else{
                googleOAuth.setAttribute('disabled', 'true');
            }
            
        },
        error: function(){
            console.error(data);
        }
    });
}
getOauthData();