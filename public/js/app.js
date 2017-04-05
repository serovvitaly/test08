$(document).ready(function () {
    $( ".datepicker" ).datepicker();
});

function deteleItem(path) {
    if (!confirm('Вы действительно хотите удалить этот элемент?')) return;

    $.ajax({
        'url': path,
        'method': 'delete',
        'data': {
            '_token': '3F32WqX3RBnzMUpkyOZfFE5fWJIzA6IWar1JYX7D'
        },
        'success': function () {
            window.location.reload()
        }
    });
}