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

<h1>  Webinar &quot;Charter &quot;Special</h1>

<h2><strong>Join Social Cash &quot;Charter Member&quot; Offer</strong></h2>
<h2>* Important! - This is Program is in <span class="highlight"><strong>Early Release for Charter </strong></span>Memberships only. This means you are getting an<u> EXTREME Discount</u>. This means your getting in for the cost of the software only. While the training modules are completed.<br>
</h2>
<div id="order-box">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="601">
<tbody>
<tr>
<td width="300">
<h2 class="center">One payment of <br>
$497 Today
<br /><span style="font-size:12pt">plus optional $67/mo starting in 90 days</span>
</h2>
<p>&nbsp;</p>
<p class="center"><a href="http://home.rockstarpowersuite.com/?p=3340dbfc01"><img style="border: 0px solid; width: 300px; height: 103px;" alt="" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/addtocart-nopaypal-300px.png"></a></p>
</td>
<td width="2">
<div id="divider"></div>
</td>
<td width="299">
<h2><span class="center">$197 today, <br>
$197 in 30 days and <br>
$197 in another 30 Days</span>
<br /><span style="font-size:12pt">plus optional $67/mo starting in 90 days</span>
</h2>
<p class="center"><a href="http://home.rockstarpowersuite.com/?p=c3d508554b"><!--target="_blank"--><img style="border: 0px solid; width: 300px; height: 103px;" alt="" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/addtocart-nopaypal-300px.png"></a></p>
</td>
</tr>
</tbody>
</table>
</div>
<div style="text-align:center;">
  <br />
<div id="fastmoverends" style="color:#cc0000;font-size:32px;font-weight:bold;">Fast Mover Bonus Ends In:</div>
<div id="fancyCountdown"></div>
</div>
<script type="text/javascript">      
        $(document).ready(function(){
                  
          //init plugin
          $('#fancyCountdown').fancyCountdown({year:2012, month:10, day:10, hour:23, minute:59, second:59, timezone:-7, digitUnitHeight:80, autoStart:true, callback:targetReached, digits:{days:true,hours:true,minutes:true,seconds:true}, fillColor:'#cc0000', bottomDigitOffset: 28});
            
      function targetReached() {
        $('#fastmoverends').hide();
        $('#fancyCountdown').hide();
        $('#fastmover').hide();
        $('#fastactionheadline').hide();
        $('#fastmover2').hide();
        $("a[href='http://home.rockstarpowersuite.com/?p=3340dbfc01']").attr('href', 'http://home.rockstarpowersuite.com/?p=f1b62afe90')
        };
      
      //preview
      var cp = $.farbtastic('#colorPicker', function(){$.fancyCountdown.fillColor(this.color)});    
        cp.setColor('#cc0000');
      
      $('#year').val(2012);
      $('#month').val(9);
      $('#day').val(5);
      $('#hour').val(15);
      $('#minute').val(30);
      $('#second').val(0);
      $('#timezone').val(-5);
      
      $('#set').click(function(){
        $.fancyCountdown.timezone($('#timezone').val());
        $.fancyCountdown.targetDate($('#year').val(), $('#month').val(), $('#day').val(), $('#hour').val(), $('#minute').val(), $('#second').val());    
      });
      
      
        });    
    </script>
<div id="divider"></div>
<h2><span class="highlight">Here's what you'll
receive</span></h2>
<div id="divider"></div>
<div id="product-left">
<h3>Desktop software and Credits  for 7 Social Packs you can resell ($297.00 Value)<img id="bridge_page_05" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/bridge-page_05.jpg" width="756" height="288" alt="" /></h3>
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
<div id="fastmover">
<div id="product-left">
<h3><span style="color:#cc0000;">FAST MOVER BONUS - DOUBLE SOCIAL PACKS</span><br /> 7 Addtional Social Packs you can resell ($297.00 Value)<img id="bridge_page_05" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/bridge-page_05.jpg" width="756" height="288" alt="" /></h3>
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
<table align="center" border="0" cellpadding="5" cellspacing="0" width="650">
        <tbody><tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td width="465"><strong>Credit for 7 Social Packs</strong></td>
          <td width="120"><strong>$297.00 </strong></td>
    </tr>
    <tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td width="465"><strong>White Label Webinar Lead System</strong></td>
          <td width="120"><strong>$97.00/month </strong></td>
    </tr>
    <tr> 
          <td align="left" valign="top" width="35"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td width="465"><strong>Social Spy Tool</strong></td>
          <td width="120"><strong>$97.00/month </strong></td>
    </tr>
        
        <tr> 
          <td align="left" valign="top"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/checkbox_1.jpg" height="35" width="35"></td>
          <td><strong>3 Training Modules</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle"><img src="tick.jpg" alt="" height="15" width="15"> Quickstart Social Packs</td>
          <td><strong>$995.00 </strong></td>
    </tr>
      <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle"><img src="tick.jpg" alt="" height="15" width="15"> Creating Proof &amp; Credibility</td>
          <td><strong>$995.00 </strong></td>
    </tr>
      <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="left" valign="middle"><img src="tick.jpg" alt="" height="15" width="15"> Advanced Social Packs Marketing</td>
          <td><strong>$995.00 </strong></td>
    </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><strong style="font-size: 30px;"><u>Total Real World Value: </u></strong></td>
        <td><strong style="font-size: 30px;">$3,576.00<u> </u></strong></td>
      </tr>
  </tbody></table>
<p>&nbsp;</p>
<h3 class="highlight" style="color: rgb(204, 0, 0);">Today Only:<br>
  Get the Complete System for  90% OFF</h3>

