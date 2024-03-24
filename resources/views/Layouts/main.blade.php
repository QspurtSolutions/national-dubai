<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="author" content="iqbalhossan99" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="@yield('description')" />
<meta name="keywords" content="@yield('keywords')" />
<title>@yield('title')</title>
<meta name="description" content="" />
<meta name="Robots" content="INDEX,FOLLOW" />
<meta name="rating" content="General" />
<meta name="creator" content="vfox infotech" />
<meta name="publisher" content="vfox infotech" />
<link rel="shortcut icon" href="img/favicon.png" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Barlow&amp;family=Barlow+Condensed&amp;family=Gilda+Display&amp;display=swap">
<link rel="stylesheet" href=" {{ asset('national/css/plugins.css') }} " />
<link rel="stylesheet" href="{{ asset('national/css/style.css') }}" />
 @stack('css')
</head>





<body>
@include('Layouts.header')
@yield('content')
@include('Layouts.footer')
<script src="{{asset('national/js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('national/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{asset('national/js/modernizr-2.6.2.min.js')}}"></script>
<script src="{{asset('national/js/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('national/js/jquery.isotope.v3.0.2.js')}}"></script>
<script src="{{asset('national/js/pace.js')}}"></script>
<script src="{{asset('national/js/popper.min.js')}}"></script>
<script src="{{asset('national/js/bootstrap.min.js')}}"></script>
<script src="{{asset('national/js/scrollIt.min.js')}}"></script>
<script src="{{asset('national/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('national/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('national/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('national/ js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('national/js/YouTubePopUp.js')}}"></script>
<script src="{{asset('national/js/select2.js')}}"></script>
<script src="{{asset('national/js/datepicker.js')}}"></script>
<script src="{{asset('national/js/smooth-scroll.min.js')}}"></script>
<script src="{{asset('national/js/custom.js')}}"></script>
<script>
document.getElementById('whats-chat').addEventListener("mouseover", showchatbox);
document.getElementById('chat-top-right').addEventListener("click", closechatbox);
document.getElementById('send-btn').addEventListener("click", sendmsg);
window.addEventListener("load", showchatboxtime);
function showchatbox(){
document.getElementById('chat-box').style.right='8%'
}
function closechatbox(){
document.getElementById('chat-box').style.right='-500px'
}
function showchatboxtime(){
setTimeout(launchbox,5000)
}
function launchbox(){
document.getElementById('chat-box').style.right='8%'
}
function sendmsg(){
var msg = document.getElementById('whats-in').value;
var relmsg = msg.replace(/ /g,"%20");
window.open('https://api.whatsapp.com/send?phone=99999999999&text='+relmsg,'_blank');
}
</script>
@stack('js')
</body>
</html>