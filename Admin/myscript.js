function formatDate(date) {
    var monthNames = [
        "JAN",
        "FEB",
        "MAR",
        "APR",
        "MAY",
        "JUN",
        "JUL",
        "AUG",
        "SEP",
        "OCT",
        "NOV",
        "DEC"
    ];

    var day = date.getDate();
    var monthIndex = date.getMonth();
    var year = date.getFullYear();

    return day + " " + monthNames[monthIndex] + " " + year;
}

function formatTime(d) {
    var hr = d.getHours();
    var min = d.getMinutes();
    if (min < 10) min = "0" + min;

    var ampm = "AM";
    if (hr == 0) {
        hr += 12;
    } else if (hr > 12) {
        hr -= 12;
        ampm = "PM";
    }

    return hr + ":" + min + " " + ampm;
}

function findUC(zone, uc_id) {
    // console.log(uc_id + "|" + zone + "");
    var lyari = '<option value="">Select Union council</option><option value="1">UC-1: Agra Taj Colony</option><option value="2">UC-2: Hingorabad, Daryabad</option><option value="3">UC-3: Liaquat Colony</option><option value="4">UC-4: Nawa Abad</option><option value="5">UC-5: Khadda Market Memon Society</option><option value="6">UC-6: Moosa Lane</option><option value="7">UC-7: Baghdadi</option><option value="8">UC-8: Shah Bagh Lane</option><option value="9">UC-9: Bihar Colony</option><option value="10">UC-10: Ghulistan Colony</option><option value="11">UC-11: Rangi wara</option><option value="12">UC-12: Saeedabad , Singo Lane</option><option value="13">UC-13: Rexer Lane</option><option value="14">UC-14: Kalakot</option><option value="15">UC-15: Nawa Lane</option><option value="63">Motor Vehicle Operator</option><option value="93">Emergency Team - Lyari</option><option value="105">Motor Vehicle Coolies</option><option value="107">Road Gang: Mirza Adam Khan</option><option value="109">Road Gang:Shah Waliullah</option><option value="110">Road Gang: Shah Bhitai</option><option value="111">Road Gang: Tenary</option><option value="112">Road Gang: Chakiwara</option><option value="113">Road Gang: Mewa Shah</option><option value="114">Road Gang: Faqeer M.Dura Khan</option><option value="115">Road Gang: Mehrab Khan Essa Khan</option>';
    var saddar = '<option value="">Select Union council</option><option value="16">UC-16: Old Haji Camp</option><option value="17">UC-17: Ghanchi Para</option><option value="18">UC-18: Ghazi Nagar</option><option value="19">UC-19: Garden</option><option value="20">UC-20: Millat Nagar</option><option value="21">UC-21: Ghazdar Abad</option><option value="22">UC-22: Ranchore Lane</option><option value="23">UC-23: Nanak Wara</option><option value="24">UC-24: Mithadar, Old Town</option><option value="25">UC-25: Kharadar</option><option value="26">UC-26: City Railway Colony</option><option value="27">UC-27: Ratan Talao</option><option value="28">UC-28: Saddar</option><option value="29">UC-29: Civil Lane</option><option value="30">UC-30: Clifton</option><option value="31">UC-31: Kehkashan</option><option value="64">Motor Vehicle Operator</option><option value="92">Emergency Team - Saddar</option><option value="99">Road Gang: M.A Jinnah Road</option><option value="100">Road Gang: Teen Talwar Clifton</option><option value="104">Motor Vehicle Coolies</option>';
    var officeSouth = '<option value="">Select Union council</option><option value="80">Office-L</option><option value="94">Pool Staff</option><option value="101">Administrative Staff</option><option value="102">Workshop Staff</option><option value="103">Motor Vehicle Operators</option><option value="106">Other Staff</option>';
    var jamshed = '<option value="">Select Union council</option><option value="32">UC-1: Akhter Colony</option><option value="33">UC-2: Manzoor Colony-I</option><option value="34">UC-3: Azam Basti</option><option value="35">UC-4: Chanesar Goth</option><option value="36">UC-5: Mehmood Abad</option><option value="37">UC-6: Manzoor Colony-II</option><option value="38">UC-7: PECHS-I</option><option value="39">UC-8: PECHS-II</option><option value="40">UC-9: Jutt Land Lines</option><option value="41">UC-10: Centrel Jacob Line</option><option value="42">UC-11: Behind Jacob Line</option><option value="43">UC-13: Jamsheed Quarters</option><option value="44">UC-14: Fatima Jinnah Colony</option><option value="45">UC-15: Garden East</option><option value="46">UC-16: Sodier Bazaar</option><option value="47">UC-17: Pakistan Quarters</option><option value="65">Workshop-J</option><option value="68">Road Gang: Express Way</option><option value="75">UC-7: PECHS-I C</option><option value="76">UC-7: PECHS-I D</option><option value="77">UC-8: PECHS-II B</option><option value="79">Jamshed Office</option><option value="97">Emergency Team-2 - Jamshed</option><option value="98">Emergency Team - Jamshed</option>';
    var gulshan = '<option value="">Select Union council</option><option value="48">UC-12: Dehli Mercantile Society</option><option value="49">UC-18: Civic Centre</option><option value="50">UC-19: PIB Colony</option><option value="51">UC-20: Essa Nagri</option><option value="52">UC-21: Gulshan e Iqbal</option><option value="53">UC-22: Gilani Railway Station</option><option value="54">UC-23: Shanti Nagar</option><option value="55">UC-24: Jamali Colony</option><option value="56">UC-25: Gulshan e Iqbal-II</option><option value="57">UC-26: New Dhoraji</option><option value="58">UC-27: Pahlwan Goth</option><option value="59">UC-28: Metrovil Colony</option><option value="60">UC-29: Gulzaar e Hijri</option><option value="61">UC-30: Safooran</option><option value="62">UC-31: Gujhro</option><option value="66">Workshop-G</option><option value="69">Road Gang: NED to Safoorah Chowk</option><option value="71">Road Gang: Hassan Square to Nipa</option><option value="72">Road Gang: Karsaz to Essa Nagri</option><option value="73">Road Gang: Shaheed-e-Millat Road</option><option value="74">Road Gang: NIPA to NED University</option><option value="78">Gulshan Office</option><option value="91">Road Gang: Rashid Minhas Road</option><option value="95">Emergency Team - Gulshan</option><option value="96">Road Gang: Jail Road to Hassan Square</option><option value="108">SSWMB-HQ</option>';
    if (zone == "1") return lyari.split(uc_id + '">')[1].split("</option>")[0];
    else if (zone == "2") return saddar.split(uc_id + '">')[1].split("</option>")[0];
    else if (zone == "8") return officeSouth.split(uc_id + '">')[1].split("</option>")[0];
    else if (zone == "3") {
        // console.log(uc_id + '|' + zone);
        // console.log(jamshed.split(uc_id + '">')[1]);
        return jamshed.split(uc_id + '">')[1].split("</option>")[0];
    } else if (zone == "4") return gulshan.split(uc_id + '">')[1].split("</option>")[0];
    else return "";
}

