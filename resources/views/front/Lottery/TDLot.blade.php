<div section-scroll='0' class="wd_scroll_wrap tDLot_out">
    <!--Slider area end here-->
    <section class="currency-area tDLot">
        <div class="container-fliud">
            <div class="row">
                <div class="col-xs-12">
                    <div class="rete-list bt_title wow  fadeInUp animated tD_body" data-wow-duration="1.0s" style="visibility: visible; animation-duration: 1.0s; animation-name: fadeInUp">
                        <div class="content tD_main">
                            <div class="tD_title">

                                <ul>
                                    <li class="tD_tdbet">
                                        <input type="radio" id="f-option" name="selector" checked>
                                        <label for="f-option">3D bet</label>

                                        <div class="check"></div>
                                    </li>

                                    <li class="tD_sdbet">
                                        <input type="radio" id="s-option" name="selector">
                                        <label for="s-option">2D bet</label>

                                        <div class="check"><div class="inside"></div></div>
                                    </li>

                                    <li class="tD_fdbet">
                                        <input type="radio" id="t-option" name="selector">
                                        <label for="t-option">1D bet</label>

                                        <div class="check"><div class="inside"></div></div>
                                    </li>
                                </ul>

                            </div>
                            <div class="tD_content" id="tdbet">
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_ct_ipt">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                                            <div class="form-group">
                                                <input type="text" id="aname" name="aname">
                                                <label>A</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="bname" name="bname">
                                                <label>B</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="cname" name="cname">
                                                <label>C</label>
                                            </div>
                                            <div class="form-group mul_opt">
                                                <span>×</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="sname" id="sname" name="sname">
                                                <label class="tD_times">times</label>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Lottery</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_ct_cost">
                                        <div class="form-group eq_cost">
                                            <label>Cost = </label>
                                        </div>
                                        <div class="form-group value">
                                            <label>600₹</label>
                                        </div>
                                        <div class="row tD_addbtn">
                                            <button type="button" class="btn btn-warning tD_add_chart">ADDTOCHART</button>
                                            <button type="button" class="btn btn-success tD_add_qbuy">Quick Buy</button>
                                        </div>
                                        <a href="{{url('index/viewcart')}}" class="btn btn-block btn-danger">ViewCart</a>
                                    </div>

                                </div>
                                <div class="row tD_prize">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_prize_result">
                                        <h4>Congratulation <span>ABC is right!!!</span></h4>
                                        <h1>27000 $$</h1>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_prize_detail">
                                        <h4>Single bet Cost = 60 $</h4>
                                        <p>Winning Prize : </p>
                                        <p class="tD_prize_ml">ABC digit match = 27000$</p>
                                        <p class="tD_prize_ml">BC digit match = 1000 $</p>
                                        <p class="tD_prize_ml">C digit match = 100 $</p>

                                        <button type="button" class="btn btn-info">ADD BET</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tD_content" id="sdbet" style="display: none">
                                <div class="row">
                                    <div class="tD_sd_type">
                                        <ul>
                                            <li class="tD_sd_tdbet">
                                                <input type="radio" id="sd-f-option" name="sd_selector" checked>
                                                <label for="sd-f-option">AB</label>

                                                <div class="check"></div>
                                            </li>

                                            <li class="tD_sd_sdbet">
                                                <input type="radio" id="sd-s-option" name="sd_selector">
                                                <label for="sd-s-option">AC</label>

                                                <div class="check"><div class="inside"></div></div>
                                            </li>

                                            <li class="tD_sd_fdbet">
                                                <input type="radio" id="sd-t-option" name="sd_selector">
                                                <label for="sd-t-option">BC</label>

                                                <div class="check"><div class="inside"></div></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_ct_ipt">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                                            <div class="form-group">
                                                <input type="text" id="aname" name="aname">
                                                <label>A</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="bname" name="bname">
                                                <label>B</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="cname" name="cname">
                                                <label>C</label>
                                            </div>
                                            <div class="form-group mul_opt">
                                                <span>×</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="sname" id="sname" name="sname">
                                                <label class="tD_times">times</label>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Lottery</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_ct_cost">
                                        <div class="form-group eq_cost">
                                            <label>Cost = </label>
                                        </div>
                                        <div class="form-group value">
                                            <label>500₹</label>
                                        </div>
                                        <div class="row tD_addbtn">
                                            <button type="button" class="btn btn-warning tD_add_chart">ADDTOCHART</button>
                                            <button type="button" class="btn btn-success tD_add_qbuy">Quick Buy</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row tD_prize">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_prize_result">
                                        <h4>Congratulation <span>AB is right!!!</span></h4>
                                        <h1>700 $$</h1>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_prize_detail">
                                        <h4>Single bet Cost = 12 $</h4>
                                        <p>Winning Prize : </p>
                                        <p class="tD_prize_ml">AB or BC or AC digit match = 700$</p>

                                        <button type="button" class="btn btn-info">ADD BET</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tD_content" id="fdbet" style="display: none">
                                <div class="row">
                                    <div class="tD_sd_type">
                                        <ul>
                                            <li class="tD_sd_tdbet">
                                                <input type="radio" id="fd-f-option" name="fd_selector" checked>
                                                <label for="fd-f-option">A</label>

                                                <div class="check"></div>
                                            </li>

                                            <li class="tD_sd_sdbet">
                                                <input type="radio" id="fd-s-option" name="fd_selector">
                                                <label for="fd-s-option">B</label>

                                                <div class="check"><div class="inside"></div></div>
                                            </li>

                                            <li class="tD_sd_fdbet">
                                                <input type="radio" id="fd-t-option" name="fd_selector">
                                                <label for="fd-t-option">C</label>

                                                <div class="check"><div class="inside"></div></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_ct_ipt">
                                        <form action="" method="post">
                                            <input type="hidden" name="_token" value=" {{ csrf_token() }}"/>
                                            <div class="form-group">
                                                <input type="text" id="aname" name="aname">
                                                <label>A</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="bname" name="bname">
                                                <label>B</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" id="cname" name="cname">
                                                <label>C</label>
                                            </div>
                                            <div class="form-group mul_opt">
                                                <span>×</span>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="sname" id="sname" name="sname">
                                                <label class="tD_times">times</label>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" id="register-submit-btn" class="btn btn-primary uppercase pull-right">Lottery</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_ct_cost">
                                        <div class="form-group eq_cost">
                                            <label>Cost = </label>
                                        </div>
                                        <div class="form-group value">
                                            <label>480₹</label>
                                        </div>
                                        <div class="row tD_addbtn">
                                            <button type="button" class="btn btn-warning tD_add_chart">ADDTOCHART</button>
                                            <button type="button" class="btn btn-success tD_add_qbuy">Quick Buy</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="row tD_prize">
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 tD_prize_result">
                                        <h4>Congratulation <span>A is right!!!</span></h4>
                                        <h1>100 $$</h1>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 tD_prize_detail">
                                        <h4>Single bet Cost = 12 $</h4>
                                        <p>Winning Prize : </p>
                                        <p class="tD_prize_ml">A or B or C digit match = 100 $</p>

                                        <button type="button" class="btn btn-info">ADD BET</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="{{asset('js/vendor/jquery-3.2.1.min.js')}}"></script>
<script>
    $('.tDLot .tD_tdbet').on('click',function () {
        $('.tdbet').css({'display':'inherit'});
        $('#sdbet').css({'display':'none'});
        $('#fdbet').css({'display':'none'});
    })
    $('.tDLot .tD_sdbet').on('click',function () {
        $('.tdbet').css({'display':'none'});
        $('#sdbet').css({'display':'inherit'});
        $('#fdbet').css({'display':'none'});
    })
    $('.tDLot .tD_fdbet').on('click',function () {
        $('.tdbet').css({'display':'none'});
        $('#sdbet').css({'display':'none'});
        $('#fdbet').css({'display':'inherit'});
    })
</script>