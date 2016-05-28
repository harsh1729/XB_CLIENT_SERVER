<div class="row">
    <div class="col-md-9 col-lg-9">
        <?=$categorynews;?>
        </div>

    <div class="col-md-3 col-lg-3 col-xs-12 col-sm-12">
        <div class="panel panel-default" id="editorial_container" style="margin-bottom:15px;display:none;">
            <div class="panel-heading text-center">
                <span></span>
            </div>

            <div class="panel-body" style="text-align:center;"></div>
        </div>

        <div class="panel panel-default" style="margin-bottom:15px;display:none;" id="publicmessagecontainer">
            <div class="panel-heading">
                <span id="scrollable_public_message_header">
                </span>
                <span class="glyphicon glyphicon-chevron-right pull-right" id="scrollable-public-message-right-btn" style="color:#000;cursor:pointer;"></span>
                <span class="glyphicon glyphicon-chevron-left pull-right" id="scrollable-public-message-left-btn" style="color:#000;cursor:pointer;"></span>
            </div>

            <div class="panel-body havenicescroll" id="publicmessagebody" style="height:300px;overflow-y:auto;">

            </div>
        </div>

        <div class="panel panel-default" style="margin-bottom:15px;display:none;" id="rivernratescontainer">
            <div class="panel-heading">
                <span></span>
                <span class="glyphicon glyphicon-chevron-right pull-right" id="scrollable-mandi-bhaav-right-btn" style="color:#000;cursor:pointer;"></span>
                <span class="glyphicon glyphicon-chevron-left pull-right" id="scrollable-mandi-bhaav-left-btn" style="color:#000;cursor:pointer;"></span>
            </div>
            <div class="panel-body havenicescroll" id="mandi_bhaav_container" style="padding-bottom:10px;height:300px;overflow:auto;">
                
            </div>
        </div>

        <div class="panel panel-default" style="margin-bottom:15px;display:none;" id="automobilelaunchescontainer">
            <div class="panel-heading text-center">
                
            </div>
            <div class="panel-body havenicescroll" style="height:300px;">
                
            </div>
        </div>

        <div class="panel panel-default" style="margin-bottom:15px;display:none;" id="jokescontainer">
            <div class="panel-heading">
                
            </div>
            <div class="panel-body" style="">
                <img class="img-responsive" src="">
                <div class="text-center"></div>
            </div>
        </div>

        <div class="panel panel-default" style="margin-bottom:15px;display:none;" id="horoscopecontainer">
            <div class="panel-heading">
                <span>राशिफल</span>
                <span class="glyphicon glyphicon-chevron-right pull-right" id="scrollable-rashi-fal-right-btn" style="color:#000;cursor:pointer;"></span>
                <span class="glyphicon glyphicon-chevron-left pull-right" id="scrollable-rashi-fal-left-btn" style="color:#000;cursor:pointer;"></span>
            </div>
            <div class="panel-body" id="rashifal_container" style="height:300px;">
                <div>
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/aries.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">मेष</p>
                    <p id="aries_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/taurus.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">वृषभ</p>
                    <p id="taurus_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/gemini.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">मिथुन</p>
                    <p id="gemini_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/cancer.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">कर्क</p>
                    <p id="cancer_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/leo.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">सिंह</p>
                    <p id="leo_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/virgo.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">कन्या</p>
                    <p id="virgo_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/libra.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">तुला</p>
                    <p id="libra_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/scorpio.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">वृश्चिक</p>
                    <p id="scorpio_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/sagittarius.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">धनु</p>
                    <p id="sagittarius_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/capricorn.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">मकर</p>
                    <p id="capricorn_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/aquarius.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">कुंभ</p>
                    <p id="aquarius_text">
                    </p>
                </div>
                <div style="display:none;">
                    <div style="100%;"><img class="img-responsive center-block" src="<?=base_url($datafoldername.'images/pisces.png');?>"></div>
                    <p class="text-center" style="font-weight: bold">मीन</p>
                    <p id="pisces_text">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>