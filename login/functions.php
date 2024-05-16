<?php 

session_start();
function signup($data)
{
    $errors = array();

    // Validate 
    if (!preg_match('/^[a-zA-Z\- ]+$/', $data['first_name'])) {
        $errors['first_name'] = "Please enter a valid first name";
    }
    

    else if (!preg_match('/^[a-zA-Z\- ]+$/', $data['last_name'])) {
        $errors['last_name'] = "Please enter a valid last name";
    }

    else if (!empty($data['middle_name']) && !preg_match('/^[a-zA-Z]+$/', $data['middle_name'])) {
        $errors['middle_name'] = "Please enter a valid middle name";
    }

    else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email";
    }

    else if (strlen(trim($data['password'])) < 4) {
        $errors['password'] = "Password must be at least 4 chars long";
    }

    else if ($data['password'] != $data['password2']) {
        $errors['password2'] = "Passwords must match";
    }

    $check = database_run("SELECT * FROM users WHERE email = :email LIMIT 1", ['email' => $data['email']]);
    if (is_array($check)) {
        $errors['email'] = "That email already exists";
    }

    // Save
    if (count($errors) == 0) {
        $arr['role'] = "user";
        $arr['first_name'] = $data['first_name'];
        $arr['last_name'] = $data['last_name'];
        $arr['middle_name'] = $data['middle_name'];
        $arr['suffix'] = $data['suffix'];
        $arr['birth_date'] = $data['birth_date'];
        $arr['email'] = $data['email'];
        $arr['password'] = hash('sha256', $data['password']);
        $arr['date'] = date("Y-m-d H:i:s");
        

        $query = "INSERT INTO users (role, first_name, last_name, middle_name, suffix, birth_date, email, password, date) VALUES 
        (:role, :first_name, :last_name, :middle_name, :suffix, :birth_date, :email, :password, :date)";

        database_run($query, $arr);
    }

    return $errors;
}

function login($data)
{
    $errors = array();

    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email";
    }

    if (count($errors) > 0) {
        return $errors;
    }

    $arr['email'] = $data['email'];
    $password = hash('sha256', $data['password']);
    $query = "SELECT * FROM users WHERE email = :email LIMIT 1";

    $row = database_run($query, $arr);

    if (is_array($row)) {
        $row = $row[0];

        if ($password === $row->password) {
            $_SESSION['USER'] = $row;
            $_SESSION['LOGGED_IN'] = true;

            // Check the user's role
            if ($row->role == 'admin') {
                $_SESSION['ROLE'] = 'admin';
            } else {
                $_SESSION['ROLE'] = 'user';
            }

        } else {
            $errors['password'] = "Incorrect password";
        }
    } else {
        $errors['email'] = "Couldn't find your Account";
    }

    return $errors;
}




function database_run($query, $vars = array())
{
    include __DIR__ . '/../Connection/con_pdo_db.php';

    if (!$pdo) {
        return false;
    }

    $stm = $pdo->prepare($query);
    $check = $stm->execute($vars);

    if ($check) {
        $data = $stm->fetchAll(PDO::FETCH_OBJ);

        if (count($data) > 0) {
            return $data;
        }
    }

    return false;
}


function check_login($redirect = true){

	if(isset($_SESSION['USER']) && isset($_SESSION['LOGGED_IN'])){

		return true;
	}

	if($redirect){
		header("Location: login.php");
		die;
	}else{
		return false;
	}
	
}

function check_verified(){

	$user_id = $_SESSION['USER']->user_id;
	$query = "select * from users where user_id = '$user_id' limit 1";
	$row = database_run($query);

	if(is_array($row)){
		$row = $row[0];

		if($row->email == $row->email_verified){

			return true;
		}
	}
 
	return false;
 	
}


function generate_reset_code($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $resetCode = '';
    
    for ($i = 0; $i < $length; $i++) {
        $resetCode .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $resetCode;
}

