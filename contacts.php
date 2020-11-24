<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "starkanonimity511@gmail.com";
    $email_subject = "New form submissions ";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }
    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['contact-message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['contact-message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "contact-message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

}
?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Contacts</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/sup.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,700%7CPoppins:300,400,500,700,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <style media="screen">
  #fcf-form {
      display:block;
  }

  .fcf-body {
      margin: 0;
      font-family: -apple-system, Arial, sans-serif;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #212529;
      text-align: left;
      background-color: #fff;
      padding: 30px;
      padding-bottom: 10px;
      border: 1px solid #ced4da;
      border-radius: 0.25rem;
      max-width: 100%;
  }

  .fcf-form-group {
      margin-bottom: 1rem;
  }
  .fcf-input-group {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
  }

  .fcf-form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    outline: none;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .fcf-form-control:focus {
    border: 1px solid #313131;
  }

  select.fcf-form-control[size], select.fcf-form-control[multiple] {
    height: auto;
  }

  textarea.fcf-form-control {
    font-family: -apple-system, Arial, sans-serif;
    height: auto;
  }

  label.fcf-label {
    display: inline-block;
    margin-bottom: 0.5rem;
  }

  .fcf-credit {
    padding-top: 10px;
    font-size: 0.9rem;
    color: #545b62;
  }

  .fcf-credit a {
    color: #545b62;
    text-decoration: underline;
  }

  .fcf-credit a:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  .fcf-btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  @media (prefers-reduced-motion: reduce) {
    .fcf-btn {
        transition: none;
    }
  }

  .fcf-btn:hover {
    color: #212529;
    text-decoration: none;
  }

  .fcf-btn:focus, .fcf-btn.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .fcf-btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .fcf-btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }

  .fcf-btn-primary:focus, .fcf-btn-primary.focus {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
    box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.5);
  }

  .fcf-btn-lg, .fcf-btn-group-lg>.fcf-btn {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
  }

  .fcf-btn-block {
    display: block;
    width: 100%;
  }

  .fcf-btn-block+.fcf-btn-block {
    margin-top: 0.5rem;
  }

  input[type="submit"].fcf-btn-block, input[type="reset"].fcf-btn-block, input[type="button"].fcf-btn-block {
    width: 100%;
  }
  </style>
  <body>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
          <div class="cssload-speeding-wheel"></div>
        </div>
        <p>Loading...</p>
      </div>
    </div>
    <div class="page">
      <header class="section page-header">
        <!--RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="46px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
            <div class="rd-navbar-aside-outer rd-navbar-collapse bg-gray-dark">
              <div class="rd-navbar-aside">
                <ul class="list-inline navbar-contact-list">
                  <li>
                    <div class="unit unit-spacing-xs align-items-center">
                      <div class="unit-left"><span class="icon text-middle fa-phone"></span></div>
                      <div class="unit-body"><a href="tel:#"  style="color:black;">+91-9622215397</a></div>
                    </div>
                  </li>
                  <li>
                    <div class="unit unit-spacing-xs align-items-center">
                      <div class="unit-left"><span class="icon text-middle fa-envelope"></span></div>
                      <div class="unit-body"><a href="mailto:#" style="color:black;">contact@indiaroots.in</a></div>
                    </div>
                  </li>

                </ul>
                <ul class="social-links">
                  <li class="social-head"><a class="icon sup icon-sm icon-circle icon-circle-md icon-bg-white fa-linkedin" href="#"></a></li>
                  <li class="social-head"><a class="icon sup icon-sm icon-circle icon-circle-md icon-bg-white fa-facebook" href="#"></a></li>
                  <li class="social-head"><a class="icon sup icon-sm icon-circle icon-circle-md icon-bg-white fa-instagram" href="#"></a></li>
                </ul>
              </div>
            </div>
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!--RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!--RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!--RD Navbar Brand-->
                  <div class="rd-navbar-brand">
                    <!--Brand--> <a class="brand" href="index.html"><img class="brand-logo-dark" src="images/rootfinwhite.png" alt="india roots" width="100" height="17"/>
                        <img class="brand-logo-light" src="images/rootfin.png" alt="" width="100" height="17"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item"><a class="rd-nav-link" href="index.html">Home</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">About</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="services.html">Services</a>
                      </li>
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="contacts.php">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>

        <section class="intro-bg section main-section section-intro context-dark" style="background:url('images/blue.png') no-repeat center center; background-size:cover;">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-8 text-center">
              <h1 class="font-weight-bold wow fadeInLeft">Contacts</h1>
              <p class="intro-description wow fadeInRight">Ut enim ad minim laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
          </div>
        </div>
      </section>
      <!--Mailform-->
      <section class="section section-md">
        <div class="container">
          <!--RD Mailform-->
          <div class="row justify-content-center">
            <div class="beauty col-xl-6 col-md-8 col-12">

             <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap">
                <!--  <label class="form-label" for="contact-name">Name<span class="req-symbol">*</span></label> -->
                  <input class="form-input" id="Name" name="Name" placeholder="Name" type="text" name="name" data-constraints="@Required">
                </div>
              <!--  <div class="form-wrap">
                  <label class="form-label" for="contact-phone">Phone<span class="req-symbol">*</span></label>
                  <input class="form-input" id="Email" name="Email" type="text" name="phone" data-constraints="@Required @PhoneNumber">
                </div>
                -->
                <div class="form-wrap">
                <!--  <label class="form-label" for="contact-email">E-Mail<span class="req-symbol">*</span></label>-->
                  <input class="form-input" id="Email" name="Email" name="email" placeholder="E-mail" data-constraints="@Required">
                </div>
                <div class="form-wrap">
                <!--  <label class="form-label label-textarea" for="contact-message">Message<span class="req-symbol">*</span></label>-->
                  <textarea class="form-input" id="contact-message" placeholder="Message" name="contact-message" data-constraints="@Required"></textarea>
                </div>

                <div class="form-button group-sm text-center text-lg-left">
                  <button class="button-beauty " id="fcf-button" type="submit">Send</button>
                </div>
              </form>


            </div>
          </div>
        </div>
      </section>
      <!--Google Map
      <section class="section">
      ***  Please, add the data attribute data-key="YOUR_API_KEY" in order to insert your own API key for the Google map.
        Please note that YOUR_API_KEY should replaced with your key.
        <Example: <div class="google-map-container" data-key="YOUR_API_KEY">***

        <div class="google-map-container contacts-map" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png" data-styles="[{&quot;featureType&quot;:&quot;landscape&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:60}]},{&quot;featureType&quot;:&quot;road.local&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:40},{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;administrative.province&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;},{&quot;lightness&quot;:30}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#ef8c25&quot;},{&quot;lightness&quot;:40}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;geometry.stroke&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.park&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b6c54c&quot;},{&quot;lightness&quot;:40},{&quot;saturation&quot;:-40}]},{}]">
          <div class="google-map"></div>
          <ul class="google-map-markers">
            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
          </ul>
        </div>
      </section><a class="section section-banner" href="https://www.templatemonster.com/intense-multipurpose-html-template.html" target="_blank" style="background-image: url(images/background-01-1920x310.jpg); background-image: -webkit-image-set( url(images/background-01-1920x310.jpg) 1x, url(images/background-01-3840x620.jpg) 2x )"><img src="images/foreground-01-1600x310.png" srcset="images/foreground-01-1600x310.png 1x, images/foreground-01-3200x620.png 2x" alt="" width="1600" height="310"></a> -->
      <!--Footer-->

      <footer class="section footer-classic section-sm">
        <div class="container">
          <div class="row row-30">
            <div class="col-lg-3 wow fadeInLeft">
              <!--Brand--><a class="brand" href="index.html"><img class="brand-logo-dark" src="images/star.jpg" alt="" width="100" height="17"/><img class="brand-logo-light" src="images/roots.png" alt="" width="100" height="17"/></a>
              <p class="footer-classic-description offset-top-0 ">
                One of India's leading Tech-Marketing company. We provide state of the art end to end technical solutions designed specificlly for your business and give you 100% customer satisfaction!
