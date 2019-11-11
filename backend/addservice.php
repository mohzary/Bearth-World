<?php

   //=======================Get variables======================
    $link = mysqli_connect('mmohzary74735.ipagemysql.com', 'bearth1', '9630','bearthworld'); 
    if(mysqli_connect_errno()){
        return  $result['success']= "Error (1): Could not connect to server now. Please try agin later.";
        exit();
    }
    $result = array();

     if($_GET['servicetype'] == 'c'){ 

        $result['success'] = addServiceCourse($_GET['servicename'], $_GET['date'], $_GET['from'], $_GET['to'], $_GET['servicetype'], $_GET['userid']);


   }elseif($_GET['servicetype'] == 'a'){
       
        $result['success'] = addServiceAppt($_GET['servicename'], $_GET['date'], $_GET['from'], $_GET['to'], $_GET['servicetype'], $_GET['userid']);


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
    
    function addServiceCourse($servicename, $date, $from, $to, $servicetype, $userID){
         global $link;
        
         if (!$link){
                return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
         }else{
            $query = "INSERT INTO courses(CName, TFrom, TTo, CDate, UserID) VALUES ('".$servicename."','".$from."','".$to."','".$date."','".$userID."')";
            if(mysqli_query($link, $query)){
                return  $result['success'] = "1";
             }else{
                return  $result['success'] = "Error (5): 111Couldn't register course- Please try again later.";
             }


         }
     }

      function addServiceAppt($servicename, $date, $from, $to, $servicetype, $userID){
        global $link;
       
        if (!$link){
               return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
        }else{

           $query = "INSERT INTO appointments(AName,ADate,AFrom, TTo, Byuser) VALUES ('".$servicename."','".$date."','".$from."','".$to."','".$userID."')";
           if(mysqli_query($link, $query)){
               return  $result['success'] = "1";
            }else{
               return  $result['success'] = "Error (5): 222Couldn't register course - Please try again later.";
            }


        }
    } 
       
 
           
                    
                    
                    
           
          
           
           
        
    //======================End of database connection==============

?>