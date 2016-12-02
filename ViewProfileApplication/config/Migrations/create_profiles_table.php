<?php
include "../app.php";
class CreateProfilesTable{
	
	public function up(){
        $createQuery="CREATE TABLE if not exists profiles(
                    id int not null primary key auto_increment,
                    profile_name varchar(30) 
                    )";
		if(mysql_query($createQuery))
			echo "table migrated successfully"."<br />";
		else
			echo "error in migration:".mysql_error()."<br />";
		}

    public function down()
    {
        $dropQuery="Drop table profiles";
        if(mysql_query( $dropQuery))
			echo "table rollbacked successfully"."<br />";
		else
			echo "error in rollback:". mysql_error()."<br />";
	}
}
    $users = new CreateProfilesTable;
    if($argv[1]=="migrate")
    	$users->up();
    else if($argv[1]=="rollback")
    	$users->down();
    else
    	echo "need to pass command line argument as migrate or rollback"."<br />";
    
?>