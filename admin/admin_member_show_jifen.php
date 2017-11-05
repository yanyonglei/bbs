<?php


include  '../common/admin.php';
if(!empty($_GET)){

		 $uid=isset($_GET['id'])?$_GET['id']:'';
		// var_dump($_GET);

		 $regip=$_GET['regip'];

		 $regtime=$_GET['regtime'];

		 $lasttime=$_GET['lasttime'];

		 $grade=$_GET['grade'];

		 $autograph=$_GET['autograph'];

		 $realname=$_GET['realname'];

		 $sex=$_GET['sex'];

		 if($sex=='保密'){
		 	$sex=0;
		 }else if($sex=='男'){
		 	$sex=1;
		 }else {
		 	$sex=2;
		 }

		 $month=$_GET['month'];
		 $year=$_GET['year'];
		 $day=$_GET['day'];
		 $city=$_GET['city'];




		 $data=[
		 	'autograph'=>$autograph,
		 	'regip'=>ip2long($regip),
		 	'grade'=>$grade,
		 	'realname'=>$realname,
		 	'sex'=>$sex,
		 	'birthday'=>$year.'-'.$month.'-'.$day,
		 	'place'=>$city
		 ];


		$res= update($conn,'bbs_user',$data,"uid=$uid");
		//var_dump($res);
		if($res){
			 echo "<meta http-equiv='Refresh' content='0;admin_member_show.php?id=$uid' />";
		}
		
}
