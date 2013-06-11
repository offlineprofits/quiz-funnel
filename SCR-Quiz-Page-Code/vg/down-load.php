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
  <img id="bridge_page_02" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/bridge-page_02.jpg" width="774" height="144" alt="" />
  <br>

</center>

<h1>  Special $77 &quot;KickStarter &quot;Offer</h1>

<h2><strong>Join Social Cash &quot;Kick Starter&quot; Offer</strong></h2>
<h2>* You have indicated that right now, money is tight but that you <span class="highlight"><strong>love what you saw</strong></span> on the webinar. <br /><br />We want to help you get started without being a burden on your finances, so we are offering you an <u> EXTREME Discount</u>. <br /><br />You can access everything that you need to be successful with Social Cash Rockstar for just a 1 time payment of <span style="text-decoration:line-through;color:#ff0000;">$97</span> <strong>$77</strong> Today.<br>
</h2><br /><br />
<p><code><style type="text/css">
  @import url("http://www.socialcashrockstar.net/software/dd/css/pricetable.css");
</style>
  
<div class="pricetable pricingtable69">
  <div class="pricetable-inner">
                <div class="pricetable-column " style="width:25%">
      <div class="pricetable-column-wall">
        <div class="pricetable-header">
          <div class="pricetable-fld-name">Package </div>
          <div class="pricetable-header-inner">
            <div class="pricetable-fld-price"><span class="cur"></span></div>
            <p>Payment options</p>
                      </div>
        </div>
        <ul class="features">
                             
                    <li >
                        Total Social Packs                      </li>
                    <li >
                        Social Pack Software                      </li>
                    <li >
                        Spy Tool Software                      </li>
                    <li >
                        Webinar System                      </li>
                    <li >
                        Mod 1- Quick Start Training                      </li>
                    <li >
                        Mod 2- Credibilty Training                      </li>
                    <li >
                        Mod 3- Social Pack Training                      </li>
                    <li >
                        Bonus 1 - Price Strategy                      </li>
                    
                    <li >
                        Bonus 2 - Pro Website                      </li>
                            </ul>
        
              </div>
    </div>
          <div class="pricetable-column " style="width:25%">
      <div class="pricetable-column-wall">
        <div class="pricetable-header">
          <div class="pricetable-fld-name">Kick Starter Edition</div>
          <div class="pricetable-header-inner">
            <div class="pricetable-fld-price"><span class="cur"></span>$77</div>
            <p>Save $20 Today - Normally <span style="text-decoration:line-through;">$97</span></p>
                      </div>
        </div>
        <ul class="features">
                              
                    <li >
                        (2) Two                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li class="hasToolTip">
                        &nbsp;<div class='yn_basic yi'></div>                        <small>60 day Trial Included</small>
                      </li>
                    <li class="hasToolTip">
                        &nbsp;<div class='yn_basic yi'></div>                        <small>60 day Trial Included</small>
                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                            </ul>
        
              </div>
    </div>
          
          
        <div class="pricetable-clear"></div>
  </div>
  <a href="http://home.rockstarpowersuite.com/?p=8723effb20" ><img src="images/buybutton.jpg" width="481px" height="371px" border="0px"></a>

</div>
</code></p>                
<center>
 <br /><br />
<a href="http://socialcashrockstar.com/vegas" target="_blank" style="font-size:18px;">If you prefer to buy one of the full offer options, click here</a>
<br /><br />
</center>
<div id="divider"></div>
<h2><span class="highlight">Here's what you'll
receive</span></h2>
<div id="divider"></div>
<div id="product-left">
<h3>Desktop software and Credits  for 2 Social Packs you can resell ($100.00 Value)<img id="bridge_page_05" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/bridge-page_05.jpg" width="756" height="288" alt="" /></h3>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="650">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Setup your own Social Packs to build your own personal brand</td>
        </tr>
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Build Social Packs for your clients or business contacts and keep 100% of the profit</strong></td>
        </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" alt="" width="35" height="35" /></td>
          <td>Each Social Pack Includes - Twitter, Youtube, Facebook and Google + Templates</td>
        </tr>
        </tbody></table>
        <p class="center">* Windows desktop based application</p>
</div>

