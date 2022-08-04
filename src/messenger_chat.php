<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
    xfbml            : true,
    version          : 'v9.0'
    });
};

(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/cs_CZ/sdk/xfbml.customerchat.js';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution=setup_tool
page_id="1812129042367683"
theme_color="#0A7CFF"
logged_in_greeting="Máte zájem o video? Neváhejte napsat!"
logged_out_greeting="Máte zájem o video? Neváhejte napsat!">
</div>