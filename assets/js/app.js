
$(document).ready(function(){
    $(".formatCurrency").number(true,0);

    $(".enSelect2").select2({});

    $(".selectCskh").select2({
        placeholder: "Tìm tài khoản",
        allowClear: true,
        ajax: {
            url: $(".selectCskh").data('url'),
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    datatable: 'datatable'
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1
    });
});