<?php 

    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'easymytrip'; 

    $con = mysqli_connect($hname, $uname, $pass, $db);

    if(!$con){
        die("Could not connect to database".mysqli_connect_error());
    }


    // function filteration($data){
    //     foreach($data as $key => $value){
    //         $data[$key] = trim($value);
    //         $data[$key] = stripcslashes($value);
    //         $data[$key] = htmlspecialchars($value);
    //         $data[$key] = strip_tags($value);
    //     }
    //     return $data;
    // }

    // function selectAll($table){
    //     $con = $GLOBALS['con'];
    //     $res = mysqli_query($con,"SELECT * FROM $table");
    //     return $res;
    // }

    // function select($sql,$values,$datatypes){
    //     $con = $GLOBALS['con'];
    //     if($stmt = mysqli_prepare($con,$sql)){
    //         mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    //         if(mysqli_stmt_execute($stmt)){
    //             $res = mysqli_stmt_get_result($stmt);
    //             mysqli_stmt_close($stmt);
    //             return $res;
    //         }
    //         else{
    //             mysqli_stmt_close($stmt);
    //             die("Query could not execute - Select");
    //         }
    //     }
    //     else{
    //         die("Query could not prepared - Select");
    //     }
    // }

    // function update($sql,$values,$datatypes){
    //     $con = $GLOBALS['con'];
    //     if($stmt = mysqli_prepare($con,$sql)){
    //         mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    //         if(mysqli_stmt_execute($stmt)){
    //             $res = mysqli_stmt_affected_rows($stmt);
    //             mysqli_stmt_close($stmt);
    //             return $res;
    //         }
    //         else{
    //             mysqli_stmt_close($stmt);
    //             die("Query could not execute - Update");
    //         }
    //     }
    //     else{
    //         die("Query could not prepared - Update");
    //     }
    // }

    // function insert($sql,$values,$datatypes){
    //     $con = $GLOBALS['con'];
    //     if($stmt = mysqli_prepare($con,$sql)){
    //         mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    //         if(mysqli_stmt_execute($stmt)){
    //             $res = mysqli_stmt_affected_rows($stmt);
    //             mysqli_stmt_close($stmt);
    //             return $res;
    //         }
    //         else{
    //             mysqli_stmt_close($stmt);
    //             die("Query could not execute - insert");
    //         }
    //     }
    //     else{
    //         die("Query could not prepared - insert");
    //     }
    // }

    // function delete($sql,$values,$datatypes){
    //     $con = $GLOBALS['con'];
    //     if($stmt = mysqli_prepare($con,$sql)){
    //         mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    //         if(mysqli_stmt_execute($stmt)){
    //             $res = mysqli_stmt_affected_rows($stmt);
    //             mysqli_stmt_close($stmt);
    //             return $res;
    //         }
    //         else{
    //             mysqli_stmt_close($stmt);
    //             die("Query could not execute - delete");
    //         }
    //     }
    //     else{
    //         die("Query could not prepared - delete");
    //     }
    // }

?>