<h3 style="font-size: 40px;">8 HUGE BONUSES</h3>


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
"Advanced Income Growth"  </h3>
<p style="font-size: 22px;"><strong>Learn how to add recurring revenues and turn 4-figure clients into 5-figures.</strong><br><br>
Follow along as we uncover the most profitable add-on services and programs to your business. These strategies are built upon the exact methods used by Robert in his  marketing business.</p>
<h2>($995.00 Value)</h2>
</div>

<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 3</span><br>
&quot;Client Attraction Systems&quot;</h3>
<p style="font-size: 22px;">Uncover the best ways to get customers and sell your social packs with nearly zero resistance. Everything from remote selling to webinar systems will be covered in this exclusive training.</p>
<h2>($995.00 Value)</h2>
</div>

<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 4</span><br>
“Black OPs NLP Training&quot;</h3>
<p style="font-size: 22px;">
Learn the art and science behind persuation and influence with this insider look at persuasive communications. After this 4-part training program you will know exactly how to get what you want out of any conversation.
 
</p>
<h2>($97.00 Value)</h2>
</div>

<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 5</span><br> 
&quot; Contract templates &amp; Proposals&quot;
</h3>
<p style="font-size: 22px;">Leverage the same proposal structure and templates proven to maximize your earnings in every client scenario. Everything from recurring prcing structure to deal presentation has been developed here.</p>
<p style="font-size: 22px;"><font size="-1">*please consult your own legal council before using these documents in your business.</font>  
  
</p>
<h2>($799.00 Value)</h2>
</div>

<div id="divider"></div>

<div id="product-left">
<h3><span style="background-color: rgb(255, 255, 0); color: rgb(204, 0, 0);">Bonus # 6</span><br>
Small Group Facebook Mastermind </h3>

<h2>($499.00 Value)</h2>
</div>

<div id="divider"></div>
<div id="divider"></div>
<p style="font-size: 36px; color: rgb(22, 65, 122);" align="right"><strong>Total Real World Value: $4,380.00<!--12,549.00--></strong></p>
<h3 style="font-size: 40px;">&nbsp;</h3>
<div id="fastactionheadline">
<h3 style="font-size: 40px;"><span class="highlight">Fast Action Bonuses</span></h3>
</div>
<div id="divider"></div>
<div id="fastmover2">
<div id="product-left">
  <h3>Limited Fast Action Bonus<br>
  <span style="color: rgb(0, 0, 0);"><u>additional</u> Credits for 7 MORE Social Packs </span><span style="color: rgb(0, 0, 0);">( $297.00 Value)</span></h3>
<p>The Standard<strong> Package </strong>includes credits for 7 social packs. Buy now and we will DOUBLE the number of social packs included.</p>
<p><strong>This is your one time opportunity to get an additional 7 social packs which gives you double the income potential just for joining today.</strong></p>
<p>You can Build - Demo - Create more social packs to sell for Profit.</p>
<p>This is a very special, LIMITED OFFER.</p>
<p>After today, additional credits will be available for $297 for 7 social packs.</p>
<p>If you sell all 7, that's nearly $7,000 additional profit</p>
<p>Make sure you are one of the first  to take advantage of this, so you can take double your credits now!</p>
<p>With this incredible bonus, you will have more credits for 7 additional Social Packs in the RPS software platform. Create them and   sell for $500 - $900 and up.  </p>
</div>

<div id="divider"></div>



<h3><em>Total Package + Fast Action Value: $7,959.00<!--15,546.00--></em></h3>
</div>
<p>&nbsp;</p>
<div id="guarantee-box">
<h2><strong>Your Money Back Guarantee</strong>
<p style="font-size: 16px; text-transform: none;" align="left">If you only sell 1 social pack, you make your <strong>entire investment back</strong> which essentially gets you this system and software for free <br><br>
If you sell the 7 social packs you have licenses for, you make all your money back and nice profit for yourself.
</p><span class="center"><img src="https://s3.amazonaws.com/oo-scr/bridgepage/images/guarantee2000.gif" height="270" width="400"></span></h2>
<p>You'll gain access to <strong>EVERYTHING</strong>

I've outlined above so you can "kick the tires" and make sure it's
right for you.</p>
<p>If you are not thrilled with the Rockstar Powersuite and Social Cash Rockstar Training for ANY reason, within 30 days, you can call the customer service department and you will get a complete 100% refund of any monies that you've paid.</p>
</div>

<h2>&nbsp;</h2>
<h2>Choose <u>one</u> of the following options </h2>
<div id="order-box">
<table align="center" border="0" cellpadding="0" cellspacing="0" width="601">
<tbody>
<tr>
<td width="300">
<h2 class="center">One payment of <br>
$497 Today
<br /><span style="font-size:12pt">plus optional $67/mo starting in 90 days</span>
</h2>
<p>&nbsp;</p>
<p class="center"><a href="http://home.rockstarpowersuite.com/?p=3340dbfc01"><img style="border: 0px solid; width: 300px; height: 103px;" alt="" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/addtocart-nopaypal-300px.png"></a></p>
</td>
<td width="2">
<div id="divider"></div>
</td>
<td width="299">
<h2><span class="center">$197 today, <br>
$197 in 30 days and <br>
$197 in another 30 Days</span>
<br /><span style="font-size:12pt">plus optional $67/mo starting in 90 days</span>
</h2>
<p class="center"><a href="http://home.rockstarpowersuite.com/?p=c3d508554b"><!--target="_blank"--><img style="border: 0px solid; width: 300px; height: 103px;" alt="" src="https://s3.amazonaws.com/oo-scr/bridgepage/images/addtocart-nopaypal-300px.png"></a></p>
</td>
</tr>
</tbody>
</table>
</div>
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
