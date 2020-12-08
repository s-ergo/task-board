$(document).ready(function() {

    "use strict";

    $('.container').on('change', 'input:checkbox', function() {

        let status = '';
        if ($(this).prop('checked') === true) {
            status = 'выполнено';
        }

        let id = $(this).attr('id');
        let data = {
            id,
            status
        };

        let path = '/status';

        let response = fetch(path, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(data)
        });

    });
});