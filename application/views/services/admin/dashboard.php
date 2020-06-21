<script type="text/javascript">
	$.ajax({
		url: '<?= base_url('admin/Dashboard/get_jumlah') ?>',
		type: 'POST',
		dataType: 'JSON',
		success:function (data) {
			$.each(data, function(siswa, guru, kelas, siswa_pelanggar) {
				$('#total-siswa').html(data.siswa);
				$('#total-guru').html(data.guru);
				$('#total-kelas').html(data.kelas);
				$('#total-konseling').html(data.siswa_pelanggar);
			});
		}
	});
	
</script>
</body>

</html>