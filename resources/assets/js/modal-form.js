$(document).ready(function() {
    $('#errors').hide();
    $('.modal-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: this.method,
            url: this.action,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
	            if ($('input[name="_method"]').val() === 'DELETE') {
		            location.reload();
	            } else {
		            $('#errors').hide();
		            $('.modal-content').html(data);
		            $(".action-modal").on("hidden.bs.modal", function() {
			            location.reload();
		            });
	            }
            },
            error: function(data) {
                var errors = data.responseJSON;
                $('.alert').hide();
                $('#errors').show().empty();
                $.each(errors, function() {
                    $('#errors').append('<div>' + this + '</div>');
                });
            }
        });
    });
});