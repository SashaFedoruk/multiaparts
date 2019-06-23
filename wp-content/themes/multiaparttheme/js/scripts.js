var lang = "ru";
var timer;  
var test_str;
var reg;
var prev_lang = "";

var curCurruncy = ["PLN", "zł"];
 $(document).ready(function () {
	 
	 timer = setInterval(func_test_lang, 1000); 
	 
	 function func_test_lang ()
	 {
	 test_str = String(document.getElementById("control_lang").innerHTML);
		 reg = new RegExp("польша","i");
        if (reg.test(test_str))			
			lang = "ru";
		 else lang = "pl";			
			 
		 if (prev_lang == "" || prev_lang != lang)
			 {
				prev_lang = lang;
				if (lang == "ru")
					{
				document.getElementById("lang_tag1").innerHTML = String ("<a href='http://multiaparts.com/wp-content/themes/multiaparttheme/files/regul_ru.pdf' target='_blank'>Правила</a>");
			document.getElementById("datein").placeholder = "Дата заезда";
			document.getElementById("dateout").placeholder = "Дата отъезда";
			document.getElementById("lang_tag2").href = "http://multiaparts.com/wp-content/themes/multiaparttheme/files/regul_ru.pdf";			
					}
				 if (lang == "pl")
					 {
				 document.getElementById("lang_tag1").innerHTML = String ("<a href='http://multiaparts.com/wp-content/themes/multiaparttheme/files/Regulamin.pdf' target='_blank'>Regulamin</a>");	
		 document.getElementById("datein").placeholder = "data przyjazdu";
		document.getElementById("dateout").placeholder = "data wyjazdu";
		document.getElementById("lang_tag2").href = "http://multiaparts.com/wp-content/themes/multiaparttheme/files/Regulamin.pdf";	
					 }
				 
				 
			 }		 
	 }
		 
     $(".all-image .image img").click(function (event) {
         var src = event.target.getAttribute("src");
         $(".image-block img").attr("src", src);
     });
     $(".btn-block a").click(function (event) {
         $("#post-id").val(event.currentTarget.getAttribute("data-id"));
     });
     $(".money-exchange select").change(function (e) {
         var toCurruncyEl = $(".money-exchange select :selected");
         var toCurruncy = [toCurruncyEl.attr("value"), toCurruncyEl.text()];

         var exchangeRateQuery = curCurruncy[0] + "_" + toCurruncy[0];
         $.getJSON(
             "http://free.currencyconverterapi.com/api/v5/convert?q=" + exchangeRateQuery + "&compact=y",
             function (e) {
                 var rate = e[exchangeRateQuery]["val"];
                 curCurruncy = toCurruncy;
                 $(".price").each(function () {
                     var curVal = parseFloat($(this).attr("value"));
                     curVal *= rate;
                     $(this).attr("value", curVal);
                     $(this).html(Math.round(curVal * 100) / 100);
                 });
                 $(".rate").html(" " + curCurruncy[1]);
             });

     });

     var dateFormat = "mm/dd/yy";

     var from = $("#datein")
         .datepicker({
             defaultDate: "+0w",
             changeMonth: true,
             numberOfMonths: 1,
             minDate: new Date(),
             dateformat: dateFormat,
             beforeShowDay: function (date) {
                 var string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                 return [anvailableDates.indexOf(string) == -1];
             }
         })
         .on("change", function (e) {
             to.datepicker("option", "minDate", getDate(this));
         });
     
     var to = $("#dateout").datepicker({
             defaultDate: "+0w",
             changeMonth: true,
             numberOfMonths: 1,
             minDate: new Date(),
             dateformat: dateFormat,
             beforeShowDay: function (date) {
                 var string = jQuery.datepicker.formatDate('mm/dd/yy', date);
                 return [anvailableDates.indexOf(string) == -1];
             }
         })
         .on("change", function (e) {
             from.datepicker("option", "maxDate", getDate(this));
         });
     $.datepicker.regional['ru'];
     $("#ui-datepicker-div").addClass("notranslate");
     function getDate(element) {
         var date;
         try {
             date = $.datepicker.parseDate(dateFormat, element.value);
         } catch (error) {
             date = null;
         }

         return date;
     }

//       braintree.setup(token, 'dropin', {
//           container: 'dropin-container'
//       });
	 	 

 });