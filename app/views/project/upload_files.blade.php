<div id="file_container">
  <button type="button" id="browse_button" class="btn btn-primary">浏览文件...</button>
	<div id="file_name"></div>
</div>

<ul id="file_filelist"></ul>

<pre id="file_console"></pre>

<script type="text/javascript" src="{{ url() }}/packages/fojuth/plupload/assets/js/plupload.full.min.js"></script>
<script type="text/javascript" src="{{ url() }}/packages/fojuth/plupload/assets/js/i18n/zh_CN.js"></script>
@section('foot_script')
	@parent
<script type="text/javascript">
var file_uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	filters: {
		mime_types : [ //只允许上传图片和zip文件
			{ title : "Zip files", extensions : "zip" }
		],
		max_file_size : '5mb', //最大只能上传5Mb的文件
		prevent_duplicates : true //不允许选取重复文件
	},
	browse_button: 'browse_button', // this can be an id of a DOM element or the DOM element itself
    container: 'file_container',
	url: '{{URL::to('customer/file_load')}}',
	flash_swf_url : '../js/Moxie.swf',
	max_retries : '1',
	silverlight_xap_url : '../js/Moxie.xap',
	multi_selection : 'false'
});

file_uploader.init();

file_uploader.bind('FilesAdded', function(up, files) {
	var html = '';
	var files_name = '';
	plupload.each(files, function(file) {
		if (file_uploader.files.length <= 1) {
			html = '<p id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></p>';
			files_name = file.name;
			return;
		}
		plupload.removeFile(file);

	});
	$('#file_path').val(files_name);
	document.getElementById('file_name').innerHTML += html;
});

file_uploader.bind('UploadProgress', function(up, file) {
	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

file_uploader.bind('Error', function(up, err) {
	document.getElementById('file_console').innerHTML += "\n错误 #" + err.code + ": " + err.message;
});

	$('form').submit(function () {
	if (file_uploader.files.length > 0) {
		file_uploader.bind('StateChanged', function () {
			if (file_uploader.files.length === (file_uploader.total.uploaded + file_uploader.total.failed)) {
			}
		});
		file_uploader.start();

	} else {
		alert('请添加文件');
		return false;
	}
	return true;
});
</script>
	@stop
