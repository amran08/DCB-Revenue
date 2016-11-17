var Cantonment_bangla_numbers = {
    '০': 0,
    '১': 1,
    '২': 2,
    '৩': 3,
    '৪': 4,
    '৫': 5,
    '৬': 6,
    '৭': 7,
    '৮': 8,
    '৯': 9,
    '।': '.'

};

function replaceNumbers(input) {
    var output = [];
    for (var i = 0; i < input.length; ++i) {
        if (Cantonment_bangla_numbers.hasOwnProperty(input[i])) {
            output.push(Cantonment_bangla_numbers[input[i]]);
        } else {
            output.push(input[i]);
        }
    }
    return output.join('');
}

function blockNonNumbers(obj, e, allowDecimal, allowNegative) {
    var key;
    var isCtrl = false;
    var keychar;
    var reg;

    if (window.event) {
        key = e.keyCode;
        isCtrl = window.event.ctrlKey
    }
    else if (e.which) {
        key = e.which;
        isCtrl = e.ctrlKey;
    }

    if (isNaN(key)) return true;

    keychar = String.fromCharCode(key);

    // check for backspace or delete, or if Ctrl was pressed
    if (key == 8 || isCtrl) {
        return true;
    }

    reg = /\d/;
    var isFirstN = allowNegative ? keychar == '-' && obj.value.indexOf('-') == -1 : false;
    var isFirstD = allowDecimal ? keychar == '.' && obj.value.indexOf('.') == -1 : false;

    return isFirstN || isFirstD || reg.test(keychar);
}


var Cantonment_validation = {

    isEmailAddress: function (str) {
        var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return pattern.test(str);  // returns a boolean
    },
    isNotEmpty: function (str) {
        var pattern = /\S+/;
        return pattern.test(str);  // returns a boolean
    },
    isInteger: function (str) {
        str = replaceNumbers(str);
        //console.log(str);
        var pattern = /^\d+$/;
        return pattern.test(str);  // returns a boolean
    },
    isAnyNumber: function (str) {
        str = replaceNumbers(str);
        // console.log(str);
        var numStr = /^-?(\d+\.?\d*)$|(\d*\.?\d+)$/;
        return numStr.test(str);
    }


};
var cantonment_translation = {
    'number_allowed': 'শুধুমাত্র সংখ্যা প্রযোজ্য',
    'apartment_information_fill': 'এপারট্মেন্টের তথ্য পূর্ণ করুন',
    'dohs_select': 'ডিওএইচএস সিলেক্ট করুন',
    'insert_first_plot': 'প্রথম প্লটটি সংযোজন করুন',
    'plot_not_found': 'কোনো প্লট পাওয়া যায়নি',
    'no_building_found_for_this_dohs': 'এই ডিওএইচএস এর জন্যে কোনো ভবন পাওয়া যায়নি',
    'invalid_dohs_selected': 'ডিওএইচএস সঠিক নয়',
    'already_added_plot': 'প্লটটি ইতিমধ্যে সংযোজিত হয়েছে ,অন্যটি দিয়ে চেষ্টা করুন',
    'same_plot_as_before': 'পূর্বের প্লট নাম্বারটি টাইপ করেছেন',
    'total_amount_not_be_empty': 'সর্বমোট  আদায়ের  পরিমাণ দেয়া হয়নি',
    'total_amount_is_greater_than_assessed': 'আদায়ের পরিমাণ নির্ধারিত পরিমানের চেয়ে বেশী',
    'total_amount_calculate_msg': 'সর্বমোট পরিমাণ উল্লেখ করা হয়নি'
}

var duration_of_error_msg = 4;


$(document).on('input', '.any-number-validation', function (e) {
    var $val = $(this).val();
    if ($val != "" || $val != undefined)
        if (Cantonment_validation.isAnyNumber($val) == true) {
            // console.log("TRUE");
            return true;
        }
        else if (Cantonment_validation.isAnyNumber($val) == false) {
            //console.log("false");
            $(this).val($(this).val().slice(0, -1));

            return $("body").overhang({
                type: "error",
                message: cantonment_translation.number_allowed,
                duration: duration_of_error_msg
            });
        }
});
$(document).on('input', '.nid-number', function (e) {
    var $val = $(this).val();
    if ($val != "" || $val != undefined)
        if (Cantonment_validation.isInteger($val) == true) {
            console.log("TRUE");
            return true;
        }
        else if (Cantonment_validation.isInteger($val) == false) {
            console.log("false");
            $(this).val($(this).val().slice(0, -1));
            return $("body").overhang({
                type: "error",
                message: cantonment_translation.number_allowed,
                duration: duration_of_error_msg
            });
        }
});

$(document).on('input', '.integer-validation', function (e) {
    var $val = $(this).val();
    if ($val != "" || $val != undefined)
        if (Cantonment_validation.isInteger($val) == true) {
            console.log("TRUE");
            return true;
        }
        else if (Cantonment_validation.isInteger($val) == false) {
            console.log("false");
            $(this).val($(this).val().slice(0, -1));
            return $("body").overhang({
                type: "error",
                message: cantonment_translation.number_allowed,
                duration: duration_of_error_msg
            });
        }
});