<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}"/>
	<title>Laravel</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

	<!-- Styles -->

</head>
<style>
	* {
		box-sizing: border-box;
	}

	.modal-mask {
		position: fixed;
		z-index: 9998;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-color: rgba(0, 0, 0, .5);
		transition: opacity .3s ease;
	}

	.modal-container {
		width: 300px;
		margin: 40px auto 0;
		padding: 20px 30px;
		background-color: #fff;
		border-radius: 2px;
		box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
		transition: all .3s ease;
		font-family: Helvetica, Arial, sans-serif;
	}

	.modal-header h3 {
		margin-top: 0;
		color: #42b983;
	}

	.modal-body {
		margin: 20px 0;
	}

	.text-right {
		text-align: right;
	}

	.form-label {
		display: block;
		margin-bottom: 1em;
	}

	.form-label > .form-control {
		margin-top: 0.5em;
	}

	.form-control {
		display: block;
		width: 100%;
		padding: 0.5em 1em;
		line-height: 1.5;
		border: 1px solid #ddd;
	}

	/*
	 * The following styles are auto-applied to elements with
	 * transition="modal" when their visibility is toggled
	 * by Vue.js.
	 *
	 * You can easily play with the modal transition by editing
	 * these styles.
	 */

	.modal-enter {
		opacity: 0;
	}

	.modal-leave-active {
		opacity: 0;
	}

	.modal-enter .modal-container,
	.modal-leave-active .modal-container {
		-webkit-transform: scale(1.1);
		transform: scale(1.1);
	}
</style>
<body>
<!-- app -->
<div id="app">
	<new-user-modal :show="showNewUserModal" @close="showNewUserModal = false"></new-user-modal>
	<button @click="showNewUserModal = true">New User</button>
	<button @click="showCommentModal = true">Add Comment</button>
	<comment-modal :show="showCommentModal" @close="showCommentModal = false"></comment-modal>
	<button @click="showUserEditModal = true">Edit User</button>
	<user-edit-modal :user_id="{{$user->id}}" :show="showUserEditModal" @close="showUserEditModal = false"></user-edit-modal>
	<add-accessibility-modal questions_data="{{$questions->toJson()}}" :show="showAddAccessibilityModal" @close="showAddAccessibilityModal = false"></add-accessibility-modal>
	<button @click="showAddAccessibilityModal = true">Add Accessibility</button>
</div>

<!-- Template for the shell Modal component -->
<script type="x/template" id="modal-template">
	<transition name="modal">
		<div class="modal-mask" @click="close" v-show="show">
			<div class="modal-container" @click.stop>
				<slot></slot>
			</div>
		</div>
	</transition>
</script>
@include('modal.newUserModal')
@include('modal.commentModal')
@include('modal.userEditModal')
@include('modal.addAccessibilityModal')
{{--<script src="{{mix('js/vendor.js')}}"></script>--}}
<script src="{{mix('js/app.js')}}"></script>

</body>
</html>
