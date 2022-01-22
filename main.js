//root url
function root(){
    var path = window.location.pathname;
    var a = path.split('/');
    return '/'+a[1]+'/';
}

// get all the elements
function get_all(elementName) {
    for (var e = document.getElementsByName(elementName), t = [], n = e.length - 1; n >= 0; n--) t.push(e[n]);
    return t
}

// function stdReg(reg) {
//     if (reg != '') {
//         $('.tgs').css('display', 'none');
//     } else {
//         $('.tgs').css('display', 'block');
//     }
// }

// login
$('#loginfrm').submit(function(event){
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: root()+'process.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
            if (res.indexOf('incorrect') >= 0) {
                alert(res);
            } else {
                window.location = root()+res;
            }
        },
        dataType: 'text'
    });
});

// add new User
$('#addUser').submit(function(event){
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: root()+'process.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
            $('#addUser')[0].reset();
            gUser('getExaminer');
            gUser('getAuditor');
            gUser('getExamOfficer');
            alert(res);
        },
        dataType: 'text'
    });
});

// Upload result
$('#uploadResltFrm').submit(function(event){
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: root()+'process.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
            $('#uploadResltFrm')[0].reset();
            getReq('getexUpldCrs', '#exUpldCrs', 'examiner');
            getReq('getexUpldCrs', '#othersUpldCrs', 'others');
            alert(res);
        },
        dataType: 'text'
    });
});

// fetch items
function gUser(utype) {
    $.ajax({
        method: 'POST',
        url: root()+'process.php',
        data: {
            reqtype: utype
        },
        success: function(res) {
            if (utype == 'getExaminer') {
                $('#allExaminer').html(res);
            } else if (utype == 'getAuditor') {
                $('#allAuditor').html(res);
            } else if (utype == 'getExamOfficer') {
                $('#allExaOfficer').html(res);
            }
        },
        dataType: 'text'
    });
}
gUser('getExaminer');
gUser('getAuditor');
gUser('getExamOfficer');

// get Request
function getReq(req, des, spec){

    $.ajax({
        method: 'POST',
        url: root()+'process.php',
        data: { 
            request: req,
            spec: spec
        },
        success: function(res) {
            $(des).html(res);
        },
        dataType: 'text'
    });
}
getReq('getexUpldCrs', '#exUpldCrs', 'examiner');
getReq('getexUpldCrs', '#othersUpldCrs', 'others');

// delete items
function dellstud(studnt_ID, nm, tbl, clmn) {
    let ques = confirm('are you sure to delete '+nm);
    if (ques == true) {
        $.ajax({
            method: 'POST',
            url: root()+'process.php',
            data: {
                dl_Studt: 1,
                studnt_ID: studnt_ID,
                table: tbl,
                clmn: clmn
            },
            success: function() {
                alert('deleted');
                var path = window.location.pathname;
                window.location = path;
            },
            dataType: 'text'
        });
    }
}

// pop up show
function tgglPopUp() {
    $('#mypopUp').css('display', 'block');
}

// pop up close
function closePopUp() {
    $('#mypopUp').css('display', 'none');
}

// validate image
function valImg() {
    let imageee = document.getElementById("filename").files[0].name;
    var ext = imageee.split('.').pop().toLowerCase();
    
    if (imageee !== '') {
        if(jQuery.inArray(ext, ['xls','xlsx']) == -1) {
            $('#filename').val('');
            alert("Invalid File");
        }
    }
}

// // update requests
// function updReq(req, requesterID, datte, qsup, it_id) {
//     let ques = confirm('are you sure to '+req+' this request?'),
//     qn = get_all(qsup),
//     qsss = [],
//     i_id = get_all(it_id),
//     i_IID = [];

//     if (ques == true) {
//         if (req == 'Approve') {
//             for (var n = qn.length - 1; n >= 0; n--) {
//                 qsss.push(qn[n].value);
//             }
//             for (var n = i_id.length - 1; n >= 0; n--) {
//                 i_IID.push(i_id[n].value);
//             }
//         }
//         $.ajax({
//             method: 'POST',
//             url: root()+'process.php',
//             data: {
//                 updatReqq: 1,
//                 req: req,
//                 requesterID: requesterID,
//                 datte: datte,
//                 qsss: qsss,
//                 i_IID: i_IID
//             },
//             success: function() {
//                 alert(req);
//                 gReq();
//             },
//             dataType: 'text'
//         });
//     }
// }