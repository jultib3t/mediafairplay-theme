// widgets-holder-wrap
let uploadID = '';
jQuery('.widgets-holder-wrap, #customize-theme-controls').on('click', '.custom_media_upload',function () {
    let identity    =   jQuery(this).data('id');
    let send_attachment_bkp = wp.media.editor.send.attachment;
    uploadID = jQuery(this).prev('input');

    wp.media.editor.send.attachment = function(props, attachment) {
        uploadID.val(attachment.url);
        jQuery('.custom_media_image[data-id="'+identity+'"]').attr('src', attachment.url);
        jQuery('.custom_media_url[data-id="'+identity+'"]').val(attachment.url);
        jQuery('.widefat').trigger('change');
        wp.media.editor.send.attachment = send_attachment_bkp;
    }

    wp.media.editor.open();
    return false;
});