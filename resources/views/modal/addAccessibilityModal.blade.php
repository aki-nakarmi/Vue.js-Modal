<!-- template for the modal component -->
<script type="x/template" id="add-accessibility-template">

	<modal :show="show">
		<div class="modal-header">
			<h3>Add Accessibility</h3>
		</div>
		{!! Form::open(['method'=>'POST','id'=>'create_user','route'=>'user.store','@submit.prevent'=>'submitForm','@keydown'=>'form.errors.clear($event.target.name)']) !!}

		@foreach($accessibilityQuestions as $question)
			<accessibility-question inline-template
									:value="questions" @update:value="val =>{questions=val}"
									question_name="{{$question['name']}}"
									dependent_on="{{$question['dependent_to']}}"
									dependent_value="{{json_encode($question['dependent_value'])}}"
									dependent_condition="{{$question['dependent_condition']}}">
				<div v-show="showDiv">
					<label for="" class="block">{{ $question['question']}}</label>

					<label class="control control--radio block">
						Yes
						{!! Form::radio($question['name'],'yes',false,[':disabled'=>'!showDiv','class' => 'form-control','v-model'=>'selected'] ) !!}
						<span class="control__indicator"></span>
					</label>
					<label class="control control--radio block">
						No
						{!! Form::radio($question['name'],'no',false,[':disabled'=>'!showDiv','class' => 'form-control','v-model'=>'selected'] ) !!}
						<span class="control__indicator"></span>
					</label>
				</div>

			</accessibility-question>
		@endforeach
		<div class="modal-footer text-right">
			<button class="modal-default-button" type="submit">
				Save
			</button>
		</div>
		{!! Form::close() !!}
	</modal>
</script>