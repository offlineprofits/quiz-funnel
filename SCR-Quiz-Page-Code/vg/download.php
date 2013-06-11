<?php 

$fName = $_GET['inf_field_FirstName']; 
$lName = $_GET['inf_field_LastName']; 
$eMail = $_GET['inf_field_Email'];  
$clientID = $_GET['contactId'];



if (!empty($fName) && !empty($lName) && !empty($eMail) && !empty($clientID))
{
 
    //set POST variables
    $url = 'http://localnichespy.net/license/scr.php';
    $fields = array(
                'mode' => urlencode("payment"),
                'u_firstname' => urlencode($fName),
                'u_lastname' => urlencode($lName),
                'u_email' => urlencode($eMail),
                'id' => urlencode($clientID.'123')
               
            );

    //url-ify the data for the POST
    foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
    rtrim($fields_string, '&');

    //open connection
    $ch = curl_init();

    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, count($fields));
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link rel="stylesheet" type="text/css" href="css/jquery.fancyCountdown.css" />
<link href='http://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.fancyCountdown.js" type="text/javascript"></script>


<title>Webinar Special</title><!-- Start Visual Website Optimizer Code -->



<link rel="stylesheet" type="text/css" href="https://s3.amazonaws.com/oo-scr/bridgepage/images/index.css" media="all">
</head>
<body>




<div id="container">
<center>
  <div style="font-size:18px;font-weight:bold;background-color:yellow;">
    Your Local Niche Spy Software Account has been created.<br /><br />Your license key is <span style="color:#ff0000;"><?php echo $result; ?> </span>(Please write this key down)<br /><br />
    When registering be sure to select the 'Paid' option, not the 'Free' one, <br />since you have received a complimentary upgrade.
    <br /><br />
    <a href="http://localnichespy.com/newdownload">Click Here to Download</a>
  </div>


</center>


<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-34391947-1']);
  _gaq.push(['_setDomainName', 'socialcashrockstar.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