<div id="divider"></div>
<div id="product-left">
<h3>White Label Webinar Lead System<br /><br /><img src="images/branded-webinar-example-small.png" width="175" height="242" alt="" />&nbsp;&nbsp;&nbsp;<img src="images/member-interface-homepage-small.png" width="200" height="179" alt="" />&nbsp;&nbsp;&nbsp;<img src="images/webinar-scheduler-small.png" width="175" height="225" alt="" /></h3>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Auto-pilot System</td>
        </tr>
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Sell Without Selling</strong></td>
        </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" alt="" width="35" height="35" /></td>
          <td>Preloaded Webinars</td>
        </tr>
        </tbody></table>
        <h3>($97.00/month Value)</h3>
</div>
<div id="divider"></div>
<div id="product-left">
<h3>Social Spy Tool<br /><br /><img src="images/SocialSpyTool-300.jpg" width="300" height="355" alt="" />&nbsp;&nbsp;&nbsp;<img src="images/spy-tool-homepage-small.png" width="275" height="345" alt="" /></h3>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="350">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Find Niche Prospects</td>
        </tr>
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Targets Needing Help</strong></td>
        </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" alt="" width="35" height="35" /></td>
          <td>Contact Online & Leverage Proof</td>
        </tr>
        </tbody></table>
        <h3>($97.00/month Value)</h3>
</div>
<div id="divider"></div>
<div id="product-center">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Training Module # 1</span><br>
  <span style="color: rgb(0, 0, 0);">“Social Pack Quickstart”</span></h3>
  <table align="center" border="0" cellpadding="5" cellspacing="0" width="650">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Target markets and niche groups most interested in Social Packs</td>
        </tr>
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>You will discover how to create  a push-button social pack quickly and easily</strong></td>
        </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>The Social Cash Map Strategy, the complete overview to the opportunity</td>
        </tr>
    </tbody></table>
<h3>($995.00 Value)</h3>
<p class="center">&nbsp;</p>

</div>

<div id="divider"></div>
<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Training Module # 2</span><br>
  <span style="color: rgb(0, 0, 0);">“Creating Proof and Credibility in Your Market”</span></h3>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="650">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>A winning approach to positioning yourself and creating the &quot;proof&quot; you need to build instant credibility.</strong></td>
        </tr>
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Setting up your sales funnel, money collection and more</td>
        </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Learn how to create more new business than you can personally handle with unsing the LI principle.</strong></td>
        </tr>
        </tbody></table>
       <h3>($995.00 Value)</h3>
</div>

<div id="divider"></div>
<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Training Module # 3</span><br>
  <span style="color: rgb(0, 0, 0);">“Social Packs Unleashed Advanced Optimization and Marketing”</span></h3>
<table align="center" border="0" cellpadding="5" cellspacing="0" width="650">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Advanced Social Pack creation for higher priced offers and branding</strong></td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td>Complete Social Pack system, creation, data collection and optimization. Learn to deliver a Social Media presence that your clients will RAVE about.</td>
        </tr>
        <tr>
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>Connecting the dots between social media, SEO, Branding and Social Packs. Learn &quot;insider secrets&quot;  to creating a successful brand that also &quot;gets found&quot;.</strong></td>
        </tr>
        </tbody></table>
       <h3>($995.00 Value)</h3>
</div>

<p>&nbsp;</p>

<h3 style="font-size: 40px;">2 HUGE BONUSES</h3>


<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 1</span><br>
Pricing Strategies</h3>
<p style="font-size: 22px;"><span id="result_box" xml:lang="en" lang="en">This exclusive bonus will give you the detailed breakdown and strategies needed to price your social packs for maximum sales. Additionally, we will cover powerful add-on sales and offers you can provide clients to increase your revenue. A live presentation from Robert on pricing strategies and interview with Jason Marrs</span>, the author of the NO B.S. Price Strategy.</p>

<h2>($995 Value)</h2>
</div>


<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 2</span><br>
"Professional Website"  </h3>
<p style="font-size: 22px;"><strong>You will get the professionally designed website seen in the webinar.</strong><br><br>
You don't have to worry about getting your own site done first, just go out and start selling social packs using our professionally designed wordpress website.  Customize it with your contact information and start showing it off!</p>
<h2>($995.00 Value)</h2>
</div>