function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}

function SortTable() {
    var sortColumn = parseInt(arguments[0]);
    var type = arguments.length > 1 ? arguments[1] : "T";
    var dateformat = arguments.length > 2 ? arguments[2] : "";
    var table = document.getElementById(TableIDvalue);
    var tbody = table.getElementsByTagName("tbody")[0];
    var rows = tbody.getElementsByTagName("tr");
    var arrayOfRows = new Array();
    type = type.toUpperCase();
    dateformat = dateformat.toLowerCase();
    for (var i = 0, len = rows.length; i < len; i++) {
        arrayOfRows[i] = new Object();
        arrayOfRows[i].oldIndex = i;
        var celltext = rows[i]
            .getElementsByTagName("td")[sortColumn].innerHTML.replace(/<[^>]*>/g, "");
        if (type == "D") {
            arrayOfRows[i].value = GetDateSortingKey(dateformat, celltext);
        } else {
            var re = type == "N" ? /[^\.\-\+\d]/g : /[^a-zA-Z0-9]/g;
            arrayOfRows[i].value = celltext
                .replace(re, "")
                .substr(0, 25)
                .toLowerCase();
        }
    }
    if (sortColumn == TableLastSortedColumn) {
        arrayOfRows.reverse();
    } else {
        TableLastSortedColumn = sortColumn;
        switch (type) {
            case "N":
                arrayOfRows.sort(CompareRowOfNumbers);
                break;
            case "D":
                arrayOfRows.sort(CompareRowOfNumbers);
                break;
            default:
                arrayOfRows.sort(CompareRowOfText);
        }
    }
    var newTableBody = document.createElement("tbody");
    for (var i = arrayOfRows.length - 1; i >= 0; i--) {
        // for (var i = 0, len = arrayOfRows.length; i < len; i++) {
        // console.log(rows[arrayOfRows[i].oldIndex]);
        // if (!rows[arrayOfRows[i].oldIndex].toString().includes('Total'))
        // console.log(rows[arrayOfRows[i].oldIndex].cloneNode(true));
        newTableBody.appendChild(rows[arrayOfRows[i].oldIndex].cloneNode(true));
    }
    // newTableBody.appendChild(rows[arrayOfRows.length - 1].cloneNode(true));
    table.replaceChild(newTableBody, tbody);
} // function SortTable()

