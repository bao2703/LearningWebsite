@include('shared.modal.header', ['title' => 'Delete Project'])
<form action="{{ route('admin.project.destroy', $project) }}" method="post" class="modal-form">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
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
						<input class="form-control" name="name" value="{{ $project->name }}" readonly/>
					</div>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Title
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="title" value="{{ $project->title }}" readonly/>
					</div>
				</div>
			</div>
			<div class="col-sm-11">
				<div class="form-group">
					<label class="col-sm-3 control-label">
						Order
					</label>
					<div class="col-sm-9">
						<input class="form-control" name="sort_order" value="{{ $project->sort_order }}" readonly/>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('shared.modal.footer', [
		'submitButtonText' => 'Delete',
		'submitButtonClass' => 'btn-danger'
	])
</form>

<script src="{{ asset('assets/js/modal-form.js') }}"></script>