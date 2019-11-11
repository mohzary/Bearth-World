<?php

   //=======================Get variables======================
    $link = mysqli_connect('mmohzary74735.ipagemysql.com', 'bearth1', '9630','bearthworld'); 
    if(mysqli_connect_errno()){
        return  $result['success']= "Error (1): Could not connect to server now. Please try agin later.";
        exit();
    }
    $result = array();
    if(!$_GET['email']){
     return  $result['success'] = 'Error (2): campus and permit information are not available.';
    }else{
    
    $result['success'] = getCourses($_GET['email']);
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
    
    function  getCourses($email){
     $coursesListData = " ";
     global $link;
     
            if (!$link) { 
                    
                    return  $result['success'] = "Error (3): Could not connect to server now. Please try agin later.";
                    
            }else{
          
           
           
         $query = " SELECT * FROM courses WHERE UserID = '".mysqli_real_escape_string($link, $email)."'";
         $qresult = mysqli_query($link, $query);
          if(!$qresult || mysqli_num_rows($qresult)== 0){
              return  $result['success'] = "Error (4): Could not reterive your data. Please try agin later.";
           }else{
            while ($row = mysqli_fetch_assoc($qresult)){               
                $coursesListData .= "<ul class='app-list'><label>".$row['Name']."</label><li>Data: ". $row['Date']."</li> <li>From: ". $row['From']."</li> <li>To: ". $row['To']."</li> </ul>";
            }

            }
                  
                 
          
         }
      return  $result['success'] = $coursesListData;
          
     }

         
    
    
    
    //======================End of database connection==============

?>