<?php require($_SERVER['DOCUMENT_ROOT'] . '/wp-blog-header.php' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Select Hawaiian Character</title>
	<script type="text/javascript" src="<?php echo site_url(); ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="charmap.js?ver=358-20121205"></script>
</head>
<body id="charmap" style="display:none" role="application">
<table align="center" border="0" cellspacing="0" cellpadding="2" role="presentation">
	<tr>
		<td colspan="2" class="title" ><label for="charmapView" id="charmap_label">Select Hawaiian Character</label></td>
	</tr>
	<tr>
		<td id="charmapView" rowspan="2" align="left" valign="top">
			<!-- Chars will be rendered here -->
		</td>
		<td width="100" align="center" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100" style="height:100px" role="presentation">
				<tr>
					<td id="codeV">&nbsp;</td>
				</tr>
				<tr>
					<td id="codeN">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td valign="bottom" style="padding-bottom: 3px;">
			<table width="100" align="center" border="0" cellpadding="2" cellspacing="0" role="presentation">
				<tr>
					<td align="center" style="border-left: 1px solid #666699; border-top: 1px solid #666699; border-right: 1px solid #666699;"><label for="codeA">HTML-Code</label></td>
				</tr>
				<tr>
					<td style="font-size: 16px; font-weight: bold; border-left: 1px solid #666699; border-bottom: 1px solid #666699; border-right: 1px solid #666699;" id="codeA" align="center">&nbsp;</td>
				</tr>
				<tr>
					<td style="font-size: 1px;">&nbsp;</td>
				</tr>
				<tr>
					<td align="center" style="border-left: 1px solid #666699; border-top: 1px solid #666699; border-right: 1px solid #666699;"><label for="codeB">NUM-Code</label></td>
				</tr>
				<tr>
					<td style="font-size: 16px; font-weight: bold; border-left: 1px solid #666699; border-bottom: 1px solid #666699; border-right: 1px solid #666699;" id="codeB" align="center">&nbsp;</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2" id="charmap_usage">{#advanced_dlg.charmap_usage}</td>
	</tr>
	
</table>
</body>
</html>