<p>&nbsp;</p>
<div id="guarantee-box">
<h2><strong>Your Money Back Guarantee</strong>
<p style="font-size: 16px; text-transform: none;" align="left">If you only sell 1 social pack, you make your <strong>entire investment back plus profit</strong> which essentially gets you this system and software for free <br><br>

</p><span class="center"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/guarantee2000.gif" height="270" width="400"></span></h2>
<p>You'll gain access to <strong>EVERYTHING</strong>

I've outlined above so you can "kick the tires" and make sure it's
right for you.</p>
<p>If you are not thrilled with Social Cash Rockstar for ANY reason, within 30 days, you can call the customer service department and you will get a complete 100% refund of any monies that you've paid.</p>
</div>
<p><code><style type="text/css">
  @import url("http://www.socialcashrockstar.net/software/dd/css/pricetable.css");
</style>
  
<div class="pricetable pricingtable69">
  <div class="pricetable-inner">
                <div class="pricetable-column " style="width:25%">
      <div class="pricetable-column-wall">
        <div class="pricetable-header">
          <div class="pricetable-fld-name">Package </div>
          <div class="pricetable-header-inner">
            <div class="pricetable-fld-price"><span class="cur"></span></div>
            <p>Payment options</p>
                      </div>
        </div>
        <ul class="features">
                             
                    <li >
                        Total Social Packs                      </li>
                    <li >
                        Social Pack Software                      </li>
                    <li >
                        Spy Tool Software                      </li>
                    <li >
                        Webinar System                      </li>
                    <li >
                        Mod 1- Quick Start Training                      </li>
                    <li >
                        Mod 2- Credibilty Training                      </li>
                    <li >
                        Mod 3- Social Pack Training                      </li>
                    <li >
                        Bonus 1 - Price Strategy                      </li>
                    
                    <li >
                        Bonus 2 - Pro Website                      </li>
                            </ul>
        
              </div>
    </div>
          <div class="pricetable-column " style="width:25%">
      <div class="pricetable-column-wall">
        <div class="pricetable-header">
          <div class="pricetable-fld-name">Kick Starter Edition</div>
          <div class="pricetable-header-inner">
            <div class="pricetable-fld-price"><span class="cur"></span>$77</div>
            <p>Save $20 Today - Normally <span style="text-decoration:line-through;">$97</span></p>
                      </div>
        </div>
        <ul class="features">
                              
                    <li >
                        (2) Two                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li class="hasToolTip">
                        &nbsp;<div class='yn_basic yi'></div>                        <small>60 day Trial Included</small>
                      </li>
                    <li class="hasToolTip">
                        &nbsp;<div class='yn_basic yi'></div>                        <small>60 day Trial Included</small>
                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                    <li >
                        &nbsp;<div class='yn_basic yi'></div>                      </li>
                            </ul>
        
              </div>
    </div>
          
          
        <div class="pricetable-clear"></div>
  </div>
  <a href="http://home.rockstarpowersuite.com/?p=8723effb20" ><img src="images/buybutton.jpg" width="481px" height="371px" border="0px"></a>

</div>
</code></p>                
<center>
 <br /><br />
<a href="http://socialcashrockstar.com/vegas" target="_blank" style="font-size:18px;">If you prefer to buy one of the full offer options, click here</a>
<br /><br />
</center>


<hr width="100%">
<h6>&nbsp;</h6>
<div id="disclaimers"><div style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 11px;" align="center"><a href="http://socialcashrockstar.com/earnings-disclaimer/" target="_blank" style="color: rgb(0, 0, 255);">Disclaimer</a> | <a href="http://socialcashrockstar.com/terms/" target="_blank" style="color: rgb(0, 0, 255);">Terms of Use</a> | <a href="http://socialcashrockstar.com/privacy/" target="_blank" style="color: rgb(0, 0, 255);">Privacy Policy</a> 

</div>
<p style="font-family: Verdana,Arial,Helvetica,sans-serif; font-size: 12px;" align="center">Copyright © 2012 SocialCashRockstar.com . All Rights Reserved<br>


    </p>
</div>
</div>

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
