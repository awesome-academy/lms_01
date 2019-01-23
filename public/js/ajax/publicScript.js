
function ajaxToggleWordRemember(bookid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/home/follow-book",
        type: 'POST',
        cache: false,
        data: {bookid:bookid},
        success: function(data){
            $('#word'+bookid).replaceWith(data);
        },
        error: function (){
            alert(Lang.get('errors.ajax-error'));
        }
    });

}

$('.saveBook').on('click', function (e) {
    if (confirm($(this).data('confirm'))) {
        top.location.href = '/login';
    }
    else {
        return false;
    }
});

function ajaxToggleWordRememberDetail(bookid){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/detail/follow-book",
        type: 'POST',
        cache: false,
        data: {bookid:bookid},
        success: function(data){
            $('#wordD'+bookid).replaceWith(data);
        },
        error: function (){
            alert(Lang.get('errors.ajax-error'));
        }
    });

}
