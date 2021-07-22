$(document).ready(function() {
    $("input:not([type='hidden']), select, button").addClass("input-sm");
    $("input").attr("autocomplete", "off");
});


function show_success_alert(elem, html) {
    $(elem).removeClass().html("");
    $(elem).addClass("alert alert-dismissable alert-success");
    $(elem).html(html);
    $(elem).show();
    $(elem).delay(8000).slideUp(500);
}

function show_error_alert(elem, html) {
    $(elem).removeClass().html("");
    $(elem).addClass("alert alert-dismissable alert-danger");
    $(elem).html(html);
    $(elem).show();
}

function show_warning_alert(elem, html) {
    $(elem).removeClass().html("");
    $(elem).addClass("alert alert-dismissable alert-warning");
    $(elem).html(html);
    $(elem).show();
}

function show_info_alert(elem, html) {
    $(elem).removeClass().html("");
    $(elem).addClass("alert alert-dismissable alert-info");
    $(elem).html(html);
    $(elem).show();
}

function load_popup(type, title, message) {
    $.Zebra_Dialog(message, {
        'type': type,
        'title': title
    });
}

function validateEmail(sEmail) {
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (filter.test(sEmail)) {
        return true;
    }
    else {
        return false;
    }
}

function getURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return sParameterName[1];
        }
    }
}

//Show real time clock
tday = new Array("Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
tmonth = new Array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

function GetClock() {
    var d = new Date();
    var nday = d.getDay(), nmonth = d.getMonth(), ndate = d.getDate(), nyear = d.getYear(), nhour = d.getHours(), nmin = d.getMinutes(), ap;
    if (nhour == 0) {
        ap = " AM";
        nhour = 12;
    }
    else if (nhour < 12) {
        ap = " AM";
    }
    else if (nhour == 12) {
        ap = " PM";
    }
    else if (nhour > 12) {
        ap = " PM";
        nhour -= 12;
    }

    if (nyear < 1000)
        nyear += 1900;
    if (nmin <= 9)
        nmin = "0" + nmin;

    document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ap + "";
}

window.onload = function() {
    //GetClock();
    //setInterval(GetClock, 1000);
}

function validate() {
    var isValid = true;
    $('input.required, select.required').each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    if (isValid == false) {
        return false;
    }

}

function validate_component(elem) {
    var isValid = true;
    $(elem + " input.required, " + elem + " select.required").each(function() {
        if ($.trim($(this).val()) == '') {
            isValid = false;
            $(this).css({
                "border": "1px solid red",
                "background": "#FFCECE"
            });
        }
        else {
            $(this).css({
                "border": "",
                "background": ""
            });
        }
    });
    if (isValid == false) {
        return false;
    }

}

function popupCenter(url, title, w, h) {
    var left = (screen.width / 2) - (w / 2);
    var top = (screen.height / 2) - (h / 2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
} 

Date.prototype.yyyymmdd = function() {         
                                
        var yyyy = this.getFullYear().toString();                                    
        var mm = (this.getMonth()+1).toString(); // getMonth() is zero-based         
        var dd  = this.getDate().toString();             
                            
        return yyyy + '-' + (mm[1]?mm:"0"+mm[0]) + '-' + (dd[1]?dd:"0"+dd[0]);
   };  
   
