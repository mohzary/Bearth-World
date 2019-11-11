<?php

   //=======================Get variables======================
    $link = mysqli_connect('mmohzary74735.ipagemysql.com', 'bearth1', '9630','bearthworld'); 
    if(mysqli_connect_errno()){
        return  $result['success']= "Error (1): Could not connect to server now. Please try agin later.";
        exit();
    }
    $result = array();
    if(!$_GET['username'] || !$_GET['password']){
     return  $result['success'] = 'Error (2): Enter username and password.';
    }else{
    $userName = $_GET['username'];
    $password = $_GET['password'];
    $result['success'] = loginUser($userName,  $password);
   }
    
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
    
    function loginUser($user, $pass){
       
     global $link;
     //$userData = array(); 
            if (!$link) { 
                    
                    return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
                    
            }else{
          
           
           
         $query = " SELECT * FROM users WHERE Email = '".mysqli_real_escape_string($link, $user)."' LIMIT 1";
         $qresult = mysqli_query($link, $query);
          if(!$qresult || mysqli_num_rows($qresult)== 0){
              return  $result['success'] = "Error (4): Could not reterive your data. Please try agin later.";
           }else{
         while ($row = mysqli_fetch_assoc($qresult)){
         if($row['Password'] == $pass){
                  array_push($userData, $row['Email'], $row['Password'], $row['FirstName'], $row['LastName'], $row['Address'], $row['City'], $row['State'],$row['ZipCode'], $row['Facebook'], $row['Twitter'], $row['UserType'], $row['PhoneNumber']);
                  return  $result['success'] = $userData;
                  
          }
         }
         }

            }
    
    }
    
    //======================End of database connection==============

?>