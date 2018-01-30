<!-- template for the modal component -->
<script type="x/template" id="new-user-modal-template">

	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>New User</h3>
		</div>
		{!! Form::open(['method'=>'POST','id'=>'create_user','route'=>'user.store','@submit.prevent'=>'submitForm','@keydown'=>'form.errors.clear($event.target.name)']) !!}
		@include('user.partials.form')
		<div class="modal-footer text-right">
			<button class="modal-default-button" type="submit">
				Save
			</button>
		</div>
		{!! Form::close() !!}
	</modal>
</script>