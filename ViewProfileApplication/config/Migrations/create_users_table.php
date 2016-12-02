<?php
include "../app.php";
class CreateUsersTable{
	
	public function up(){
        $createQuery="create table if not exists users(
        			id int not null primary key auto_increment,
                    username varchar(30) unique not null,
        			password varchar(20) not null,
                    profile_id int,
                    foreign key(profile_id) references profiles(id) on delete cascade on update cascade
        			)";
		if(mysql_query($createQuery))
			echo "table migrated successfully"."<br />";
		else
			echo "error in migration:".mysql_error()."<br />";
		}

    public function down()
    {
        $dropQuery="Drop table users";
        if(mysql_query( $dropQuery))
			echo "table rollbacked successfully"."<br />";
		else
			echo "error in rollback:". mysql_error()."<br />";
	}
}
    $users = new CreateUsersTable;
    if($argv[1]=="migrate")
    	$users->up();
    else if($argv[1]=="rollback")
    	$users->down();
    else
    	echo "need to pass command line argument as migrate or rollback"."<br />";
    
?>