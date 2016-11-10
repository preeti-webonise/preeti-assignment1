
<?php
$inventory=array('a'=>tshirt,'b'=>watch,'c'=>trousers,'d'=>vegetables,'e'=>milk);
$cart=array('tshirt'=>200,'trousers'=>500,'milk'=>45);
function display_inventory($inventory)
{
 return json_encode($inventory);
}
function display_cart($cart)
{
 echo json_encode($cart);
 $total=array_sum($cart);
 return ($total);
}

function delete_inventory($inventory)
{
  unset($inventory);
}
function delete_cart($cart)
{
  unset($cart);
}
function insert_inventory($inventory)
{
 $postarray=$_POST;
 $newarray=array_merge($inventory,$postarray);
 echo json_encode($newarray);
}
function insert_cart($cart)
{
 $postarray=$_POST;
 $newarray=array_merge($cart,$postarray);
 echo json_encode($newarray);
 $total=array_sum($newarray);
 return ($total);
}
function update_inventory($inventory)
{
	$replace_item=$_REQUEST;
	foreach($inventory as $key=>$value)
	{
		if($replace_item['name']==$key)
		{
			$newValue=$replace_item['value'];
			$rep = array(''.$key => $newValue );
			$put_inventory=array_replace_recursive($inventory, $rep);
		}
	}
	return json_encode($put_inventory);

}
function update_cart($cart)
{ 
        $replace_item=$_REQUEST;
	foreach($cart as $key=>$value)
	{
		if($replace_item['name']==$key)
		{
			$newValue=$replace_item['value'];
			$rep = array(''.$key => $newValue );
			$put_cart=array_replace_recursive($cart, $rep);
		}
	}
        echo json_encode($put_cart);
	$total=array_sum($put_cart);
        return ($total);
}

if($_SERVER['REQUEST_METHOD']=='GET')
{
  $id=$_GET['id'];
  if($id=="inventory")
  {
   echo display_inventory($inventory);
  }
  if($id=="cart")
  {
   echo display_cart($cart);
  }
}
if($_SERVER['REQUEST_METHOD']=='DELETE')
{
  $id=$_GET['id'];
  if($id=="inventory")
  {
    delete_inventory($inventory);
   echo "array is now empty";
  }
  if($id=="cart")
  {
    delete_cart($cart);
   echo "array is now empty";
  }
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
 $id=$_GET['id'];
 if($id=="inventory")
  {
    echo insert_inventory($inventory);
  }
  if($id=="cart")
  {
    echo insert_cart($cart);
  }
}
if($_SERVER['REQUEST_METHOD']=='PUT')
{
 $id=$_GET['id'];
 if($id=="inventory")
  {
   echo update_inventory($inventory);
  }
  if($id=="cart")
  {
   echo update_cart($cart);
  }
}
?>


