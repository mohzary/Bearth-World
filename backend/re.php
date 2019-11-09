<?php

   //=======================Get variables======================
    $link = mysqli_connect('mmohzary74735.ipagemysql.com', 'bearth1', '9630','bearthworld'); 
    if(mysqli_connect_errno()){
        return  $result['success']= "Error (1): Could not connect to server now. Please try agin later.";
        exit();
    }
    $result = array();



    $result['success'] = registerUser($_GET['fname'],$_GET['lname'], $_GET['phone'], $_GET['email'], $_GET['password'], $_GET['address'], $_GET['city'], $_GET['state'], $_GET['zipcode'], $_GET['fbook'], $_GET['twitter'], $_GET['usertype']);
  
    
//=========================Callback code=====================
if(array_key_exists('callback', $_GET)){
    header('Content-Type: text/javascript; charset=utf8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $callback = $_GET['callback'];
    echo $callback.'('.json_encode($result).');';
}else{
// normal JSON string
    header('Content-Type: application/json; charset=utf8');
    echo json_encode($result);
}

   



    //=======================Connect to database====================
    
    function registerUser(fname, lname, phone, email, password, address, city, state, zipcode, fbook, twitter, usertype){
         global $link;
        
         if (!$link){
                return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
         }else{
               $query = " SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link, $email)."' LIMIT 1";
              $result1 = mysqli_query($link, $query);
              if(mysqli_num_rows($result1) > 0){
                     return  $result['success'] = "Error (4): That email address is already taken.";
                }else{
                        $query2 = "INSERT INTO users(Email, Password, FirstName, LastName, Address, City, State, ZipCode, Facebook, Twitter, UserType, PhoneNumber) VALUES ('".email."','".password."','".fname."','".lname."','".address."','".city."','".state."','".zipcode."','".fbook."','".twitter."','".usertype."','".phone."')";
                 
               if (mysqli_query($link, $query2)){
                  return  $result['success'] = "1";
               }else{
                  return  $result['success'] = "Error (5): Couldn't create user - Please try again later.";
               }

              }

         }

     }
       
 
           
                    
                    
                    
           
          
           
           
        
    //======================End of database connection==============

?>