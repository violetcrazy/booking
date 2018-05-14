<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>
		
	</title>

	<link href="<?= $this->url->get() ?>/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->url->get() ?>/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?= $this->url->get() ?>/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?= $this->url->get() ?>/assets/demo/default/media/img/logo/favicon.ico" />
	

	<script type="text/javascript"></script>

</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" >
	
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-1" id="m_login" style="background-image: url(../../../assets/app/media/img//bg/bg-1.jpg);">
		<div class="m-grid__item m-grid__item--fluid m-login__wrapper">
			<div class="m-login__container">
				<div class="m-login__logo">
					<a href="#">
						<img src="/assets/app/media/img//logos/logo-1.png">
					</a>

					<?= $this->flashSession->output() ?>
				</div>
				<div class="m-login__signin">
					<form class="m-login__form m-form" action="" method="post">
						<input type="hidden" name="action" value="login">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Mật khẩu" name="password">
						</div>
						<div class="row m-login__form-sub">
							<div class="col m--align-left m-login__form-left">
								<label class="m-checkbox  m-checkbox--light">
									<input type="checkbox" name="remember">
									Ghi nhớ đăng nhập
									<span></span>
								</label>
							</div>
							<div class="col m--align-right m-login__form-right">
								<a href="javascript:;" id="m_login_forget_password" class="m-link">
									Quên mật khẩu ?
								</a>
							</div>
						</div>
						<div class="m-login__form-action">
							<button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
								Đăng nhập
							</button>
						</div>
					</form>
				</div>
				<div class="m-login__signup">
					<div class="m-login__head">
						<h3 class="m-login__title">
							Đăng ký
						</h3>
						<div class="m-login__desc">
							Bạn chưa có tài khoản?
						</div>
					</div>
					<form class="m-login__form m-form" action="">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="password" placeholder="Password" name="password">
						</div>
						<div class="form-group m-form__group">
							<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
						</div>
						<div class="row form-group m-form__group m-login__form-sub">
							<div class="col m--align-left">
								<label class="m-checkbox m-checkbox--light">
									<input type="checkbox" name="agree">
									I Agree the
									<a href="#" class="m-link m-link--focus">
										terms and conditions
									</a>
									.
									<span></span>
								</label>
								<span class="m-form__help"></span>
							</div>
						</div>
						<div class="m-login__form-action">
							<button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
								Sign Up
							</button>
							&nbsp;&nbsp;
							<button id="m_login_signup_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
								Cancel
							</button>
						</div>
					</form>
				</div>
				<div class="m-login__forget-password">
					<div class="m-login__head">
						<h3 class="m-login__title">
							Forgotten Password ?
						</h3>
						<div class="m-login__desc">
							Enter your email to reset your password:
						</div>
					</div>
					<form class="m-login__form m-form" action="">
						<div class="form-group m-form__group">
							<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
						</div>
						<div class="m-login__form-action">
							<button id="m_login_forget_password_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
								Request
							</button>
							&nbsp;&nbsp;
							<button id="m_login_forget_password_cancel" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn">
								Cancel
							</button>
						</div>
					</form>
				</div>
				<div class="m-login__account">
					<span class="m-login__account-msg">
						Bạn chưa có tài khoản ?
					</span>
					&nbsp;&nbsp;
					<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
						Đăng ký
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>