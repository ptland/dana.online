<?php
use App\Model\Data\DatabaseUtils as DatabaseUtils;
use App\Model\Data\UserDao as UserDao;
use App\Model\User as User;
try
{
    switch ($action){
        case 'login':
            $title = 'Login ';
            include  'frontend/views/login.php';
            break;

        case 'login_check':
            session_start();
            $userDao = new UserDao(DatabaseUtils::connect());
            if ( isset($_POST['email']) && isset($_POST['password']) ) {
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);

                if ($userDao->checkLogin($email, $password)) {
                    $id = (int)$userDao->findUserId($email);
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $id;

                    header('Location: index.php');

                } else {
                    $msg = "Invalid username or password";
                    include 'frontend/views/login.php';
                }
            }
            break;
        case 'logout':
            session_start();
            session_destroy();
            header('Location: index.php');
            break;
        case 'signup_check':
            $userDao = new UserDao(DatabaseUtils::connect());
            $email = $_POST['email'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address= $_POST['address'];
            $role_id = 1;

            $created_at = new DateTime('',new DateTimeZone('Asia/Ho_Chi_Minh'));
            $created_at = $created_at->format('Y-m-d H:i:s');

            $user = new User();

            $user->setEmail($email);
            $user->setPassword($password);
            $user->setName($name);
            $user->setPhone($phone);
            $user->setAddress($address);
            $user->setRole_id($role_id);
            $user->setCreated_at($created_at);

            $insertUser = $userDao->insert($user);

            include 'frontend/views/login.php';
    }

}catch (PDOException $e)
{
    die( $e->getMessage() );
}