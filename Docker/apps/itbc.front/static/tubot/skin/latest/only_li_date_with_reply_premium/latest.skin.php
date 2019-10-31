<?php

//날짜 있는 최근게시물

if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            //echo $list[$i]['icon_reply']." ";
            //echo "<a href=\"".$list[$i]['href']."\">";
            echo $list[$i]['subject'];
            //echo "</a>";

             ?>
            <span class="board_data">
                <?=$list[$i][datetime]?>
            </span>
            <p>
            신청확인 되었습니다. 
            </p>


        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>

