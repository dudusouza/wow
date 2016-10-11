$(document).ready(function () {

    $(".ts-sidebar-menu li a").each(function () {
        if ($(this).next().length > 0) {
            $(this).addClass("parent");
        }
        ;
    })
    var menux = $('.ts-sidebar-menu li a.parent');
    $('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);
    $('.more').click(function () {
        $(this).parent('li').toggleClass('open');
    });
    $('.parent').click(function (e) {
        e.preventDefault();
        $(this).parent('li').toggleClass('open');
    });
    $('.menu-btn').click(function () {
        $('nav.ts-sidebar').toggleClass('menu-open');
    });


    $('#zctb').DataTable();


    $("#input-43").fileinput({
        showPreview: false,
        allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
        elErrorContainer: "#errorBlock43"
                // you can configure `msgErrorClass` and `msgInvalidFileExtension` as well
    });
    $(".remove-item").click(function () {
        return confirm('Você deseja remover esse item?');
    });
    (function () {
        var filter = $('.filter');
        var open = false;
        $('input,textarea', filter).each(function () {
            if ($(this).val() != "") {
                open = true;
            }
        })
        $('select', filter).each(function () {
            if ($(this).find('option:selected').val() != "") {
                open = true;
            }
        })
        $('.title-filter').addClass('showed');
        if (!open) {
            $('.filter').hide();
            $('.title-filter').addClass('hideded').removeClass('showed');
        }
        $('.title-filter').click(function () {
            $('.filter').toggle();
            $('.title-filter').toggleClass('hideded').toggleClass('showed');
        })
        $('.limpar-filtro').click(function () {
            $('input,textarea', filter).each(function () {
                $(this).val('');
            })
            $('input[type="checkbox"],input[type="radio"]').each(function () {
                $(this).attr("checked", false)
            })
            $('option').each(function () {
                $(this).attr("selected", false)
            })
            $(this).parents('form').submit();
        })
        $('.pagination').click(function () {
            var href = $(this).attr('href');
            $('#pager').val('href');
            $(this).parents('form').submit();
            return false;
        });
        $('select.multiple').multiSelect({
            dblClick: true
        })
    })();
    $('#account').submit(function () {
        $.ajax({
            url: ADMIN_URL + 'minha-conta/valid',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'JSON',
            success: function (json) {
                if (json.success) {
                    document.getElementById('account').submit();
                } else {
                    alert(json.msg);
                }
            }
        })
        return false;
    });
    (function () {
        $('.summernote').summernote({
            height: 400,
            callbacks: {
                onKeydown: function (e) {
                    var html = $(this).summernote('code');
                    var rel = $(this).attr("rel");
                    var counterObj = $($(this).data("counter"));
                    var max = parseInt($(this).data("max"));
                    if (max > 0) {
                        var num = $(this).summernote('code').replace(/(<([^>]+)>)/ig, "").length;
                        counterObj.html(num);
                        var arrkeys = [8, 188, 46, 40, 35, 27, 36, 37, 34, 33, 190, 39, 32, 9, 38, 116, 18, 182, 183];

                        if ($.inArray(e.keyCode, arrkeys) === -1) {
                            if (max < (num + 1)) {
                                e.preventDefault();
                                e.stopPropagation();
                            }
                        }
                    }

                    $(rel).val(html);
                }
            }
        });
        $('.summernote').each(function () {
            var that = $(this);
            setInterval(function () {
                var rel = that.attr("rel");
                var html = $(that).summernote('code');
                $(rel).val(html);
            }, 200);
        })

    })();
    (function () {
        $('.upload-file-image input').change(function () {
            var img = $(this).parents('.upload-file-image').find('img');
            if (this.files.length > 0) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    img.attr('src', e.target.result).show();
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    })();
    $('.sortable-table').find('tbody').sortable({
        stop: function () {
            var arrData = {};
            var index = 0;
            $(this).find("tr").each(function () {
                var id = $(this).data('id');
                arrData[id] = index;
                index++;
            });
            $.ajax({
                url: SITE_MENU + 'order/sorter',
                data: {itens: arrData},
                type: 'post'
            })
        }
    });
    $("input.money").maskMoney({showSymbol: true, symbol: "R$", decimal: ",", thousands: "."});
});


window.alert = function (msg) {
    if (msg === undefined) {
        msg = 'undefined';
    }
    $('#modal-alert').find('.modal-body').html(msg);
    $('#modal-alert').modal('show');
};
