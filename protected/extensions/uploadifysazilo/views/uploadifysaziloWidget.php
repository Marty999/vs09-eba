<?php
	Yii::app()->getClientScript()->registerCoreScript("jquery");
	Yii::app()->getClientScript()->registerScriptFile(CHtml::asset(dirname(__FILE__).'/js/jquery.uploadify.js'));
	Yii::app()->getClientScript()->registerCssFile(CHtml::asset(dirname(__FILE__).'/css/uploadify.css'));
        Yii::trace(CHtml::asset(dirname(__FILE__).'/css/uploadify.css'),'treiss');
	Yii::app()->getClientScript()->registerScript("jqueryUploader","
			$(document).ready(function() {
				$(\"#fileUpload\").fileUpload({
					'uploader': '$uploaderPath',
					'scriptData': $scriptData,
					'cancelImg': '$cancelImage',
					'script': '$uploadScript',
					'folder': '$uploadFolder',
					'fileDesc': '$fileDescription',
					'fileExt': '$fileExtension',
					'multi': $multi,
					'buttonText': '$buttonText',
					'displayData': 'speed',
					'simUploadLimit': $simUploadLimit,
					'auto' : $autoUpload,
					'onComplete': complete,
					onError: function (a, b, c, d) {
					if (d.status == 404)
						alert('Could not find upload script. Use a path relative to: '+' ".getcwd()." ');
					else if (d.type === \"HTTP\")
					   alert('error '+d.type+\": \"+d.status);
					else if (d.type ===\"File Size\")
					   alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
					else
					   alert('error '+d.type+\": \"+d.text);
					},
				});

				function complete(evnt, queueID, fileObj, response, data) {
					$onCompleteJs
				}
			});
			function startUpload () {
				$('#fileUpload').fileUploadStart();
			}",CClientScript::POS_HEAD);
?>
<div id="fileUpload">You have a problem with your javascript</div>
<?php
	//var_dump($autoUpload);
	if ($autoUpload === "false"):
		//echo "Haha";
?>
		<div class='photo_menu'>
			<a href="javascript:startUpload()">Lae ülesse</a> |  <a href="javascript:$('#fileUpload').fileUploadClearQueue()">Tühjenda</a>
		</div>
<?php
	endif;
