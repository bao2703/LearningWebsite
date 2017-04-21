<script>
	window.fbAsyncInit = function() {
		FB.init({
			appId: '{{ env('FACEBOOK_ID') }}',
			xfbml: true,
			version: 'v2.9'
		});
		FB.AppEvents.logPageView();
	};

	(function(d, s, id) {
		var fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {
			return;
		}
		var js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>