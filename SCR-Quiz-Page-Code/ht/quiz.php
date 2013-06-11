<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="generator" content="WordPress 3.4.1" />
<title>Webinar Quiz</title>
<meta name="description" content="" />
<!-- CSS -->
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/css/reset.css" type="text/css" />
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/style.css" type="text/css" />
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/css/custom.css" type="text/css" />
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/css/tipsy.css" type="text/css" />
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/css/superfish.css" type="text/css" />
<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/fancybox/jquery.fancybox-1.3.1.css" type="text/css" />
<!--[if IE]>
<script src="http://localnichespy.com/wp-content/themes/Phenomenon/js/html5.js"></script>
<![endif]-->
<!--[if lt IE 8]>
	<link rel="stylesheet" href="http://localnichespy.com/wp-content/themes/Phenomenon/css/ie7.css">
<![endif]-->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 




    <!-- Meta tags added by Robots Meta: http://yoast.com/wordpress/meta-robots-wordpress-plugin/ -->
<meta name="robots" content="index,nofollow" />


<script type="text/javascript">
    var sarray = new Array();
    sarray[0] = "question1";
    sarray[1] = "question2";
    sarray[2] = "question3";
    sarray[3] = "question4";
    sarray[4] = "question5";
    sarray[5] = "question6";
    sarray[6] = "question7";
    sarray[7] = "question8";
    sarray[8] = "question9";


    var curInd = 0;

    function shownextquestion(){
      var nextquestion = document.getElementById(sarray[curInd + 1]);
      var curquestion = document.getElementById(sarray[curInd]);
      $(curquestion).fadeOut(100);
      $(curquestion).removeClass("quizquestionvisible").addClass("quizquestionhidden");
      $(nextquestion).fadeIn(2000);
      $(nextquestion).removeClass("quizquestionhidden").addClass("quizquestionvisible");
      
      curInd = curInd + 1;
    }

</script>

