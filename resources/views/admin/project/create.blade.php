<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Create Project</h4>
</div>
<form action="{{ route('admin.project.store') }}" method="post" class="modal-form">
	{{ csrf_field() }}
	<div class="modal-body form-horizontal">
		<div class="row">
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Name
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="name"/>
					</div>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Title
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="title"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button data-dismiss="modal" class="btn btn-default">
			Cancel
		</button>
		<button class="btn btn-primary" type="submit">
			Create
		</button>
	</div>
</form>

<script>
    $(".modal-form").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: this.method,
            url: this.action,
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
                if (data === "Ok") {
                    window.location = window.location;
                    console.log("Ok");
                } else {
                    console.log("not valid");
                    $(".modal-content").html(data);
                }
            },
            error: function() {
                console.log("error");
            }
        });
    });
</script>