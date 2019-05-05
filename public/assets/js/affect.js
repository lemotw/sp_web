$(document).ready(function() {
    $('.row').click(
        function() {
            var ch = $(this).children('.ckbox');

            if(ch.prop('checked'))
                $(this).removeClass('checked');
            else
                $(this).addClass('checked');
            ch.prop('checked', !ch.prop('checked'));
        }
    );
});