function CompareRowOfText(a, b) {
    var aval = a.value;
    var bval = b.value;
    return aval == bval ? 0 : aval > bval ? 1 : -1;
} // function CompareRowOfText()

function CompareRowOfNumbers(a, b) {
    var aval = /\d/.test(a.value) ? parseFloat(a.value) : 0;
    var bval = /\d/.test(b.value) ? parseFloat(b.value) : 0;
    return aval == bval ? 0 : aval > bval ? 1 : -1;
} // function CompareRowOfNumbers()

function GetDateSortingKey(format, text) {
    if (format.length < 1) {
        return "";
    }
    format = format.toLowerCase();
    text = text.toLowerCase();
    text = text.replace(/^[^a-z0-9]*/, "");
    text = text.replace(/[^a-z0-9]*$/, "");
    if (text.length < 1) {
        return "";
    }
    text = text.replace(/[^a-z0-9]+/g, ",");
    var date = text.split(",");
    if (date.length < 3) {
        return "";
    }
    var d = 0,
        m = 0,
        y = 0;
    for (var i = 0; i < 3; i++) {
        var ts = format.substr(i, 1);
        if (ts == "d") {
            d = date[i];
        } else if (ts == "m") {
            m = date[i];
        } else if (ts == "y") {
            y = date[i];
        }
    }
    d = d.replace(/^0/, "");
    if (d < 10) {
        d = "0" + d;
    }
    if (/[a-z]/.test(m)) {
        m = m.substr(0, 3);
        switch (m) {
            case "jan":
                m = String(1);
                break;
            case "feb":
                m = String(2);
                break;
            case "mar":
                m = String(3);
                break;
            case "apr":
                m = String(4);
                break;
            case "may":
                m = String(5);
                break;
            case "jun":
                m = String(6);
                break;
            case "jul":
                m = String(7);
                break;
            case "aug":
                m = String(8);
                break;
            case "sep":
                m = String(9);
                break;
            case "oct":
                m = String(10);
                break;
            case "nov":
                m = String(11);
                break;
            case "dec":
                m = String(12);
                break;
            default:
                m = String(0);
        }
    }
    m = m.replace(/^0/, "");
    if (m < 10) {
        m = "0" + m;
    }
    y = parseInt(y);
    if (y < 100) {
        y = parseInt(y) + 2000;
    }
    return "" + String(y) + "" + String(m) + "" + String(d) + "";
} // function GetDateSortingKey()

function searchFilterTicket() {
    // Declare variables
    var input, filter, found, table, tr, td, i, j;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("list_complaint1");
    tr = table.getElementsByTagName("tr");

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        // for (j = 0; j < td.length; j++) {
        if (td[4].innerHTML.toUpperCase().indexOf(filter) > -1) {
            found = true;
        }
        // }
        if (found) {
            tr[i].style.display = "";
            found = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}