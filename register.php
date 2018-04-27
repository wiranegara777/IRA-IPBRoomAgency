<!DOCTYPE html>
<html lang="en">
    <head> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">

		<!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!-- Css Register -->
    <?php include_once "include/registerCss.php"; ?>

		<title>Register IPB Room Agency</title>
	</head>
	<body>
		<div class="container">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
                    <img class="mb-4" src="image/IPB.jpg" alt="" width="95" height="95">
                     <h3 class="title">Register Account</h3>
                     <h1 class="title">IPB Room Agency</h1>
                    <hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="proses/signUp.php">
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nama Lengkap</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Masukan Nama Lengkap" required/>
								</div>
							</div>
            </div>

            <!-- <div class="form-group">
                <label for="name" class="cols-sm-2 control-label">Jenis Kelamin</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <p> &nbsp;
                        <input type="radio" id="lakilaki" name="jeniskelamin" checked />
                        <label for="lakilaki">Laki-Laki</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" id="perempuan" name="jeniskelamin"/>
                        <label for="perempuan">Perempuan</label>
                    </p>
                  </div>
                </div>
              </div> -->
            
            <div class="form-group">
                <label for="username" class="cols-sm-2 control-label">Nomor Induk Mahasiswa</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="nim" id="nim"  placeholder="Masukan NIM" required/>
                  </div>
                </div>
              </div>

              <div class="form-group">
                  <label for="username" class="cols-sm-2 control-label">Fakultas</label>
                  <div class="cols-sm-10">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-list" aria-hidden="true"></i></span>
                      <select name="fakultas" id="fakultas" class="form-control selectpicker" required>
                          <option value="">Pilih Fakultas</option>
                          <option value="FMIPA" >FMIPA</option>
                          <option value="FEM">FEM</option>
                          <option value="FPIK">FPIK</option>
                          <option value="FEMA">FEMA</option>
                          <option value="SB">SB</option>
                          <option value="FAPERTA">FAPERTA</option>
                          <option value="FAPET">FAPET</option>
                          <option value="FATETA">FATETA</option>
                          <option value="FAHUTAN">FAHUTAN</option>
                          <option value="FKH">FKH</option>
                          <option value="D3">D3</option>
                        </select>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Departement</label>
                    <div class="cols-sm-10">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list" aria-hidden="true"></i></span>
                        <select name="departemen" id="department" class="form-control selectpicker" required>
                            <option value="">Pilih Departement</option>
                            <option value="Ilmu Komputer">Ilmu Komputer</option>
                            <option value="Geofisika dan Meteorologi">Geofisika dan Meteorologi</option>
                            <option value="Biologi">Biologi</option>
                            <option value="Biokimia">Biokimia</option>
                            <option value="Matematika">Matematika</option>
                            <option value="Statistika">Statistika</option>
                            <option value="Fisika">Fisika</option>
                            <option value="Kimia">Kimia</option>
                          </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Angkatan</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-list" aria-hidden="true"></i></span>
                          <select name="angkatan" id="angkatan" class="form-control selectpicker" required>
                              <option value="">Pilih Angkatan</option>
                              <option value="2013">2013</option>
                              <option value="2014">2014</option>
                              <option value="2015">2015</option>
                              <option value="2016">2016</option>
                              <option value="2017">2017</option>
                              <option value="2018">2018</option>
                              <option value="2019">2019</option>
                              <option value="2020">2020</option>
                            </select>
                        </div>
                      </div>
                    </div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-mail</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="Masukan E-mail" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Kata Sandi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Masukan Kata Sandi" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Ulangi Kata Sandi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password2" id="confirm"  placeholder="Ulangi Kata Sandi" required/>
								</div>
							</div>
						</div>

            <div class="form-group">
                <label for="confirm" class="cols-sm-2 control-label">Telepon</label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="phone" id="telepon"  placeholder="Masukan Nomor Telepon (+62)" required/>
                  </div>
                </div>
              </div>

						<div class="form-group ">
							<input type="submit" name="Submit" class="btn btn-primary btn-lg btn-block login-button" value="Register"/>
						</div>
						<div class="login-register">
				            <a href="login.html">Login</a>
				         </div>
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	</body>
</html>