<script>
jQuery(document).ready(function() {
    jQuery('#slider').cycle({
		pager:  '#slider-nav',
		easing: 'easeOutCubic',
		timeout: 4000,
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
</script>
<style type="text/css"> 
.styled-button-1 {
  -webkit-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
  -moz-box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
  box-shadow:rgba(0,0,0,0.2) 0 1px 0 0;
  color:#333;
  background-color:#FA2;
  border-radius:5px;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  border:none;
  font-family:'Helvetica Neue',Arial,sans-serif;
  font-size:16px;
  font-weight:700;
  height:32px;
  padding:4px 16px;
  text-shadow:#FE6 0 1px 0
}

input.styled-button-1:hover{
      cursor: hand;
  }
</style>
<style type="text/css">
    .quizquestionvisible{
            display: block;
            width:700px;
            margin:auto;
            background-color:white;
            font-size:14px;
            padding:20px;
    }
    .quizquestionhidden{
            display: none;
            width:700px;
            margin:auto;
    }
    .nextbutton{

      margin:auto;
      width:110px;
    }

    .infusion-submit{

      margin:auto;
      width:185px;
    }
    input[type=submit] {
      background: transparent url("http://socialcashrockstar.net/software/images/blue_download_now.png") 0 0 no-repeat;
      font-weight: bold;
      display: inline-block;
      text-align: center;
      cursor: pointer;
      height: 59px; /* height of the background image */
      width: 165px; /* width of the background image */
      border: 5px solid #fff;
      border-radius: 1em;

    }

    input[type=submit]:hover {
        border-color: #f90;
    }


</style>


</head>
<body id="sub-page">
<!-- site-wrapper START here -->
<div id="site-wrapper">
  <!-- header START here -->
            <header>
              <!-- container START here -->
              <div class="container">
                <!-- logo START here -->
                        <div id="logo">
                  	
                        	  <h1>
                                      
                  			                  <img src="http://localnichespy.com/wp-content/uploads/2011/04/niche-logo.png" alt="Local Niche Spy" />
                                          
                            </h1>
                        </div>
                <!-- logo END here -->
                      <!-- navigation START here -->
          	 	  <!-- navigation END here -->
                        <div id="pagename">
                          <div class="inside">
                            <center><h2>Answer the Quiz Questions Below to Receive Your Free Platinum Plus Account</h2></center>
                          </div>
                        </div>
              </div>
              <!-- container END here -->
            </header>
  <!-- header END here -->
  <!-- content START here -->
            <div id="content">
              <!-- container START here -->
                          <div class="container">
                            <!-- full-width START here -->
                                      <div class="full-width">
                                          <div id="question1" class="quizquestionvisible" >
                                          <div class="questiontext">
                                                  1)  In the next twelve months, 46 percent of small business decision-makers expect to have a _________ presence.<br /><br />
                                          </div>
                                          <div class="questionanswers">
                                                  <input type="radio" name="presence" value="socialmedia">&nbsp;&nbsp;Social Media<br />
                                                  <input type="radio" name="presence" value="Website">&nbsp;&nbsp;Website

                                          </div>
                                          <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                      </div>

                                      <div id="question2" class="quizquestionhidden">
                                          <div class="questiontext">
                                                  2) Social Packs can be sold as two (2) packs, four (4) packs and _______ packs?<br /><br />
                                          </div>
                                          <div class="questionanswers">
                                                  <input type="radio" name="packs" value="socialmedia">&nbsp;&nbsp;five (5)<br />
                                                  <input type="radio" name="packs" value="Website">&nbsp;&nbsp;six (6)

                                          </div>
                                          <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                      </div>

                                      <div id="question3" class="quizquestionhidden">
                                          <div class="questiontext">
                                                  3) Using the social cash software a complete social pack can be built in ____ minutes.<br /><br />
                                          </div>
                                          <div class="questionanswers">
                                                  <input type="radio" name="minutes" value="socialmedia">&nbsp;&nbsp;15<br />
                                                  <input type="radio" name="minutes" value="Website">&nbsp;&nbsp;10

                                          </div>
                                          <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                      </div>

                                      <div id="question4" class="quizquestionhidden">
                                          <div class="questiontext">
                                                  4) What is the suggested price to sell a 6 pack? (twitter, youtube, facebook, linkedin, G+, Pinterest)<br /><br />
                                          </div>
                                          <div class="questionanswers">
                                                  <input type="radio" name="price" value="socialmedia">&nbsp;&nbsp;$997<br />
                                                  <input type="radio" name="price" value="Website">&nbsp;&nbsp;$1997

                                          </div>
                                          <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                      </div>

                                      <div id="question5" class="quizquestionhidden">
                                          <div class="questiontext">
                                                  5) The suggested monthly fee for a social newsletter is _______?<br /><br />
                                          </div>
                                          <div class="questionanswers">
                                                  <input type="radio" name="newsletter" value="socialmedia">&nbsp;&nbsp;$600<br />
                                                  <input type="radio" name="newsletter" value="Website">&nbsp;&nbsp;$450

                                          </div>
                                          <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                      </div>

                                      <form accept-charset="UTF-8" action="https://lifehelp.infusionsoft.com/app/form/process/02b21ff5a0c73ff846ca9133db3589e6" class="infusion-form" method="POST">
                                          <input name="inf_form_xid" type="hidden" value="02b21ff5a0c73ff846ca9133db3589e6" />
                                          <input name="inf_form_name" type="hidden" value="Download Niche Spy" />
                                          <input name="infusionsoft_version" type="hidden" value="1.27.3.48" />
                                          <div id="question8" class="quizquestionhidden">
                                              <div class="questiontext">
                                                  Please Enter Your Information Below for Your Software License<br /><br />
                                              </div>
                                              <div class="questionanswers" style="width:500px;margin:auto;">
                                                  <div class="infusion-field">
                                                      <label for="inf_field_FirstName">First Name *</label><br />
                                                      <input class="infusion-field-input-container" id="inf_field_FirstName" name="inf_field_FirstName" type="text" width="300px" />
                                                  </div>
                                                  <div class="infusion-field">
                                                      <label for="inf_field_LastName">Last Name *</label><br />
                                                      <input class="infusion-field-input-container" id="inf_field_LastName" name="inf_field_LastName" type="text" width="300px" />
                                                  </div>
                                                  <div class="infusion-field">
                                                      <label for="inf_field_Email">Email *</label><br />
                                                      <input class="infusion-field-input-container" id="inf_field_Email" name="inf_field_Email" type="text" width="300px" />
                                                  </div>
                                              </div>
                                              <div class="nextbutton">
                                                <br /><br />
                                                <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                              </div>
                                              
                                          </div>
                                          <div id="question9" class="quizquestionhidden">
                                            <div class="questiontext">
                                                  Please Finish Entering Your Information Below and Click the Download Button to Instantly Access Your Software<br /><br />
                                              </div>
                                              <div class="questionanswers" style="width:500px;margin:auto;">
                                                <div class="infusion-field">
                                                    <label for="inf_field_Phone1">Phone 1 *</label><br />
                                                    <input class="infusion-field-input-container" id="inf_field_Phone1" name="inf_field_Phone1" type="text" width="300px" />
                                                </div>
                                                <div class="infusion-field">
                                                    <label for="inf_field_Address2Street1">Shipping Street Address 1 *</label><br />
                                                    <input class="infusion-field-input-container" id="inf_field_Address2Street1" name="inf_field_Address2Street1" type="text" width="300px" />
                                                </div>
                                                <div class="infusion-field">
                                                    <label for="inf_field_City2">Shipping City *</label><br />
                                                    <input class="infusion-field-input-container" id="inf_field_City2" name="inf_field_City2" type="text" width="300px" />
                                                </div>
                                                <div class="infusion-field">
                                                    <label for="inf_field_State2">Shipping State *</label><br />
                                                    <input class="infusion-field-input-container" id="inf_field_State2" name="inf_field_State2" type="text" width="300px" />
                                                </div>
                                                <div class="infusion-field">
                                                    <label for="inf_field_PostalCode2">Shipping Postal Code *</label><br />
                                                    <input class="infusion-field-input-container" id="inf_field_PostalCode2" name="inf_field_PostalCode2" type="text" width="300px" />
                                                </div>
                                                <div class="infusion-field">
                                                    <label for="inf_field_Country2">Shipping Country *</label><br />
                                                    <select id="inf_field_Country2" name="inf_field_Country2"><option value="">Please select one</option><option value="Afghanistan">Afghanistan</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option><option value="Ãland Islands">Ãland Islands</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territory">British Indian Ocean Territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Democratic Republic Of Congo">Democratic Republic Of Congo</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="CÃ´te D'Ivoire">CÃ´te D'Ivoire</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guernsey">Guernsey</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Isle of Man">Isle of Man</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jersey">Jersey</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="North Korea">North Korea</option><option value="South Korea">South Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Republic of Macedonia">Republic of Macedonia</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Federated States of Micronesia">Federated States of Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestine">Palestine</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="RÃ©union">RÃ©union</option><option value="St. BarthÃ©lemy">St. BarthÃ©lemy</option><option value="St. Helena, Ascension and Tristan Da Cunha">St. Helena, Ascension and Tristan Da Cunha</option><option value="St. Kitts And Nevis">St. Kitts And Nevis</option><option value="St. Lucia">St. Lucia</option><option value="St. Martin">St. Martin</option><option value="St. Pierre And Miquelon">St. Pierre And Miquelon</option><option value="St. Vincent And The Grenedines">St. Vincent And The Grenedines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard And Jan Mayen">Svalbard And Jan Mayen</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syrian Arab Republic">Syrian Arab Republic</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Timor-Leste">Timor-Leste</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="United States">United States</option><option value="US Minor Outlying Islands">US Minor Outlying Islands</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Venezuela">Venezuela</option><option value="Viet Nam">Viet Nam</option><option value="Virgin Islands, British">Virgin Islands, British</option><option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option><option value="Wallis and Futuna">Wallis and Futuna</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
                                                </div>
                                                  <div class="infusion-submit">
                                                    <br /><br />
                                                    <input type="submit" value="" />
                                                  </div>
                                              </div>
                                          </div>
                                          <div id="question6" class="quizquestionhidden">
                                              <div class="questiontext">
                                                6) I plan on applying for the program and I am looking forward to working with you:<br /><br />
                                              </div>
                                              <div class="questionanswers">
                                                      <input id="inf_custom_ApplyingForProgram_1" name="inf_custom_ApplyingForProgram" type="radio" value="1" />&nbsp;&nbsp;Yes<br />
                                                      <input id="inf_custom_ApplyingForProgram_0" name="inf_custom_ApplyingForProgram" type="radio" value="0" />&nbsp;&nbsp;No
                                              </div>
                                              <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                          </div>
                                          <div id="question7" class="quizquestionhidden">
                                              <div class="questiontext">
                                                7) What aspects of the webinar training could be improved?<br /><br />
                                              </div>  
                                              <div class="questionanswers">
                                                  <textarea cols="80" id="inf_custom_WebinarFeedback" name="inf_custom_WebinarFeedback" rows="8"></textarea>
                                              </div>
                                              <div class="nextbutton">
                                              <img class="nextbuttonimage" src="images/button_next_blue.jpg" width="95px" height="46px" onclick="shownextquestion();" onmouseout="this.src='images/button_next_blue.jpg';this.style.cursor = 'arrow';" onmouseover="this.src='images/button_next_blueh.jpg';this.style.cursor = 'pointer';" />
                                          </div>
                                            </div>


                                          
                                      </form>











                                          <br /><br />
                                            <center>
                                          <strong> ***NOTE:  This software requires adobe air. Please <a href="http://get.adobe.com/air/">click here to download and install adobe air first</a> </strong>
                                          
                                        </center>
                                      </div>

                                      
                                      
                                     
                      		</div>
          	</div>
</div>

<!-- site-wrapper END here -->
<!-- footer START here -->
<footer>
  <!-- container START here -->
  <div class="container">
       <div id="footer-colums"></div>
  </div>

  <!-- bottom-footer START here -->
  <div id="bottom-footer">
    <!-- container START here -->
    <div class="container">
      <p ><center>Copyright 2012 All rights reserved</center></p>
    </div>
    <!-- container END here -->
  </div>
  <!-- bottom-footer END here -->
</footer>
<!-- footer END here -->






<script> Cufon.now(); </script>
<script src="http://localnichespy.com/wp-content/themes/Phenomenon/js/init_form.js"></script>
<script type='text/javascript' src='http://localnichespy.com/wp-content/uploads/shadowbox-js/8eb7b08474f603b1c409555d2a3da404.js?ver=3.0.3'></script>

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