<?php

   //=======================Get variables======================
    $link = mysqli_connect('mmohzary74735.ipagemysql.com', 'bearth1', '9630','bearthworld'); 
    if(mysqli_connect_errno()){
        return  $result['success']= "Error (1): Could not connect to server now. Please try agin later.";
        exit();
    }
    $result = array();
    if($_GET['service']){
     return  $result['success'] = 'Error (2): campus and permit information are not available.';
    }else{
        if($_GET['service'] == 'a'){

            $result['success'] = searchAppts($_GET['city']);

        }elseif($_GET['service'] == 'c'){

            $result['success'] = searchCourses($_GET['city'], $_GET['email']);

        } 
    
    
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
    
    function  searchAppts($city){
     $apptsListData = " ";
     global $link;
     
            if (!$link) { 
                    
                    return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
                    
            }else{
          
           
           
         $query = " SELECT * FROM appointments WHERE AFor IS NULL AND City = '".$city."'";
         $qresult = mysqli_query($link, $query);
          if(!$qresult || mysqli_num_rows($qresult)== 0){
              return  $result['success'] = "Error (4): Could not reterive your data. Please try agin later.";
           }else{
            while ($row = mysqli_fetch_assoc($qresult)){
             
                $apptsListData .= "<ul class='app-list'><label>".$row['AName']."</label><li>Service Provider: ".$row2['FirstName']." ".$row2['LastName']."</li><li>Data: ". $row['ADate']."</li> <li>From: ". $row['AFrom']."</li> <li>To: ". $row['TTo']."</li><li>Contact: ". $row2['PhoneNumber']."</li> </ul>";
            }
                       

            }
                   
                  
                 
          
         }
         return  $result['success'] = $apptsListData;
          
         }


         searchCourses($city, $email){
             


         }

            
    
   
    
    //======================End of database connection==============

?>