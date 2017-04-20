/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
//
// const app = new Vue({
//     el: '#app'
// });

$(document).ready(function() {
	$(".carousel-inner").find(".item:first").addClass("active");

	$(".editor-form").submit(function(e) {
		e.preventDefault();
		var input = $('#user-input').val();
		var result = $('#result-content');
		result.ready(function() {
			result.contents().find("body").html(input);
		});

		$.ajax({
			type: this.method,
			url: this.action,
			data: {id: 1},
			success: function(data) {
				alert();
			},
			error: function(data) {

			}
		});
	});
});

$(document).ready(function() {
	$(".action-modal").on("show.bs.modal", function() {
	}).on("hidden.bs.modal", function() {
		$(this).removeData("bs.modal");
		$('.modal-content').empty();
	});
});