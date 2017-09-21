<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "webmaster@laidlawlayout.com";
     
    $email_subject = "Contact Form - LaidlawLayout.com";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');      
    }
     
    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>



<!DOCTYPE HTML>
<html><!-- InstanceBegin template="/Templates/laidlawlayout_main.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta name="keywords" content="Laidlaw Layout, web design, development, artwork" />
<meta name="author" content="Laidlaw Layout - Web Development" />
<meta name="description" content="David Laidlaw and Mavi Laidlaw - Professional Web Designers" />


<link rel="shortcut icon" href="/favicon.ico" >

<link href="stylesheets/print.css" rel="stylesheet" type="text/css" media="print" />


<!-- InstanceBeginEditable name="doctitle" -->
<title>Laidlaw Layout - Contact Success</title>
<!-- InstanceEndEditable -->

<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->

<meta http-equiv="Content-Type" content="width=device-width, initial-scale=1.0" />


<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Arimo|Asul' rel='stylesheet' type='text/css'>
    
	<!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="../css/ie.css" type="text/css" media="screen" /><![endif]-->

    
<!-- This is how we style it -->    
<link rel="stylesheet" type="text/css" href="stylesheets/stylesheet_main.css">



<link rel="stylesheet" type="text/css" href="stylesheets/slider.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="js/slider_script.js"></script>

<!--[if lte IE 7]>
<style type="text/css">
ul li{
	display:inline;
	/*float:left;*/
}
</style>
<![endif]-->



	<!--css3-mediaqueries-js - http://code.google.com/p/css3-mediaqueries-js/ - Enables media queries in some unsupported browsers-->
<script type="text/javascript" src="js/css3-mediaqueries.js"></script>




<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

</head>


<body onLoad="MM_preloadImages('images/HomeBtnO.png','images/PortfolioBtnO.png','images/AboutBtnO.png','images/ContactBtnO.png')">

<div class="container">

<!-- InstanceBeginRepeat name="Header" --><!-- InstanceBeginRepeatEntry -->
  <div class="header">
    <div class="logo"><a href="http://www.laidlawlayout.com"><img src="images/LL_HeaderLogo.png" alt="Laidlaw Layout" width="298" height="129" ></a>
    </div><!-- END of .logo -->
    
    <aside class="menu"><a href="http://www.laidlawlayout.com/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Home','','images/HomeBtnO.png',1)"><img src="images/HomeBtn.png" alt="Home" name="Home" width="81" height="52" border="0"></a><a href="http://www.laidlawlayout.com/portfolio.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Portfolio','','images/PortfolioBtnO.png',1)"><img src="images/PortfolioBtn.png" alt="Portfolio" name="Portfolio" width="136" height="52" border="0"></a><a href="http://www.laidlawlayout.com/about.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('About','','images/AboutBtnO.png',1)"><img src="images/AboutBtn.png" alt="About" name="About" width="90" height="52" border="0"></a><a href="http://www.laidlawlayout.com/contact.html" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Contact','','images/ContactBtnO.png',1)"><img src="images/ContactBtn.png" alt="Contact" name="Contact" width="127" height="52" border="0"></a>
      
    </aside><!-- END of .menu-->
    
  </div><!-- END of .header -->
<!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat -->



<!-- InstanceBeginEditable name="Content1" -->

<div class="content">
  <div class="row">
    <div class="eightcol">
    
      <div class="thank_you">
      	<h1>Thank you for contacting us!</h1>
      	<p>We will get back in touch with you shortly.</p>
      	<br>
      	<p>Warm Regards,</p>
      	<p><em>The Laidlaw Layout Team</em></p>
      </div>
    
    
    </div><!-- END of .eightcol -->
    
    
    
    <div class="fourcol last" style="padding-top:20px;">
      <h2>Contact us directly:</h2>
      <p><a href="mailto:webmaster@laidlawlayout.com"> webmaster@laidlawlayout.com</a>
      </p>
      <br>
       
        <iframe width="250" height="150" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Los+Angeles,+CA&amp;aq=0&amp;oq=los+angeles&amp;sll=34.203469,-118.515184&amp;sspn=0.015883,0.033023&amp;ie=UTF8&amp;hq=&amp;hnear=Los+Angeles,+California&amp;t=m&amp;ll=34.052091,-118.24379&amp;spn=0.113781,0.170975&amp;z=11&amp;iwloc=A&amp;output=embed"></iframe>
        
        <br>
        <br>
        
        <div class="social_links"> <!-- Social Media Buttons -->&nbsp;<a href="mailto:webmaster@laidlawlayout.com"><img src="images/icons/shine_25.png" width="48" height="48" alt="" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.facebook.com"><img src="images/icons/social_facebook_box_white.png" alt="" width="48" height="48" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="hhtp://www.plus.google.com"><img src="images/icons/social_google_box_white.png" alt="" swidth="48" height="48" border="0" /></a>&nbsp;&nbsp;&nbsp;<a href="http://www.twitter.com"><img src="images/icons/social_twitter_box_white.png" alt="" width="48" height="48" border="0" /></a>
         </div><!-- END of Social Media Buttons -->
        
        
    </div><!-- END of .fourcol -->
    
    
  </div><!-- END of .row -->
</div><!-- END of .content -->



<!-- InstanceEndEditable -->

<!-- InstanceBeginRepeat name="Footer" --><!-- InstanceBeginRepeatEntry -->
<div class="footer">
  <p><img src="images/SwirlLeft.png" width="79" height="14" alt="Laidlaw Layout swirl"> Copyright &copy; <a href="http://www.laidlawlayout.com">Laidlaw Layout</a> &nbsp;|&nbsp; All Rights Reserved. &nbsp;|&nbsp; <a href="sitemap.xml">Site Map</a> &nbsp;|&nbsp; <a href="http://www.laidlawlayout.com/contact.html">Contact</a>&nbsp;
  <img src="images/SwirlRight.png" width="79" height="14" alt="Laidlaw Layout swirl">
  
  </p>
  
</div><!-- END of .footer -->
<!-- InstanceEndRepeatEntry --><!-- InstanceEndRepeat -->

</div><!-- END of .container -->
</body>
<!-- InstanceEnd --></html>


<?php
}
die();
?>