<html>
<head>
</head>
<body>
	<script type="text/javascript">
function download(d) {
        if (d == 'Select document') return;
        window.location = 'http://localhost/sensorlaut2/' + d;
}
</script>

<select name="download" onChange="download(this.value)">
<option>Select document</option>
<option value="downloadPdf.php">PDF1</option>
<option value="downloadPdf2.php">PDF2</option>
</select>
</body>
</html>