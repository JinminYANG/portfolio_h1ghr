<?php
//header("Content-Type: application/json");

$at_name = $_POST["at_name"];
$members = array(
		"jay_park"=>array("album"=>"안녕하세요 저는 양진민 입니다.",
        "da"=>"2020-08-25")
);
echo '{ "at_name" : "'.$at_name.'" ,
    "ab_name" : "'.$members[$at_name]['album'].'",
    "date" : "'.$members[$at_name]['da'].'" }';


$db_host = 'localhost';
$db_user = 'yangjinmin';
$db_passwd = 'aa7594609*';
$db_name = 'yangjinmin';
$db_conn = mysqli_connect( $db_host, $db_user, $db_passwd, $db_name );

//mysqli_set_charset( $db_conn, 'utf8' );
//$pageDom = new DomDocument();
//$searchPage = mb_convert_encoding( $htmlUTF8Page, 'HTML-ENTITIES', 'UTF-8' );
//@$pageDom->loadHTML( $searchPage );
//mysqli_query( $db_conn, 'set session character_set_connection=utf8;' );
//mysqli_query( $db_conn, 'set session character_set_results=utf8;' );
//mysqli_query( $db_conn, 'set session character_set_client=utf8;' );

//$db_sql = 'SELECT * FROM albums WHERE ' + $at_name + ';';
$db_sql = "SELECT * FROM albums;";

$db_result = mysqli_query( $db_conn, $db_sql );
while( $db_row = mysqli_fetch_row( $db_result ) ) {
    $members += array($at_name=>
        array(
            "album"=>.$db_row['ab_name'].,
            "da"=>.$db_row['date'].
        )
    );
    
//    echo '{"at_name":"}'.$at_name.'","ab_name": "'.$members[$at_name]['album'].'","date": "'.$members[$at_name]['da'].'"}';
}

?>