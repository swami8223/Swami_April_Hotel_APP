<?php

include '../db_manager/dbdetails.php';

$webservicess = new webservices();
//echo "CALL INPUT ID1".$webservicess ->iteminput_id;



class webservices {
	function __construct(){
		$dbdetails = new Dbdetails();
		$this->host_name=  Dbdetails :: $host_name;
		$this->username = Dbdetails :: $username;
		$this->password = Dbdetails :: $password;
		$this->dbname = Dbdetails :: $dbname;
		header('Content-Type: application/json');
		$this->iteminput_id=urldecode($_GET["getid_qty"]);
        $this->cartdetails_services($this->iteminput_id);
	}

function cartdetails_itemqty($itm_qty){

        

}

	
	function cartdetails_services($itm_qty){
     


		header('Content-Type: application/json');
		$category_arr = array();
		$menu_number =0;
		$con=mysqli_connect($this->host_name,$this->username,$this->password,$this->dbname);
        $menu_arr['total'] = 0;
		$item_array = array();
        $menu_arr = array();
		$item_info = array();
		if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			else{
        $pieces = explode(",", $itm_qty);
        for($id_qty=0; $id_qty< sizeof($pieces); $id_qty++){
        $id = explode(":", $pieces[$id_qty]);
        //$this->cartdetails_services($id[0],$id[1]);
        $item_id = $id[0];
        $item_qty = $id[1];

		$item_details_select_query = "SELECT * FROM menu_details WHERE menu_id =".$item_id;
		//echo $item_details_select_query;
						$item_details_result = mysqli_query($con,$item_details_select_query);

						while($item_details_row = mysqli_fetch_array($item_details_result)){

	                        $item_array["item_id"] = $item_id;
							$item_array["menu_id"] = $item_details_row['menu_id'];
							$item_array['item_name'] = $item_details_row['item_name'];
							$item_array['item_image'] = $item_details_row['item_image'];
							$item_array['iitem_video'] = $item_details_row['item_video'];
							$item_array['stock_status'] = $item_details_row['stock_status'];
							$item_array['stock_count'] = $item_details_row['stock_count'];
							$item_array['price'] = $item_details_row['price'];
							$item_array['qty'] = $item_qty;
							$item_array['item_total_price'] = $item_qty * $item_array['price'] ;
							$item_array['item_details'] = $item_details_row['item_details'];
							$item_array['todays_special'] = $item_details_row['todays_special'];
							$item_array['online_order'] = $item_details_row['online_order'];
                            $item_info[] = $item_array;
							$menu_arr['item_info'] = $item_info;
							$menu_arr['total'] = $menu_arr['total'] + $item_array['item_total_price'] ;


	                        }   
	                        
                          $delivery_info_json = $menu_arr;
	 
	header('Content-Type: application/json');
	


	  }
	
	echo json_encode($item_info);
                }
    




    }




}

?> 