@include('shared.modal.header', ['title' => 'Create Project'])
<form action="{{ route('admin.project.store') }}" method="post" class="modal-form">
	{{ csrf_field() }}
	<div class="modal-body form-horizontal">
		<div class="row">
			<div class="col-sm-offset-1 col-sm-10">
				@include('shared.message')
				<div class="alert alert-danger text-center" id="errors"></div>
			</div>
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
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Order
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="sort_order"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('shared.modal.footer', [
		'submitButtonText' => 'Create',
		'submitButtonClass' => 'btn-success'
	])
</form>

<script src="{{ asset('assets/js/modal-form.js') }}"></script>