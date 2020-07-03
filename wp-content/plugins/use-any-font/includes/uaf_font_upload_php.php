<table class="wp-list-table widefat fixed bookmarks">
    <thead>
        <tr>
            <th><strong>Upload Fonts</strong></th>
        </tr>
    </thead>
    <tbody>
    <tr>
        <td>
<p align="right"><input type="button" name="open_add_font" onClick="open_add_font();" class="button-primary" value="Add Fonts" /><br/></p>

<div id="font-upload" style="display:none;">
	<form action="admin.php?page=uaf_settings_page" id="open_add_font_form" method="post" enctype="multipart/form-data">
    	<table class="uaf_form">
        	<tr>
            	<td width="175">Font Name</td>
                <td><input type="text" name="font_name" value="" maxlength="20" class="uaf_required" style="width:200px;" /></td>
            </tr>	
            <tr>    
                <td>Font File</td>
                <td><input type="file" name="font_file" id="font_file" value="" class="uaf_required" accept=".woff,.ttf,.otf" /><br/>
                <?php 
				
				?>
                <em>Accepted Font Format : <?php echo join(", ",$GLOBALS['allowedFontFormats']); ?> | Font Size: Upto <?php echo uaf_max_upload_size_for_php(); ?>MB</em><br/>
                
                </td>
            </tr>
            <tr>        
                <td>&nbsp;
                	
                </td>
                <td>
                	
                	<input type="hidden" name="url" value="<?php echo home_url(); ?>" />
                	<input type="hidden" name="api_key" value="<?php echo $uaf_api_key; ?>" />
                	<input type="hidden" name="font_count" value="<?php echo uaf_count_uploaded_fonts(); ?>" />
               		<input type="submit" name="submit-uaf-font-php" class="button-primary" value="Upload" />


                <p>By clicking on Upload, you confirm that you have rights to use this font.</p>
                </td>
            </tr>
        </table>	
    </form>
    <br/><br/>
</div>

<?php include('uaf_uploaded_font_list.php'); ?>

<script>
	function open_add_font(){
		jQuery('#font-upload').toggle('fast');
	}

    jQuery('#open_add_font_form').submit(function(){
        breakValidation = false;
        jQuery('#open_add_font_form .uaf_required').each(function(){
            if(!jQuery(this).val()){
                jQuery(this).focus();
                breakValidation = true;
                return false;
            }
        });    
        if(breakValidation){return false;}
    });
</script>
<br/>
</td>
</tr>
</tbody>
</table><br/>