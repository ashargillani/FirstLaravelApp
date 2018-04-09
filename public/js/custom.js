$(".delete-btn").on('click', function () {
    var userId = $(this).data('userinfo');
    $('#delete-user-form').attr('action', 'users/'+userId).submit();
});

function deleteUser(userId) {
    $('#delete-user-form').attr('action', ''+userId).submit();
}