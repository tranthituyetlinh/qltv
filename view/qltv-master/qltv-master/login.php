<html>
	<head>
		<title>VLUTE LIB | Đăng nhập hệ thống</title>
		<link rel="stylesheet" type="text/css" href="admin/css/animate.css">
		<style type="text/css">
			@import url(https://fonts.googleapis.com/css?family=Roboto:300);
			.login-page {
			  width: 360px;
			  padding: 0 0 0;
			  margin: auto;
			}
			.form {
			  position: relative;
			  z-index: 1;
			  background: #FFFFFF;
			  max-width: 360px;
			  margin: 0 auto 100px;
			  padding: 45px;
			  text-align: center;
		      box-shadow: 2px 2px 8px 0 rgba(175, 175, 175, 0.32);
			}
			.form input {
			  font-family: "Roboto", sans-serif;
			  outline: 0;
			  background: #f2f2f2;
			  width: 100%;
			  border: 0;
			  margin: 0 0 15px;
			  padding: 15px;
			  box-sizing: border-box;
			  font-size: 14px;
			}
			.form .nut-sub {
			  font-family: "Roboto", sans-serif;
			  text-transform: uppercase;
			  outline: 0;
			  background: #3c7eaf;
			  width: 100%;
			  border: 0;
			  padding: 15px;
			  color: #FFFFFF;
			  font-size: 14px;
			  -webkit-transition: all 0.3 ease;
			  transition: all 0.3 ease;
			  cursor: pointer;
			}
			.form .nut-sub:hover,.form button:active,.form button:focus {
			  background: #408bc3;
			}
			.form .message {
			  margin: 15px 0 0;
			  color: #b3b3b3;
			  font-size: 12px;
			}
			.form .message a {
			  color: #2677b3;
			  text-decoration: none;
			  font-size: 12px;
			}
			.form .register-form {
			  display: none;
			}
			.container {
			  position: relative;
			  z-index: 1;
			  max-width: 300px;
			  margin: 0 auto;
			}
			.container:before, .container:after {
			  content: "";
			  display: block;
			  clear: both;
			}
			.container .info {
			  margin: 50px auto;
			  text-align: center;
			}
			.container .info h1 {
			  margin: 0 0 15px;
			  padding: 0;
			  font-size: 36px;
			  font-weight: 300;
			  color: #1a1a1a;
			}
			.container .info span {
			  color: #4d4d4d;
			  font-size: 12px;
			}
			.container .info span a {
			  color: #000000;
			  text-decoration: none;
			}
			.container .info span .fa {
			  color: #EF3B3A;
			}
			body {
			    background: #e8e8e8;
			    background: -webkit-linear-gradient(right, #e8e8e8, #e8e8e8);
			    background: -moz-linear-gradient(right, #76b852, #8DC26F);
			    background: -o-linear-gradient(right, #76b852, #8DC26F);
			    background: linear-gradient(to left, #e8e8e8, #e8e8e8);
			    font-family: "Roboto", sans-serif;
			    -webkit-font-smoothing: antialiased;
			    -moz-osx-font-smoothing: grayscale;
			}
		</style>
	</head>
	<body>
		<div class="login-page">
		  <div class="logo animated bounceInDown" style="text-align: center; margin-bottom: 30px;margin-top: 30px;">
		  	<img src="images/vlute-logo.png" style="width: 100px;">
		  </div>
		  <div class="form animated bounceIn">
		    <form class="login-form" action="control/ctrl_login.php" method="post">
		      <input type="text" placeholder="tên đăng nhập" name="username">
		      <input type="password" placeholder="mật khẩu" name="password">
		      <input type="submit" name="" value="đăng nhập" class="nut-sub">
		      <p class="message"><a href="#">Quên mật khẩu?</a></p>
		    </form>
		  </div>
		</div>
	</body>
</html>