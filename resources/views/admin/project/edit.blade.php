@include('shared.modal.header', ['title' => 'Edit Project'])
<form action="{{ route('admin.project.update', $project->id) }}" method="post" class="modal-form">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
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
						<input class="form-control" name="name" value="{{ $project->name }}"/>
					</div>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Title
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="title" value="{{ $project->title }}"/>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('shared.modal.footer', [
		'submitButtonText' => 'Edit',
		'submitButtonClass' => 'btn-primary'
	])
</form>

<script src="{{ asset('assets/js/modal-form.js') }}"></script>