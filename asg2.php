
<?php
$category=array('a'=>clothes,'b'=>grocery,'c'=>bags);
function display_category($category)
{
 return json_encode($category);
}
function delete_category($category)
{
  unset($category);
 //echo "array is now empty";
}
function insert_category($category)
{
 $postarray=$_POST;
 $newarray=array_merge($category,$postarray);
 return json_encode($newarray);

}
function update_category($category)
{
 $putarray=$_REQUEST;
 $replacearray=array_replace($category,$putarray);
 return json_encode($replacearray);

}
if($_SERVER['REQUEST_METHOD']=='GET')
{
  echo display_category($category);
}
if($_SERVER['REQUEST_METHOD']=='DELETE')
{
 delete_category($category);
 echo "array is now empty";
}
if($_SERVER['REQUEST_METHOD']=='POST')
{
 echo insert_category($category);
}
if($_SERVER['REQUEST_METHOD']=='PUT')
{
 echo update_category($category);
}
?>


