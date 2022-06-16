<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
    $list = mysqli_query($conn, "SELECT * FROM Students WHERE full_names ='$fullnames'");
   
    if(!$list){

        die('could not select from Student table'.mysqli_error($conn));
    }

   //check if user with this email already exist in the database

        if (mysqli_num_rows($list) > 0) {
            
            echo "<script> alert('Username already exists'); 
            window.location = '../forms/register.html'; </script>";
        }
   
        
        else {
            $task = "INSERT INTO Students(full_names,country,email,gender, password) VALUES('$fullnames','$country','$email',' $gender','$password')";
            
            $insert = mysqli_query($conn, $task);

                if ($insert) 
                    {

                        echo "<script> alert('User Successfully registered');  
                                        window.location = '../forms/login.html'; </script>";
                        
                    }

                else {
                        echo "<script> alert('Registration was not successful');  </script>";
                            
                    }
                }
        }
   
    
   


//login users
function loginUser($email, $password){
    //create a connection variable using the db function in config.php

    
    $conn = db();

    $sql_e = "SELECT * FROM students WHERE email='$email'";

    $task = mysqli_query($conn, $sql_e);

    //echo "<h1 style='color: red'> LOG ME IN (IMPLEMENT ME) </h1>";
    //open connection to the database and check if username exist in the database
    
    if (mysqli_num_rows($task) > 0) {
        
        while ($rows = mysqli_fetch_assoc($task)) {
                $id = $rows['id'];
                $fname = $rows['full_names'];
                $dpassword = $rows['password'];
            
        }
    //if it does, check if the password is the same with what is given
        if ($password == $dpassword) {

    // if true then set user session for the user and redirect to the dasbboard
    
            session_start();
            $_SESSION['id'] = $id;

            $_SESSION['username'] = $fname;
            echo "<script> alert('Login was successful'); 
                window.location = '../dashboard.php'; </script>";
            
            }   

            else {
            
                echo "<script> alert('Either Email or Password is not correct'); 
                 window.location = '../forms/login.html'; </script>";
         }
                
        }

        else {
            
               echo "<script> alert('Either Email or Password is not correct'); 
                window.location = '../forms/login.html'; </script>";
        }
    
    
   
}


function resetPassword($email, $password){
    //create a connection variable using the db function in config.php
    $conn = db();

    //open connection to the database and check if username exist in the database
    $list = mysqli_query($conn,"SELECT * FROM Students WHERE email='$email'");
    //echo "<h1 style='color: red'>RESET YOUR PASSWORD (IMPLEMENT ME)</h1>";

    if (mysqli_num_rows($list) > 0) {
            while ($Rows  = mysqli_fetch_assoc($list)) {
                    $demail = $Rows['password'];
            }
            
    //if it does, replace the password with $password given

                $new_password = "UPDATE students SET password = $password";
                
                $task = mysqli_query($conn, $new_password );

                if ($task) {
                    
                    echo "<script> alert('Change of password was successful'); 
                        window.location = '../forms/login.html'; </script>";
                }
                else {
                    echo "<script>alert('could not update');
                    window.location = '../forms/resetpassword.html'; </script>";
            }
            }
    else {
            echo "<script>alert('User does not exist');
            window.location = '../forms/resetpassword.html'; </script>";
    }
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}

 function deleteaccount($id){
     $conn = db();
     $a = "SELECT * FROM students WHERE id=$id";
     $list = mysqli_query($conn, $a);
     //delete user with the given id from the database
     if (mysqli_num_rows($list) > 0) {
        $check = "DELETE FROM students WHERE id =$id";
        $delete = mysqli_query($conn, $check);
        if ($delete) {
            echo "<script>alert('The record was deleted'); 
            window.location ='../php/action.php?all=';</script>";
        }
     }


 }

 