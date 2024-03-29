<div class="foot-fixbar-box">
    <div class="foot-fixbar-in">
        <h1 class="foot-fix-tt">itbc stock VIP서비스 3일 무료체험신청 </h1>
        <form id="create-experience" method="post" action="/experience" onsubmit="return false;">
            <input type="hidden" name="path_code" value="자체" />
            <input type="hidden" name="media_path_code" value="803" />
            <input type="hidden" name="phone" value="" />
            <ol class="vps-check-con-list">

                @foreach($policy->contents->items as $v)
                    <?php
                        $require_label  = $v->is_require=='Y' ? '필수' : '선택';
                    ?>
                    <li class="vps-check-area">
                        <div class="check-zone">
                            <label>
                                <input type="checkbox" name="policy_id[{{$v->pc_id}}]" value="{{$v->policy_id}}" class="chkbx" id="mk-check-ver-0{{$v->policy_id}}" checked>
                                <span>{{$v->title}}({{$require_label}})</span>
                            </label>
                        </div>
                        <div class="guide-txt">
                            <strong class="tt">{{$v->title}}</strong>
                            <div class="tostxt">
                                <dt>{!! $v->contents !!}</dt>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ol>

            <div class="info-write-zone">

                <div class="w-dv name-w"><input type="text" name="name" class="main-form-put" placeholder="이름"></div>
                <div class="w-dv phone-w">
                    <div class="w-in-dv fir">
                        <select class="main-form-put ff-select" id="phone1" >
                            <option value="010">010</option>
                            <option value="011">011</option>
                            <option value="017">017</option>
                            <option value="018">018</option>
                        </select>
                    </div>
                    <div class="w-in-dv mid"><input type="text" id="phone2" class="main-form-put"></div>
                    <div class="w-in-dv las"><input type="text" id="phone3" class="main-form-put"></div>
                </div>
                <div class="w-dv btn-w"><button type="button" onclick="post_experience();" class="main-btn smal red-c">신청하기</button></div>
            </div>

        </form>
    </div>
</div>