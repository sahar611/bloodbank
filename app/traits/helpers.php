<?php 



 function resposeJson($status,$message,$data=null){
   $response=[
            'status'=>$status ,
            'message'=>$message,
            'data'=>$data
   ];
            return response()->json($response);

}



?>