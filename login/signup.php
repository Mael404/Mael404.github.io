<?php

require "functions.php";

$errors = array();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$errors = signup($_POST);

	if (count($errors) == 0) {
		header("Location: login.php");
		die;
	}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

	<link rel="stylesheet" href="style_signup.css">
<title>Signup</title>
</head>

<body>

	<div class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="row border rounded-5 p-3 bg-white shadow box-area ">
			<div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
            <video autoplay muted loop id="myVideo">
                    <source src="/ust/Mael/assets/img/ustvid.mp4">
                </video>
                <small class="text-center quote">"UST-Legazpi is a Catholic higher educational institution devoted to the holistic formation of its students through academic excellence, moral formation, and emotional maturity."
                    <br>
                    <br>
                   
                </small>

			</div>


			<div class="col-md-6 right-box">
				<div class="row align-items-center">
					<div class="header-text1 mb-2 mt-2">
						<h2>Welcome,</h2>
						<p>We're excited to have you join us!</p>
					</div>
                    <form class="needs-validated" method="post" novalidate>
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" name="first_name" class="form-control" id="firstNameInput" placeholder="First Name" aria-describedby="button-addon2" required value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>">
                <label for="firstNameInput" class="form-label">First Name</label>
                <div class="text-danger"><?php echo isset($errors['first_name']) ? $errors['first_name'] : ''; ?></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" name="last_name" class="form-control" id="lastNameInput" placeholder="Last Name" aria-describedby="button-addon2" required value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>">
                <label for="lastNameInput" class="form-label">Last Name</label>
                <div class="text-danger"><?php echo isset($errors['last_name']) ? $errors['last_name'] : ''; ?></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-2">
                <input type="text" name="middle_name" class="form-control" id="middleNameInput" placeholder="Middle Name" aria-describedby="button-addon2" required value="<?php echo isset($_POST['middle_name']) ? $_POST['middle_name'] : ''; ?>">
                <label for="middleNameInput" class="form-label">Middle Name</label>
                <div class="text-danger"><?php echo isset($errors['middle_name']) ? $errors['middle_name'] : ''; ?></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating mb-2">
                <select name="suffix" class="form-select" id="suffixInput" aria-describedby="button-addon2" required>
                    <option value="" selected disabled>Select a suffix</option>
                    <option value="" <?php echo (isset($_POST['suffix']) && $_POST['suffix'] === '') ? 'selected' : ''; ?>>N/A</option>
                    <option value="Jr." <?php echo (isset($_POST['suffix']) && $_POST['suffix'] === 'Jr.') ? 'selected' : ''; ?>>Jr.</option>
                    <option value="Sr." <?php echo (isset($_POST['suffix']) && $_POST['suffix'] === 'Sr.') ? 'selected' : ''; ?>>Sr.</option>
                    <option value="II" <?php echo (isset($_POST['suffix']) && $_POST['suffix'] === 'II') ? 'selected' : ''; ?>>II</option>
                </select>
                <label for="suffixInput" class="form-label">Suffix</label>
                <div class="text-danger"><?php echo isset($errors['suffix']) ? $errors['suffix'] : ''; ?></div>
            </div>
        </div>
    </div>

    <div class="form-floating mb-2">
        <input type="date" name="birth_date" class="form-control" id="birthDateInput" placeholder="Birth Date" aria-describedby="button-addon2" required value="<?php echo isset($_POST['birth_date']) ? $_POST['birth_date'] : ''; ?>">
        <label for="birthDateInput" class="form-label">Birth Date:</label>
        <div class="text-danger"><?php echo isset($errors['birth_date']) ? $errors['birth_date'] : ''; ?></div>
    </div>

    <div class="form-floating mb-2">
        <input type="email" name="email" class="form-control form-control-sm" id="emailInput" placeholder="Enter Email" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
        <label for="emailInput" class="form-label">Email</label>
        <div class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></div>
    </div>

    <div class="form-floating mb-2">
        <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password" required>
        <label for="passwordInput" class="form-label">Password</label>
        <div class="text-danger"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></div>
    </div>

    <div class="input-group">
        <div class="form-floating">
            <input type="password" name="password2" class="form-control" id="password2Input" placeholder="Confirm Password" aria-describedby="button-addon2" required>
            <label for="password2Input">Confirm Password</label>
        </div>
        <button class="btn btn-warning text-white" type="button" id="togglePasswordBtn"><i class="fa-regular fa-eye-slash"></i></button>
    </div>
    <div class="text-danger mb-4"><?php echo isset($errors['password2']) ? $errors['password2'] : ''; ?></div>

    <button type="submit" name="send" class="w-100 mb-4 bn632-hover bn21">Signup</button>
</form>






					<div class="header-text">
						<small>
							<p>Already a member?
								<a href="login.php" style="color:darkorange;">Sign In</a>
							</p>
						</small>
					</div>
				</div>
			</div>

		</div>
	</div>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


	<script>
		const passwordInput = document.getElementById('password');
		const password2Input = document.getElementById('password2Input');
		const togglePasswordBtn = document.getElementById('togglePasswordBtn');

		togglePasswordBtn.addEventListener('click', function() {
			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				password2Input.type = 'text';
				togglePasswordBtn.innerHTML = '<i class="fa-regular fa-eye"></i>';
			} else {
				passwordInput.type = 'password';
				password2Input.type = 'password';
				togglePasswordBtn.innerHTML = '<i class="fa-regular fa-eye-slash"></i>';
			}
		});
	</script>

<script>
        document.querySelector('form').addEventListener('submit', function(event) {
            if (!this.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            this.classList.add('validated');
        });
    </script>
</body>

</html>