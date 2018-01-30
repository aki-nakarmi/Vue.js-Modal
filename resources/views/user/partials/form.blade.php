<div class="modal-body">
	<div class="form-group" :class="{'has-error' : form.errors.has('name') }">
		{!! Form::label('name','Name',['class'=>'form-label']) !!}
		{!! Form::text('name',null,['class'=>'form-control','v-model'=>'name']) !!}
		<span class="error text-muted" v-show="form.errors.has('name')" v-text="form.errors.get('name')"></span>
	</div>
	<div class="form-group" :class="{'has-error' : form.errors.has('email') }">
		{!! Form::label('email','Email',['class'=>'form-label']) !!}
		{!! Form::email('email',null,['class'=>'form-control','v-model'=>'email']) !!}
		<span class="error text-muted" v-show="form.errors.has('email')" v-text="form.errors.get('email')"></span>
	</div>
</div>