(function ($) {
    'use strict'

    // Temperature Converter
    let lastEdit = 'celsius';
    const $celsiusTempInput = $('#tempC');
    const $fahrenheitTempInput = $('#tempF');

    $celsiusTempInput.on('keyup', function () {
        let value = $(this).val();
        lastEdit = 'celsius';
        tempConverter(value, lastEdit);
    });

    $fahrenheitTempInput.on('keyup', function () {
        let value = $(this).val();
        lastEdit = 'fahrenheit';
        tempConverter(value, lastEdit);
    });

    const tempConverter = (value, lastEdit) => {
        console.log(value, lastEdit);
        if (lastEdit === 'celsius') {
            console.log('Clast ed ' + lastEdit);
            let converC = Math.round(value * 9 / 5 + 32);
            $fahrenheitTempInput.val(converC);
        } else {
            console.log('Flast ed ' + lastEdit);
            let converF = Math.round((value - 32) * 5 / 9);
            $celsiusTempInput.val(converF);
        }
    }


    // Weight Converter

    const $grams = $('#w_gr');
    const $decagrams = $('#w_dgr');
    const $kilograms = $('#w_kg');
    const $lb = $('#w_lb');
    let activeInput = 'gr';

    $grams.on('keyup', function () {
        let value = $(this).val();
        activeInput = 'gr';
        weightConverter(value, activeInput);
    });
    $decagrams.on('keyup', function () {
        let value = $(this).val();
        activeInput = 'dgr';
        weightConverter(value, activeInput);
    });
    $kilograms.on('keyup', function () {
        let value = $(this).val();
        activeInput = 'kg';
        weightConverter(value, activeInput);
    });
    $lb.on('keyup', function () {
        let value = $(this).val();
        activeInput = 'lb';
        weightConverter(value, activeInput);
    });


    const weightConverter = (value, activeInput) => {
        switch (activeInput) {
            case 'gr':
                // console.log('gr ' + value);
                $decagrams.val((value * 0.1).toFixed(2));
                $kilograms.val((value * 0.001).toFixed(2));
                $lb.val((value * 0.0219).toFixed(2));
                break;
            case 'dgr':
                // console.log('dgr' + value);
                $grams.val((value * 10).toFixed(2));
                $kilograms.val((value * 0.1).toFixed(2));
                $lb.val((value * 0.219).toFixed(2));
                break;
            case 'kg':
                // console.log('kg' + value);
                $grams.val((value * 1000).toFixed(2));
                $decagrams.val((value * 100).toFixed(2));
                $lb.val((value * 2.19).toFixed(2));
                break;
            case 'lb':
                // console.log('lb' + value);
                $grams.val((value * 453).toFixed(2));
                $decagrams.val((value * 45.3).toFixed(2));
                $kilograms.val((value * 0.453).toFixed(2));
                break;
            default:
                break;
        }
    }


})(jQuery);