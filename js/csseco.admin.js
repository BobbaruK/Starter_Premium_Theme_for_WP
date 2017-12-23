/**
 * @package CSSecoThemes
 * csseco.admin.js
 *
 *
 * MEDIA UPLOADER
 */
jQuery(document).ready(function ($) {
    var mediaUploader;
    // Upload Btn
    $('#cssecoUpload-Logo').on('click', function(e){
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
        var answer = confirm('Are you sure you want to remove yor Profile Picture');
        if(answer == true) {
            $('#cssecoThLogo').val();
            $('#cssecoAdminLogo').attr('src', '');
            $('.csseco_about_page_form').submit();
        }
        return;
    });
});