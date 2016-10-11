/*
 * 
 * utopic | labs - powered by Utopic Farm 2010
 * 
 * @author		Tolga Arican
 * @website		http://labs.utopicfarm.com/ufvalidator
 * @website		http://www.utopicfarm.com
 * @version		1.0.7
 * 
 */


// FORM VALIDATOR JQUERY PLUGIN - START

(function ($) {

    $.fn.formValidator = function (options) {
        $(this).click(function () {

            // merge options with defaults
            var merged_options = $.extend({}, $.formValidator.defaults, options);

            var result = $.formValidator(merged_options);

            if (result && jQuery.isFunction(merged_options.onSuccess)) {
                merged_options.onSuccess();
                return false;
            } else if (!result && jQuery.isFunction(merged_options.onError)) {
                merged_options.onError();
                return false;
            } else {
                return result;
            }
        });
    };

    $.formValidator = function (merged_options) {

        // result boolean
        var boolValid = true;

        // result error message
        var errorMsg = '';

        // clean errors
        $(' .error-both,.error-same, .error-input', $(merged_options.scope)).removeClass('error-both').removeClass('error-same').removeClass('error-input');

        // gather inputs & check is valid
       var arrErrorMsg = [];
        $('.req-email, .req-string, .req-same, .req-both, .req-numeric, .req-date, .req-min', $(merged_options.scope)).each(function () {
            var thisValid = $.formValidator.validate($(this), merged_options);
            boolValid = boolValid && thisValid.error;
            if (!thisValid.error) {
                console.log($.inArray(thisValid.message, arrErrorMsg));
                if ($.inArray(thisValid.message, arrErrorMsg)===-1) {
                    arrErrorMsg[arrErrorMsg.length] = thisValid.message;
                }
            }
        });
        errorMsg = arrErrorMsg.join("\n");
        // check extra bool
        if (!merged_options.extraBool() && boolValid) {
            boolValid = false;
            errorMsg += "\n" + merged_options.extraBoolMsg;
        }

        // submit form if there is and valid
        if ((merged_options.scope != '') && boolValid) {
            $(merged_options.errorDiv).fadeOut();
        }

        // if there is errorMsg print it if it is not valid
        if (!boolValid && errorMsg != '') {

            var tempErr = (merged_options.customErrMsg != '') ? merged_options.customErrMsg : errorMsg;
            $(merged_options.errorDiv).hide().html(tempErr).fadeIn();
        }

        return {success: boolValid, msg: $.trim(errorMsg)};
    };

    $.formValidator.validate = function (obj, opts) {
        if (opts === undefined) {
            opts = $.formValidator.defaults;
        }
        var valAttr = (obj.val() == obj.attr('title')) ? '' : obj.val();
        var css = opts.errorClass;
        var mail_filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var numeric_filter = /(^-?\d\d*\.\d*$)|(^-?\d\d*$)|(^-?\.\d\d*$)|(^-?\d*$)/;
        var tmpresult = true;
        var result = true;
        var errorTxt = '';
        var type = obj.attr('type')
        if (type === 'checkbox' || type === 'radio') {
            valAttr = $('[name="' + obj.attr('name') + '"]:checked').val();
        }

        // REQUIRED FIELD VALIDATION
        if (obj.hasClass('req-string')) {
            tmpresult = (valAttr != '') && (valAttr != obj.attr('title'));
            if (!tmpresult)
                errorTxt = opts.errorMsg.reqString;
            result = result && tmpresult;
        }
        // SAME FIELD VALIDATION
        if (obj.hasClass('req-same')) {

            tmpresult = true;

            group = obj.attr('rel');
            tmpresult = true;
            $(opts.scope + ' .req-same[rel="' + group + '"]').each(function () {
                if ($(this).val() != valAttr || valAttr == '') {
                    tmpresult = false;
                }
            });
            if (!tmpresult && !opts.silent) {
                $(opts.scope + ' .req-same[rel="' + group + '"]').parent().parent().addClass('error-same');
                errorTxt = opts.errorMsg.reqSame;
            } else {
                $(opts.scope + ' .req-same[rel="' + group + '"]').parent().parent().removeClass('error-same');
            }

            result = result && tmpresult;
        }
        // BOTH INPUT CHECKING
        // if one field entered, the others should too.
        if (obj.hasClass('req-both')) {

            tmpresult = true;

            if (valAttr != '') {

                group = obj.attr('rel');

                $(opts.scope + ' .req-both[rel="' + group + '"]').each(function () {
                    if ($(this).val() == '') {
                        tmpresult = false;
                    }
                });

                if (!tmpresult && !opts.silent) {
                    $(opts.scope + ' .req-both[rel="' + group + '"]').parent().parent().addClass('error-both');
                    errorTxt = opts.errorMsg.reqBoth;
                } else {
                    $(opts.scope + ' .req-both[rel="' + group + '"]').parent().parent().removeClass('error-both');
                }
            }

            result = result && tmpresult;
        }
        // E-MAIL VALIDATION
        if (obj.hasClass('req-email')) {
            tmpresult = mail_filter.test(valAttr);
            if (!tmpresult)
                errorTxt = (valAttr == '') ? opts.errorMsg.reqMailEmpty : opts.errorMsg.reqMailNotValid;
            result = result && tmpresult;
        }
        // DATE VALIDATION
        if (obj.hasClass('req-date')) {

            tmpresult = true;

            var arr = valAttr.split(opts.dateSeperator);
            var curDate = new Date();

            if (valAttr == '') {

                tmpresult = true;
            } else {

                if (arr.length < 3) {
                    tmpresult = false;
                } else {
                    tmpresult = (arr[0] <= 31) && (arr[1] <= 12) && (arr[2] <= curDate.getFullYear());
                }
            }

            if (!tmpresult)
                errorTxt = opts.errorMsg.reqDate;
            result = result && tmpresult;
        }
        // MINIMUM REQUIRED FIELD VALIDATION
        if (obj.hasClass('req-min')) {
            tmpresult = (valAttr.length >= obj.attr('minlength'));
            if (!tmpresult)
                errorTxt = opts.errorMsg.reqMin.replace('%2', obj.attr('minlength'));
            result = result && tmpresult;
        }
        // CPF
        if (obj.hasClass('req-cpf')) {
            var Soma;
            var Resto;
            Soma = 0;
            var strCPF = obj.val();
            strCPF = strCPF.replace('.', '').replace('.', '').replace('-', '');
            tmpresult = true;
            if (strCPF == "00000000000" || strCPF == "11111111111" || strCPF == "22222222222" || strCPF == "33333333333" || strCPF == "44444444444" || strCPF == "55555555555" || strCPF == "66666666666" || strCPF == "77777777777" || strCPF == "88888888888" || strCPF == "99999999999")
                tmpresult = false;

            for (i = 1; i <= 9; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(9, 10))) {
                tmpresult = false
            }

            Soma = 0;
            for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
            Resto = (Soma * 10) % 11;

            if ((Resto == 10) || (Resto == 11))
                Resto = 0;
            if (Resto != parseInt(strCPF.substring(10, 11))) {
                tmpresult = false
            }
            if (!tmpresult)
                errorTxt = opts.errorMsg.reqCpf;
            result = result && tmpresult;
        }



        // NUMERIC FIELD VALIDATION
        if (obj.hasClass('req-numeric')) {
            tmpresult = numeric_filter.test(valAttr);
            if (!tmpresult)
                errorTxt = opts.errorMsg.reqNum;
            result = result && tmpresult;
        }

        if (obj.attr('rel')) {
            if (result) {
                $('#' + obj.attr('rel')).removeClass(css);
            } else if (!opts.silent) {
                $('#' + obj.attr('rel')).addClass(css);
            }
        } else {
            if (result) {
                if (opts.errorTarget != '')
                    obj.parents(opts.errorTarget).removeClass(css);
                else
                    obj.removeClass(css);
            } else {
                if (opts.errorTarget != '')
                    obj.parents(opts.errorTarget).addClass(css);
                else
                    obj.addClass(css);
            }
        }
        var fieldName = obj.data('name');
        if (fieldName === undefined) {
            fieldName = obj.attr('name');
        }
        return {
            error: result,
            message: errorTxt.replace('%1', obj.data('name'))
        };
    };

    // CUSTOMIZE HERE or overwrite by sending option parameter
    $.formValidator.defaults = {
        silent: false,
        onSuccess: null,
        onError: null,
        scope: '',
        errorTarget: '',
        errorClass: 'error-input',
        errorDiv: '#warn',
        errorMsg: {
            reqString: 'Fill the required field',
            reqDate: 'Date is not <b>valid</b>!',
            reqNum: 'Just numeric field',
            reqMailNotValid: 'E-Mail is not <b>valid</b>!',
            reqMailEmpty: 'Please enter an e-mail.',
            reqSame: 'Fields are <b>not</b> same!',
            reqBoth: 'You have to fill same fields!',
            reqMin: 'You have to enter at least %1 characters',
            reqCpf: '%1  not <b>valid</b>'
        },
        customErrMsg: '',
        extraBoolMsg: 'Please check the form!',
        dateSeperator: '.',
        extraBool: function () {
            return true;
        }
    };
    $.valider = function (form, options) {
        var opt = $.extend($.formValidator.defaults, options);
        opt.scope = form;
        return $.formValidator(opt);
    }
})(jQuery);
// FORM VALIDATOR JQUERY PLUGIN - END