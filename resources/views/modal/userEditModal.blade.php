<!-- template for the modal component -->
<script type="x/template" id="user-edit-modal-template">

	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>Edit User</h3>
		</div>
		{!! Form::model($user,['method'=>'PATCH','id'=>'edit_user','route'=>['user.update',$user->id],'@submit.prevent'=>'submitForm','@keydown'=>'form.errors.clear($event.target.name)']) !!}
		@include('user.partials.form')
		<div class="modal-footer text-right">
			<button class="modal-default-button" type="submit">
				Update
			</button>
		</div>
		{!! Form::close() !!}
	</modal>
</script>