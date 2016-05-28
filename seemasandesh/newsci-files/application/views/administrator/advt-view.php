		<?=$header;?>
        <div id="loading_bar" style="height:700px;width:100%; margin-top:-10px; background-color:rgba(102,102,102,.5); z-index:1100; position:fixed; display:;">
            <img src="<?=base_url('admin_docs/images/ajax-loader-blue.gif');?>" style="margin-top:18%; margin-left:45%;">
        </div>
		<div class="container-fluid" style="padding-bottom:10px;background-color:#CCC;">
			<div class="row-fluid" style="margin-top:9px;">
				<div class="col-md-3 col-xs-12">
					<div class="form-group">
                       	<label class="col-sm-2 visible-xs visible-sm control-label" style="color:#FFF;margin-top:7px;">
                           	Advt type: 
						</label>
						<div class="col-md-12 col-sm-9 col-xs-12">
							<select class="form-control" name="advtType" id="advtType" form="advtForm" required>
                                <option value="" data-detail="hideadvttypedetail">------- Choose Advt. Type -------</option>
                                    <?php
                                        foreach ($advttypes as $advttype)
                                        {
                                            echo "<option value='".$advttype['id']."' data-detail='".$advttype['detail']."' >".$advttype['typename']."</option>";
                                        }
                                    ?>
							</select> 
						</div>
					</div>
                </div>
                <div class="col-md-3 hidden-xs">
                </div>
                <div class="col-md-6 col-xs-12">
				</div>
            </div>
		</div>
	</div>
</div>
<div class="container-fluid" style="min-height:89vh;">
    <div class="alert alert-info" role="alert" id="advttypedetail" style="display:none;"></div>
	<div class="panel panel-primary">
	    <div class="panel-heading" id="allAdvtHeading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-sort"></span> All Advertisements</h3>
		</div>
	    <div class="panel-body" id="allAdvtContainer" style="display:none;">
            <?php foreach ($advts as $index => $value): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class='panel-title'><span class='glyphicon glyphicon-tower'></span> <?=$value['typename'];?></h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($value['advts'] as $advtkey => $advtvalue): ?>
                            <div class="row" style="margin-bottom:15px;">
                                <div class="col-md-6">
                                    <div style='padding:6px 12px;border:1px solid #ccc;border-radius:3px;'><?=$advtvalue['content']?></div>
                                </div>
                                <div class="col-md-2">
                                    <div class="btn btn-danger btn-block" data-target='#customModal' data-toggle='modal' data-id="<?=$advtvalue['id'];?>"><span class="glyphicon glyphicon-trash"></span> Delete</div>
                                </div>
                                <div class="col-md-2">
                                    <div class="btn btn-success btn-block" data-id='<?=$advtvalue['id'];?>' data-weburl="<?=$advtvalue['weburl']?>" data-txt="<?=$advtvalue['content'];?>" data-image='<?=$advtvalue['image'];?>' data-target='#editModal' data-toggle='modal' "><span class="glyphicon glyphicon-pencil"></span> Edit</div>
                                </div>
                                <div class="col-md-2">
                                    <input type='checkbox' data-advtid="<?=$advtvalue['id'];?>" <?=($advtvalue['status']==1?'checked':'')?> class='advt-status'/>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class='panel-title'><span class='glyphicon glyphicon-cog'></span> Configuration</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <div class="well">
                                            <div class="row" style="margin-bottom:15px;">
                                                <div class="col-md-6">
                                                    <select class="form-control" id="time-constant-<?=$value['id'];?>">
                                                        <?php $timeval = array(1,2,3,4,5,10,20,30,60); 
                                                            foreach ($timeval as $timeval_key => $timeval_val) {
                                                                if($value['intervalvalue'] == $timeval_val)
                                                                    echo "<option selected='selected'>".$timeval_val."</option>";
                                                                else
                                                                    echo "<option>".$timeval_val."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="time-field-<?=$value['id'];?>">
                                                        <?php $timefieldval = array("SECOND","MINUTE","HOUR"); 
                                                            foreach ($timefieldval as $timefieldval_key => $timefieldval_val) {
                                                                if($value['intervalfield'] == $timefieldval_val)
                                                                    echo "<option selected='selected'>".$timefieldval_val."</option>";
                                                                else
                                                                    echo "<option>".$timefieldval_val."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn btn-success btn-block config-time-btn-cls" data-advtid="<?=$value['id'];?>"><span class="glyphicon glyphicon-upload"></span> Save change timing</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="well">
                                            <div class="row" style="margin-bottom:15px;">
                                                <div class="col-md-12">
                                                    <div class='form-control ' style='border:none;'>Enable/Disable complete advt Type.</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type='checkbox' data-advtid="<?=$value['id'];?>" <?=($value['status']==1?'checked':'')?> class='advt-type-status'/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
	<div class="row">
    	<div class="col-md-12">
        	<div class="well">
                <form id="advtForm">
            		<textarea class="form-control lang_class" id="advttxt" name="advttxt" rows='4' placeholder="Write text for advertisement here." style="resize:none;" ></textarea>
            		<input type="button" id="newscontent" data-id="newscontent" data-target='#copyModal' data-toggle='modal' class="unicode_convert_button btn btn-info btn-sm pull-right"  value="copy" style="margin-bottom:10px;">
                    <input type="url" class="form-control" placeholder="Place website URL here." style="margin-top:10px;" name="weburl" pattern="https?://.+"/>
                    <div class="dropzone text-center" id="advt-dropzone" action="<?=base_url('admin_requests/advt/upload_image');?>" style="margin-top:19px;background-color:#666;"></div>
                    <input type="hidden" id="advtImage" name="advtImage"/>
                    <div class="row" style="margin-top:19px;">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success btn-lg btn-block" id="saveAdvtBtn">
                            	<span class="glyphicon glyphicon-save"></span> Save Advertisement
                            </button>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title" id="customModalLabel">
                        Are you Sure ?
                    </h4>
                </div>
                <div class="modal-body">
                    This will delete the Advertisement !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-danger" id="DeleteAdvt" data-advtid="-1" >Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h4 class="modal-title" id="editModalLabel">Edit Advertisement
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="advtNameInput" class="form-control lang_class" placeholder="Write text for Advertisement here!"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="url" id="advtweburl" class="form-control" placeholder="Write website URL here!"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top:7px;">
                        <div class="col-md-12">
                            <div id="edit-dropzone" class="dropzone text-center" action="<?=base_url('admin_requests/advt/upload_image');?>" style="background-color:#aaaaaa;border:1px solid #666666;border-radius:10px;"></div>
                            <input type="hidden" id="editImage"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-success" id="updateAdvt" data-advtid="-1" >
                        <span class="glyphicon glyphicon-floppy-disk"></span> Update
                    </button>
                </div>
            </div>
        </div>
    </div>