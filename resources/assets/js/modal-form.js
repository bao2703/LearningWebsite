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
                $('#errors').hide();
                $('.modal-content').html(data);
                $(".action-modal").on("hidden.bs.modal", function() {
                    window.location = window.location;
                });
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