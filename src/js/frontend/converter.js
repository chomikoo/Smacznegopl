(function($) {
  "use strict";

  // Temperature Converter
  let lastEdit = "celsius";
  const $celsiusTempInput = $("#tempC");
  const $fahrenheitTempInput = $("#tempF");

  $celsiusTempInput.on("keyup", function() {
    let value = $(this).val();
    lastEdit = "celsius";
    tempConverter(value, lastEdit);
  });

  $fahrenheitTempInput.on("keyup", function() {
    let value = $(this).val();
    lastEdit = "fahrenheit";
    tempConverter(value, lastEdit);
  });

  const tempConverter = (value, lastEdit) => {
    console.log(value, lastEdit);
    if (lastEdit === "celsius") {
      console.log("Clast ed " + lastEdit);
      let converC = Math.round((value * 9) / 5 + 32);
      $fahrenheitTempInput.val(converC);
    } else {
      console.log("Flast ed " + lastEdit);
      let converF = Math.round(((value - 32) * 5) / 9);
      $celsiusTempInput.val(converF);
    }
  };

  // Weight Converter

  const $grams = $("#w_gr");
  const $decagrams = $("#w_dgr");
  const $kilograms = $("#w_kg");
  const $lb = $("#w_lb");
  let activeWeight = "gr";

  $grams.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "gr";
    weightConverter(value, activeWeight);
  });
  $decagrams.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "dgr";
    weightConverter(value, activeWeight);
  });
  $kilograms.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "kg";
    weightConverter(value, activeWeight);
  });
  $lb.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "lb";
    weightConverter(value, activeWeight);
  });

  const weightConverter = (value, activeWeight) => {
    switch (activeWeight) {
      case "gr":
        $decagrams.val((value * 0.1).toFixed(2));
        $kilograms.val((value * 0.001).toFixed(2));
        $lb.val((value * 0.0219).toFixed(2));
        break;
      case "dgr":
        $grams.val((value * 10).toFixed(2));
        $kilograms.val((value * 0.1).toFixed(2));
        $lb.val((value * 0.219).toFixed(2));
        break;
      case "kg":
        $grams.val((value * 1000).toFixed(2));
        $decagrams.val((value * 100).toFixed(2));
        $lb.val((value * 2.19).toFixed(2));
        break;
      case "lb":
        $grams.val((value * 453).toFixed(2));
        $decagrams.val((value * 45.3).toFixed(2));
        $kilograms.val((value * 0.453).toFixed(2));
        break;
      default:
        break;
    }
  };

  // Volume converter

  const $ml = $("#ml");
  const $liters = $("#liters");
  const $ts = $("#ts");
  const $spoon = $("#spoon");
  const $glass = $("#glass");

  let activeVolume = "ml";

  $ml.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "ml";
    volumeConverter(value, activeVolume);
  });
  $liters.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "l";
    volumeConverter(value, activeVolume);
  });
  $ts.on("keyup", function() {
    let value = $(this).val();
    activeWeight = "ts";
    weightConverter(value, activeVolume);
  });
  $spoon.on("keyup", function() {
    let value = $(this).val();
    activeVolume = "spoon";
    volumetConverter(value, activeVolume);
  });
  $glass.on("keyup", function() {
    let value = $(this).val();
    activeVolume = "glass";
    volumeConverter(value, activeVolume);
  });

  const volumeConverter = (value, activeVolume) => {
    switch (activeVolume) {
      case "ml":
        $liters.val(value / 1000);
        $ts.val(toQuarter(value / 5));
        $spoon.val(toQuarter(value / 15));
        $glass.val(toQuarter(value / 250));
        break;
      case "l":
        $ml.val(value * 1000);
        $ts.val(toQuarter(value * 200));
        $spoon.val(toQuarter(value * 66.7));
        $glass.val(toQuarter(value * 4));
        break;
      case "ts":
        $ml.val(value * 5);
        $liters.val(value * 0.005);
        $spoon.val(toQuarter(value / 3));
        $glass.val(toQuarter(value * 50));
        break;
      case "spoon":
        $ml.val(value * 15);
        $liters.val(value * 0.015);
        $ts.val(toQuarter(value * 3));
        $glass.val(toQuarter(value * 16.6666667));
        break;
      case "glass":
        $ml.val(value * 250);
        $liters.val(value / 4);
        $ts.val(toQuarter(value * 50));
        $spoon.val(toQuarter(value * 16.6667));
        break;
      default:
        break;
    }
  };

  const toQuarter = num => {
    return (Math.round(num * 4) / 4).toFixed(2);
  };
})(jQuery);
