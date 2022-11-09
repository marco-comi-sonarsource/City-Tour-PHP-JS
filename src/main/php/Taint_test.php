<?php
    $tainted = $_GET['id'];
    $numberList = array($tainted,3,7);
    mysql_query($numberList[0]); // S3649 should raise an issue here
    mysql_query($numberList[2]);
    $numberList2 = array();
    $numberList2[0] = $tainted;
    $numberList2[1] = 3;
    $numberList2[2] = 7;
    mysql_query($numberList2[0]); // S3649 should raise an issue here
    mysql_query($numberList2[2]);
    $numberList3 = array();
    for($i = 0; $i < 10; $i++)
    {
        $numberList3[$i] = $tainted;
    }
    $numberList3[0] = "safe";
    mysql_query($numberList3[5]); // S3649 should raise an issue here
    mysql_query($numberList3[0]);
    $aArray = array("a","b",$tainted);
    mysql_query($aArray[2]); // S3649 should raise an issue here
    array_pop($aArray);
    $aArray[2] = "safe";
    mysql_query($aArray[0]); // no issue expected here
    mysql_query($aArray[1]); // no issue expected here
    mysql_query($aArray[2]); // no issue expected here
    $bArray = array("a","b","c");
    array_push($bArray,$tainted);
    mysql_query($bArray[0]); // no issue expected here
    mysql_query($bArray[1]); // no issue expected here
    mysql_query($bArray[2]); // no issue expected here
    mysql_query($bArray[3]); // S3649 should raise an issue here
    $dArray = array($tainted,"b","c");
    mysql_query( array_shift($dArray) ); // S3649 should raise an issue here
    mysql_query($dArray[0]); // no issue expected here
    mysql_query($dArray[1]); // no issue expected here
    $iArray = array("b","c","d",);
    mysql_query($iArray[0]); // no issue expected here
    array_unshift($iArray,$tainted);
    mysql_query($iArray[0]); // S3649 should raise an issue here
?>