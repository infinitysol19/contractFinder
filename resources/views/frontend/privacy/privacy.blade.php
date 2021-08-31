@extends('layout-frontend/app')
@extends('include-frontend.header')
@extends('include-frontend.footer')
@section('seo_content')

@php
$dataseo=\App\Models\Settings::first();
@endphp
{!!$dataseo->contact_meta!!}
@endsection
@section('content')
<!--============= Hero Section Starts Here =============-->
<div class="hero-section style-2 pb-lg-400">
    <div class="container">
        <div class="col-lg-12 col-xl-12 d-lg-block">
            <h2 class="text-center text-white mt-5">Privacy Policy</h2>
        </div>
    </div>
    <div class="bg_img hero-bg bottom_center" data-background="{{asset('frontend/images/landing-hero-background.jpg')}}" ></div>
</div>
<!--============= Hero Section Ends Here =============-->
<!--============= Dashboard Section Starts Here =============-->
<section class="dashboard-section padding-bottom mt--240 mt-lg--325 pos-rel">
    <div class="container">
        <div class="row  mt--100 mt-lg--280">
            <div class="col-11 col-sm-9 col-md-7 col-lg-8 col-xl-12  p-0 mt-3 mb-2">
                <div class="card px-2 p-md-5 p-sm-2  mt-3 mb-3 rounded shadow">
                    <p>Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.</p>

<ul>
    <li>Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.</li>
    <li>We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.</li>
    <li>We will only retain personal information as long as necessary for the fulfillment of those purposes.</li>
    <li>We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</li>
    <li>Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date.</li>
    <li>We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.</li>
    <li>We will make readily available to customers information about our policies and practices relating to the management of personal information.</li>
</ul>

<p>We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained.</p>

<h3>Who we are</h3>

<p>Our website address is: https://bootstrapmade.com.</p>

<p>Definitions</p>

<p><strong>Personal Data</strong>&nbsp;&ndash; any information relating to an identified or identifiable natural person.&nbsp;<strong>Processing</strong>&nbsp;&ndash; any operation or set of operations which is performed on Personal Data or on sets of Personal Data.&nbsp;<strong>Data subject</strong>&nbsp;- a natural person whose Personal Data is being Processed.&nbsp;<strong>Child</strong>&nbsp;- a natural person under 16 years of age.&nbsp;<strong>We/us</strong>&nbsp;(either capitalized or not) - bootstrapmade.com</p>

<h3>What personal data we collect and why we collect it</h3>

<p>1. Forms</p>

<ul>
    <li>When ordering or registering on our Site you may be asked to enter your name, member name, email address, mailing address, country, billing information or other details to help you with your experience. These information are collected in purpose of providing services described on it, like to verify your identity when you sign in to website, to process your transactions made on site, to respond to support tickets and offer customer services, for administrative and accounting needs that we required to provide to government.</li>
    <li>When you submit a support question we collect your first name, last name and your email address so that we can correspond with you.</li>
</ul>

<p>2. Google Analytics</p>

<p>We use Google Analytics to track visitors on this site. Google Analytics uses cookies to collect this data. In order to be compliant with the new regulation Google included a data processing amendment. The data we collect will be processed anonymously and &ldquo;Data sharing&rdquo; is disabled. We don&rsquo;t use other Google services in combination with Google Analytics cookies.</p>

<h3>Comments</h3>

<p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&rsquo;s IP address and browser user agent string to help spam detection.</p>

<p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>

<h3>Cookie Policy</h3>

<p>To enhance your experience on our sites, many of our web pages use &ldquo;cookies&rdquo;. Cookies are small text files that we place in your computer&rsquo;s browser to store your preferences. Cookies, by themselves, do not tell us your email address or other personal information unless you choose to provide this information to us by, for example, registering at one of our sites. Once you choose to provide a web page with personal information, this information may be linked to the data stored in the cookie. A cookie is like an identification card. It is unique to your computer and can only be read by the server that gave it to you.</p>

<p>We use cookies to understand site usage and to improve the content and offerings on our sites. For example, we may use cookies to personalize your experience on our web pages (e.g. to recognize you by name when you return to our site). We also may use cookies to offer you products and services. If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These cookies will last for one year. If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser. When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &ldquo;Remember Me&rdquo;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>

<p>If you want to control which cookies you accept. You can configure your browser to accept all cookies or to alert you every time a cookie is offered by a website&rsquo;s server. Most browsers automatically accept cookies. You can set your browser option so that you will not receive cookies and you can also delete existing cookies from your browser. You may find that some parts of the site will not function properly if you have refused cookies.</p>

<h3>Embedded content from other websites</h3>

<p>Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other website. These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracing your interaction with the embedded content if you have an account and are logged in to that website.</p>

<h3>Who we share your data with</h3>

<p>When you purchase a product on bootstrapmade.com, your personal data are shared with our online reseller Paddle. You can check Paddle privacy policy at: https://paddle.com/privacy/</p>

<h3>How long we retain your data</h3>

<p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue. For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>

<h3>What rights you have over your data</h3>

<p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes. You can send your request anytime to:&nbsp;contact@bootstrapmade.com.</p>

<h3>Security</h3>

<p>To protect your personal information, we take reasonable precautions and follow industry best practices to make sure it is not inappropriately lost, misused, accessed, disclosed, altered or destroyed. If you provide us with your credit card information, the information is encrypted using secure socket layer technology (SSL) and stored with a AES-256 encryption. Although no method of transmission over the Internet or electronic storage is 100% secure, we follow all PCI-DSS requirements and implement additional generally accepted industry standards.</p>

<h3>Changes to this privacy policy</h3>

<p>We reserve the right to modify this privacy policy at any time, so please review it frequently. Changes and clarifications will take effect immediately upon their posting on the website. If we make material changes to this policy, we will notify you here that it has been updated, so that you are aware of what information we collect, how we use it, and under what circumstances, if any, we use and/or disclose it.</p>

<h3>Contact information</h3>

<p>If you have questions, you can contact us at:&nbsp;contact@bootstrapmade.com</p>

                 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Dashboard Section Ends Here =============-->
    
    @endsection
    @section("footer")
    @parent
  <style type="text/css">
      
      h3{
        padding-bottom: 12px;
      }
  </style>
    @endsection