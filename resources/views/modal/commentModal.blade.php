<!-- template for the modal component -->
<script type="x/template" id="comment-modal-template">

	<modal :show="show" @close="close">
		<div class="modal-header">
			<h3>Add comment</h3>
		</div>
		<div class="modal-body">
			<label class="form-label">
				Body
				<textarea v-model="body" rows="6" class="form-control"></textarea>
			</label>
		</div>
		<div class="modal-footer text-right">
			<button class="modal-default-button" @click="savePost()">
				Save
			</button>
		</div>
	</modal>
</script>