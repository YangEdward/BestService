<div id="{{ $prefix }}_container">
  <button type="button" id="{{ $browse_button_id }}" class="btn btn-primary">浏览文件...</button>
	<div id="file_name"></div>
</div>

<ul id="{{ $prefix }}_filelist"></ul>

<pre id="{{ $prefix }}_console"></pre>

<script type="text/javascript" src="{{ url() }}/packages/fojuth/plupload/assets/js/plupload.full.min.js"></script>
<script type="text/javascript" src="{{ url() }}/packages/fojuth/plupload/assets/js/i18n/zh_CN.js"></script>
<script type="text/javascript">
var {{ $prefix }}_uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	filters: {
		mime_types : [ //只允许上传图片和zip文件
			{ title : "Zip files", extensions : "zip,gif" }
		],
		max_file_size : '{{ $max_file_size }}', //最大只能上传400kb的文件
		prevent_duplicates : true //不允许选取重复文件
	},
	browse_button: '{{ $browse_button_id }}', // this can be an id of a DOM element or the DOM element itself
    container: '{{ $prefix }}_container',
	url: '{{ $handler_gate }}',
	flash_swf_url : '../js/Moxie.swf',
	max_retries : '1',
	silverlight_xap_url : '../js/Moxie.xap',
	multi_selection : 'false'
});

{{ $prefix }}_uploader.init();

{{ $prefix }}_uploader.bind('FilesAdded', function(up, files) {
	var html = '';
	var files_name = '';
	plupload.each(files, function(file) {
		if ({{ $prefix }}_uploader.files.length <= 1) {
			html = '<p id="' + file.id + '">' + file.name + ' (' + plupload.formatSize(file.size) + ') <b></b></p>';
			files_name = file.name;
			return;
		}
		plupload.removeFile(file);

	});
	$('#pic_path').val(files_name);
	document.getElementById('file_name').innerHTML += html;
});

{{ $prefix }}_uploader.bind('UploadProgress', function(up, file) {
	document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
});

{{ $prefix }}_uploader.bind('Error', function(up, err) {
	document.getElementById('{{ $prefix }}_console').innerHTML += "\n错误 #" + err.code + ": " + err.message;
});

	$('form').submit(function () {
	if ({{ $prefix }}_uploader.files.length > 0) {
		{{ $prefix }}_uploader.bind('StateChanged', function () {
			if ({{ $prefix }}_uploader.files.length === ({{ $prefix }}_uploader.total.uploaded + {{ $prefix }}_uploader.total.failed)) {
			}
		});
		{{ $prefix }}_uploader.start();

	} else {
		alert('请添加文件');
		return false;
	}
	return true;
});
</script>
