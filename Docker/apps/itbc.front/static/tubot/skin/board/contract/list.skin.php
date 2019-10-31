<?php
include_once(G5_PATH."/lib/common.lib.php");
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 선택옵션으로 인해 셀합치기가 가변적으로 변함fsafsfsfsfsd
$colspan = 4;

if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

if($member['mb_level']!=4)
{
	alert('유료회원만 이용 가능합니다.','/');
}
?>
<div class="sub_page">
	<div class="sub_title" style="padding: 77px 0 76px;">
		<h2>마이페이지</h2>
	</div>
</div>
<div class="wrap_1160" style="margin:48px auto;">
	<div style="overflow:hidden;">
		<div class="side_menu">
            <ul>
                <?php if($member['mb_level']==4) :?>
				<li class="active"><a href="/bbs/board.php?bo_table=contract">이용서비스</a></li>
                <?php endif;?>
				<li class="active"><a href="/bbs/member_confirm.php?url=/bbs/register_form.php" style="color: #AAAAAA">회원정보수정</a></li>
				<?php
				$sql = "select b.mb_id, a.cate_seq from g5_member_has_categories_sms a left join g5_member b on a.mb_no=b.mb_no where b.mb_id = '{$_SESSION['ss_mb_id']}' and a.cate_seq ='AB06' and is_use='Y'";
				$row = sql_fetch($sql);

				$sql2="select mb_level from g5_member where mb_id= '{$_SESSION['ss_mb_id']}'";
				$row2=sql_fetch($sql2);

				if ($row >= 1 || $row2['mb_level'] >= 5) :
				?>
				<li><a href="/shop/tubot_pcal.php" style="color: #AAAAAA">투봇8호-매수계산기</a></li>
 				<li><a href="/shop/tubot_rep.php"style="color: #AAAAAA">투봇8호-리포트</a></li>
				<?php endif;?>
            </ul>
		</div>
		<div class="side_contents">
<? if($_GET['sca'] !== "플러스친구") {?>

<!-- 게시판 목록 시작 -->
<div id="bo_list" style="width:<?php echo $width; ?>">
    <!-- 게시판 페이지 정보 및 버튼 시작 { -->
    <div class="bo_fx">
        <?php if ($rss_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($admin_href) { ?><li><a href="<?php echo $admin_href ?>" class="btn_admin">관리자</a></li><?php } ?>
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <!-- } 게시판 페이지 정보 및 버튼 끝 -->

    <form name="fboardlist" id="fboardlist" action="./board_list_update.php" onsubmit="return fboardlist_submit(this);" method="post">
    <input type="hidden" name="bo_table" value="<?php echo $bo_table ?>">
    <input type="hidden" name="sfl" value="<?php echo $sfl ?>">
    <input type="hidden" name="stx" value="<?php echo $stx ?>">
    <input type="hidden" name="spt" value="<?php echo $spt ?>">
    <input type="hidden" name="sca" value="<?php echo $sca ?>">
    <input type="hidden" name="sst" value="<?php echo $sst ?>">
    <input type="hidden" name="sod" value="<?php echo $sod ?>">
    <input type="hidden" name="page" value="<?php echo $page ?>">
    <input type="hidden" name="sw" value="">

    <div class="tbl_head01 tbl_wrap" style="width:868px;">
        <table>
        <thead>
        <tr>
            <th scope="col">상품명</th>
            <th scope="col" width="150">시작일</th>
            <th scope="col" width="150">종료일</th>
            <th scope="col" width="50">관리</th>
        </tr>
        </thead>
        <tbody>
		<?php
	        $sql  = " select a.sv_id,  a.sv_start,  a.sv_end,  a.it_id, a.sv_time, b.* from g5_shop_service a left join {$g5['g5_shop_item_table']} b on ( a.it_id = b.it_id ) ";
	        $sql .= " where a.mb_id = '{$member['mb_id']}' order by a.sv_id desc ";
	        $result = sql_query($sql);
	        for ($i=0; $row = sql_fetch_array($result); $i++) {

	            $it_price = get_price($row);

	            if ($row['it_tel_inq']) $out_cd = 'tel_inq';


		?>
        <tr>
            <!--td><a href="/bbs/board.php?bo_table=contract&wr_id=<?=$list[$i]['wr_id']?>"><?=stripslashes($row['it_name']) ?></td-->
            <td><a href="/shop/item_service.php?it_id=<?=$row['it_id']?>"><?=stripslashes($row['it_name']) ?></a></td>
            <td style="text-align: center;"><?=$row['sv_start'] ?></td>
            <td style="text-align: center;"><?=$row['sv_end'] ?></td>
			<td style="text-align: center;"><a href="<?=G5_SHOP_URL?>/item_service.php?it_id=<?php echo $row['it_id']; ?>">연장</a></td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
    </div>

    <?php if ($list_href || $is_checkbox || $write_href) { ?>
    <div class="bo_fx">
        <?php if ($is_checkbox) { ?>
        <ul class="btn_bo_adm">
            <li><input type="submit" name="btn_submit" value="선택삭제" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택복사" onclick="document.pressed=this.value"></li>
            <li><input type="submit" name="btn_submit" value="선택이동" onclick="document.pressed=this.value"></li>
        </ul>
        <?php } ?>

        <?php if ($list_href || $write_href) { ?>
        <ul class="btn_bo_user">
            <?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
        </ul>
        <?php } ?>
    </div>
    <?php } ?>
    </form>
</div>


<?php if($is_checkbox) { ?>
<noscript>
<p>자바스크립트를 사용하지 않는 경우<br>별도의 확인 절차 없이 바로 선택삭제 처리하므로 주의하시기 바랍니다.</p>
</noscript>
<?php } ?>

<!-- 페이지 -->
<?php echo $write_pages;  ?>

<? } else { ?>
<div style="padding-bottom: 84px">
	<img src="/<?=G5_THEME_DIR ?>/forcebox/images/img_plus_friend_banner.png" alt="" />
</div>
<? }?>

<?php if ($is_checkbox) { ?>
<script>
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function fboardlist_submit(f) {
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(document.pressed + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }

    if(document.pressed == "선택복사") {
        select_copy("copy");
        return;
    }

    if(document.pressed == "선택이동") {
        select_copy("move");
        return;
    }

    if(document.pressed == "선택삭제") {
        if (!confirm("선택한 게시물을 정말 삭제하시겠습니까?\n\n한번 삭제한 자료는 복구할 수 없습니다\n\n답변글이 있는 게시글을 선택하신 경우\n답변글도 선택하셔야 게시글이 삭제됩니다."))
            return false;

        f.removeAttribute("target");
        f.action = "./board_list_update.php";
    }

    return true;
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<?php } ?>
<!-- } 게시판 목록 끝 -->
</div>
</div>
</div>
