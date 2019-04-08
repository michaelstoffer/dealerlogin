<template>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header"><i class="fas fa-user"></i> Profile</div>

					<div class="card-body">
						<form id="app" @submit="checkForm" method="post" novalidate="true">
							<div v-if="errors.length">
								<b>Please correct the following error(s):</b>
								<ul>
									<li v-for="error in errors">{{ error }}</li>
								</ul>
							</div>

							<div class="form-group row">
								<label for="password" class="col-sm-3 col-form-label">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="password" placeholder="Password" v-model="password" />
								</div>
							</div>
							<div class="form-group row">
								<label for="password-confirm" class="col-sm-3 col-form-label">Confirm Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" id="password-confirm" placeholder="Confirm Password" v-model="password_confirm" />
								</div>
							</div>
							<button type="submit" class="btn btn-primary float-right">Change Password</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	props: ['user'],

	data() {
		return {
			errors: [],
			password: '',
			password_confirm: ''
		};
	},

	methods: {
		checkForm(e) {
			this.errors = [];

			if (!this.password) {
				this.errors.push('Password required.');
			}

			if (!this.password_confirm) {
				this.errors.push('Password Confirm required.');
			}

			if (this.password !== this.password_confirm) {
				this.errors.push('Passwords MUST Match.');
			}

			e.preventDefault();

			if (Object.keys(this.errors).length < 1) {
				this.changePassword(this.password);
			}
		},

		changePassword(newPass) {
			axios.post('/password/update', {user_id: this.user.id, pass: newPass})
				.then(response => {
					this.password = '';
					this.password_confirm = '';
					flash(response.data.updated);
				});
		}
	}
}
</script>
