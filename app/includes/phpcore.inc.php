<?php
  try{
    date_default_timezone_set("America/New_York");
    $server = "localhost";
    $user = "root";
    $pwd = '';
    $db = "tripod";
    $connect = mysqli_connect($server, $user, $pwd, $db);

    $conn = new PDO("mysql:host=$server; dbname=$db; charset=UTF8", $user, $pwd);
    $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);

    if($conn == TRUE){
      session_start();
      
    }else{
      echo "Server connection Failed";
    }
  }catch(PDOexception $error){
    echo $error->getMessage();
  }
?>
 <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '7ba5262d8b237e452b93155899460eb0407f1e47';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
 