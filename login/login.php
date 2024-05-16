<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="stylesheet" href="style.css">
<title>Login</title>
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
                    <div class="header-text mt-2">
                        <h2>Hello, Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>

                    <form class="needs-validated" method="post" novalidate>
                        <div class="form-floating mb-2">
                            <input type="email" name="email" class="form-control form-control-sm" id="floatingInput" name="email" placeholder="Enter Email" required>
                            <label for="floatingInput" class="form-label">Email</label>
                            <div class="text-danger"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></div>
                        </div>

                        <div class="input-group">
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" id="passwordInput" aria-describedby="button-addon2" required>
                                <label for="passwordInput">Password</label>
                            </div>
                            <button class="btn btn-warning text-white" type="button" id="togglePasswordBtn"><i class="fa-regular fa-eye-slash"></i></button>

                        </div>
                        <div class="text-danger mb-3"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></div>


                        <div class="forgot">
                            <small class="float-end">
                                <p>Forgot password?
                                    <a href="forgot_password.php" style="color:darkorange; ">Click Here</a>
                                </p>
                            </small>
                        </div>

                        <button onclick="redirectToForm()" class="w-100 mb-4 mt-2 bn632-hover bn21">Login</button>

<script>
    function redirectToForm() {
        window.location.href = ""; 
    }
</script>


                    </form>




                    <div class="header-texts">
                        <small>
                            <p>Not a member?
                                <a href="signup.php" style="color:darkorange;">Sign Up</a>
                            </p>
                        </small>
                    </div>
                    <div class="header-texts">
                        <small>
                                <a href="/ust/Mael/index.html" style="color:darkorange;">Back to homepage</a>
                           
                        </small>
                    </div>
                    

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


    <script>
        // JavaScript to toggle the password visibility
        const passwordInput = document.getElementById('passwordInput');
        const togglePasswordBtn = document.getElementById('togglePasswordBtn');

        togglePasswordBtn.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordBtn.innerHTML = '<i class="fa-regular fa-eye"></i>';
            } else {
                passwordInput.type = 'password';
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