<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

for ($i=0; $i<count($list); $i++) {
            $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], 300, 300);
            echo '<img src="'.$thumb['ori'].'" width="100%"><br>';
}  ?>