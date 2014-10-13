<?php mc_template_part('header'); ?>
	<link rel="stylesheet" href="<?php echo mc_site_url(); ?>/Kindeditor/themes/default/default.css" />
	<link href="<?php echo mc_theme_url(); ?>/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
	<div class="container">
		<div class="row">
			<form role="form" method="post" action="<?php echo U('home/perform/publish_baobei'); ?>">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>
								选择分类
							</label>
							<select class="form-control" name="term">
								<?php $terms = M('page')->where('type="term_baobei"')->order('id desc')->select(); ?>
								<?php foreach($terms as $val) : ?>
								<option value="<?php echo $val['id']; ?>">
									<?php echo $val['title']; ?>
								</option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="form-group">
							<label>
								宝贝名称
							</label>
							<input name="title" type="text" class="form-control" placeholder="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>
						购买链接
					</label>
					<input name="link" type="url" class="form-control" placeholder="">
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<?php $time = date('Y-m-d',strtotime("now")); ?>
			                <label for="dtp_input1" class="control-label pull-left">开始时间</label>
			                <div class="input-group date form_datetime pull-left input" data-date="<?php echo $time; ?>T00:00:00Z" data-date-format="yyyy-mm-dd HH:ii p" data-link-field="dtp_input1">
			                    <input class="form-control" size="16" type="text" value="" readonly>
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove icon-remove-circle"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input1" value="" name="stime" />
							<div class="clearfix"></div>
			            </div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
			                <label for="dtp_input2" class="control-label pull-left">结束时间</label>
			                <div class="input-group date form_datetime pull-left input" data-date="<?php echo $time; ?>T00:00:00Z" data-date-format="yyyy-mm-dd HH:ii p" data-link-field="dtp_input2">
			                    <input class="form-control" size="16" type="text" value="" readonly>
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove icon-remove-circle"></span></span>
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar icon-calendar"></span></span>
			                </div>
							<input type="hidden" id="dtp_input2" value="" name="etime" />
							<div class="clearfix"></div>
			            </div>
					</div>
				</div>
				<div class="form-group">
					<label>
						宝贝介绍
					</label>
					<textarea name="content" class="form-control" rows="3"></textarea>
				</div>
				<button type="submit" class="btn btn-warning btn-block">
					<i class="glyphicon glyphicon-ok"></i> 提交
				</button>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>
						宝贝价格
					</label>
					<input name="price" type="text" class="form-control" placeholder="0.00">
				</div>
				<div class="form-group">
					<label>
							封面图片
					</label>
					<div id="pub-imgadd">
						<img class="default-img" src="<?php echo mc_theme_url(); ?>/img/upload.jpg">
						<input type="hidden" name="fmimg" value="">
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/kindeditor-min.js"></script>
	<script charset="utf-8" src="<?php echo mc_site_url(); ?>/Kindeditor/lang/zh_CN.js"></script>
	<script>
		var editor;
		KindEditor.ready(function(K) {
			editor = K.create('textarea[name="content"]', {
				resizeType : 1,
				allowPreviewEmoticons : false,
				allowImageUpload : true,
				height : 400,
				uploadJson : '<?php echo U('Publish/index/upload'); ?>',
				items : ['source', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'clearhtml', 'quickformat', 'selectall', '|', 
		'formatblock', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
		'italic', 'underline', 'strikethrough', 'removeformat', '|', 'image', 'multiimage', 'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'],
				afterChange : function() {
					K(this).html(this.count('text'));
				}
			});
		});
		KindEditor.ready(function(K) {
				    	var editor = K.editor({
							uploadJson : '<?php echo U('Publish/index/upload'); ?>',
							allowFileManager : true
						});
						K('.default-img').click(function() {
							editor.loadPlugin('image', function() {
								editor.plugin.imageDialog({
									showRemote : false,
									clickFn : function(url, title, width, height, border, align) {
										$('.default-img').attr('src',url);
										$('#pub-imgadd input').val(url);
										editor.hideDialog();
									}
								});
							});
						});
					});
				</script>
	<script type="text/javascript" src="<?php echo mc_theme_url(); ?>/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php echo mc_theme_url(); ?>/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
	<script type="text/javascript">
	    $('.form_datetime').datetimepicker({
	        //language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
	        showMeridian: 1
	    });
	</script>
<?php mc_template_part('footer'); ?>