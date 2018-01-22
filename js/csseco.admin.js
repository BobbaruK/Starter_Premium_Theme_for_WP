/**
 * @package CSSecoThemes
 * csseco.admin.js
 */
jQuery(document).ready(function ($) {
    var mediaUploader;
    /**
     * MEDIA UPLOADER - Header Logo
     */
    // Upload Btn
    $('#cssecoUpload-Logo').on('click', function(e){ // TODO: incearca sa faci MEDIAUPLOADER la modu' DRY!
        e.preventDefault();
        // if the mediaUploader exists open mediaUploader
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        // mediaUploader settings
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title       :      'Choose a Logo',
            button      :       {
                text    :       'Choose this'
            },
            multiple    :       false
        });
        // mediaUploader when select the picture
        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#cssecoThLogo').val(attachment.url);
            $('#cssecoAdminLogo').attr('src', attachment.url);
        });
        mediaUploader.open();
    });
    // Remove Btn
    $('#cssecoRemove-Logo').on('click', function(e){
        e.preventDefault();
        var answer = confirm('Are you sure you want to remove yor Profile Picture?');
        if(answer === true) {
            $('#cssecoThLogo').val('');
            $('#cssecoAdminLogo').attr('src', '');
            //$('.csseco_about_page_form').submit();
        }
        // return; // remove comment if write something after this if
    });


    /**
     * MEDIA UPLOADER - Header Background Image
     */
    $('#cssecoUpload-BgImage').on('click', function(e){
        e.preventDefault();
        // if the mediaUploader exists open mediaUploader
        if(mediaUploader){
            mediaUploader.open();
            return;
        }
        // mediaUploader settings
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title       :      'Choose Header Background Image',
            button      :       {
                text    :       'Choose this'
            },
            multiple    :       false
        });
        // mediaUploader when select the picture
        mediaUploader.on('select', function(){
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#cssecoThHeaderBgImage').val(attachment.url);
            $('#cssecoAdminHeaderBgImg').attr('src', attachment.url);
        });
        mediaUploader.open();
    });
    // Remove Btn
    $('#cssecoRemove-BgImage').on('click', function(e){
        e.preventDefault();
        var answer = confirm('Are you sure you want to remove header background image?');
        if(answer === true) {
            $('#cssecoThHeaderBgImage').val('');
            $('#cssecoAdminHeaderBgImg').attr('src', '');
            //$('.csseco_about_page_form').submit();
        }
        // return; // remove comment if write something after this if
    });


    /**
     * Back-end Content/Sidebar
     *  when select other than sidebar bottm or none will remove disabled on content width
     */
    $('#csseco_sidebar_location').change(function() {
        if($(this).val() === 'sidebarLeft' || $(this).val() === 'sidebarRight') {
            $('#csseco_content_width').removeAttr('disabled');
        }
    });

});