Our Cadre of Innovators and technical wizzards yearn to pick up new found challenges in the market and revel at communicating Business success.
              </p>
            </div>
            <div class="col-lg-3 col-sm-8 wow fadeInUp">
              <P class="footer-classic-title">Contact info</P>
              <div class="d-block offset-top-0">D-9 Workshala, sec-3<span class="d-lg-block">Noida-20130, India</span></div>
              <br>
              <div class="d-block offset-top-0">K-3/23 DLF Phase II<span class="d-lg-block">Gurgaon-122010, India</span></div>
              <a class="d-inline-block accent-link" href="mailto:#">contact@indiaroots.in</a>
              <br>
              <a class="d-inline-block" href="tel:#">+91-9622215397</a>

            </div>
            <div class="col-lg-2 col-sm-4 wow fadeInUp" data-wow-delay=".3s">
              <P class="footer-classic-title pol">Quick Links</P>
              <ul class="footer-classic-nav-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About us</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="contacts.php">Contacts</a></li>
              </ul>
            </div>
            <div class="col-lg-4 wow fadeInLeft" data-wow-delay=".2s">
              <p class="scott"> SOCIAL LINKS</p>
              <ul class="social-nav model-3d-1">

      <li><a class="facebook" href="https://www.facebook.com/indiaroots.org">
          <div class="fornt"><i class="fa fa-facebook"></i></div>
          <div class="back"><i class="fa fa-facebook"></i></div>
        </a>
      </li>
      <li><a class="linkedin" href="https://www.linkedin.com/company/india-roots">
          <div class="front"><i class="fa fa-linkedin"></i></div>
          <div class="back"><i class="fa fa-linkedin"></i></div>
        </a>
      </li>
      <li><a class="pinterest" href="https://www.instagram.com/indiaroots/">
          <div class="front"><i class="fa fa-instagram"></i></div>
          <div class="back"><i class="fa fa-instagram"></i></div>
        </a>
      </li>
    </ul>

            </div>
          </div>
        </div>
        <div class="container wow fadeInUp" data-wow-delay=".4s">
          <div class="footer-classic-aside">
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span>. All Rights Reserved. Design by <a href="#">India Roots</a></p>
          <br/>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
