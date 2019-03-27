var base = $('#candidatejs').text();
$('#ngaysinh1').datetimepicker({
   timepicker:false,
   format:'d-m-Y',
   defaultDate:'+1960/01/01',
   maxDate:'+1960/01/01'
});
$('#ngaycap').datetimepicker({
  timepicker:false,
  maxDate:'+1970/01/01',
  format:'d-m-Y'
});
$('#tuden1').datetimepicker({
    timepicker:false,
   format:'d-m-Y'
  });
$('#tuden2').datetimepicker({
  timepicker:false,
   format:'d-m-Y'
});
$('#tuden3').datetimepicker({
  timepicker:false,
   format:'d-m-Y'
});
$('#tuden4').datetimepicker({
  timepicker:false,
   format:'d-m-Y'
});
$('#tuden5').datetimepicker({
  timepicker:false,
   format:'d-m-Y'
});
$('#tuden6').datetimepicker({
  timepicker:false,
   format:'d-m-Y'
});


 $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
 
 $('#anh2').hide();
 $('#anh1').mouseenter(function()
 {
    $('#anh2').show();
    $('#anh2').mouseenter(function()
    {
      $('#anh2').show();
    });
});

 $('#anh1').mouseleave(function()
 {
    $('#anh2').hide();
    $('#anh2 ').mouseleave(function()
   {
     $('#anh2').hide();
    });
});
 function edit_anh()
 {
  //alert("asd");
    $('#edit_anh_modal').modal('show');
 }
 $(document).ready(function(){
        $('#browsebutton :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label").attr('placeholder',fileName)
        });
    });
$(document).ready(function(){
        $('#browsebutton1 :file').change(function(e){
            var fileName = e.target.files[0].name;
            $("#label1").text(fileName);
            $("#label1").attr('href','#');
        });
    });      
        
function parseQuery(queryString) {
    var query = {};
    var pairs = (queryString[0] === '?' ? queryString.substr(1) : queryString).split('&');
    for (var i = 0; i < pairs.length; i++) {
        var pair = pairs[i].split('=');
        
        query[decodeURIComponent(pair[0].replace(/\+/g, '%20'))] = decodeURIComponent(pair[1].replace(/\+/g, '%20') || '');
    }
    return query;
}

//them xoa sua quan he gia dinh
  function editmodal(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them11').text("Lưu");
      $('#myModal11').modal('show');
      $('#hoten11').val(data2.hoten);
      $('#nn11').val(data2.nghenghiep);
      $('#checkup').val(data2.recordid);
      $('#namsinh11').val(data2.namsinh);
      $('#quanhe11').val(data2.quanhe);
  }
  function showmodel11(){
    $('#them11').text("Thêm");
   
    $('#myModal11').modal('show');
    $('#hoten11').val("");
    $('#nn11').val("");
    $('#checkup').val("0");
    $('#namsinh11').val("0");
    $('#quanhe11').val("0");
  }
  function delmodal(idform){
    var data = ""; 
    data = $("#"+idform+"").serialize();
    var data2 = parseQuery(data);
    $('#myModaldel').modal('show');
    $('#checkup1d').val(data2.recordid);
  }

 // them xoa sua kinh nghiem lam việc 
  function editmodal2(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them12').text("Lưu");
      $('#myModal2').modal('show');
      $('#tuden5').val(data2.tungay);
      $('#tuden6').val(data2.denngay);
      $('#checkup2').val(data2.recordid);
      $('#cty2').val(data2.cty);
       $('#chucvu2').val(data2.vitri);
        $('#nhiemvu2').val(data2.nhiemvu);
       $('#lydonghi2').val(data2.lydo);
       $('#dc2').val(data2.diachi);
       $('#sdt2').val(data2.sdt);
  }
  function showmodel2(){
  
      $('#them12').text("Thêm");
     
      $('#myModal2').modal('show');
       $('#tuden5').val("");
      $('#tuden6').val("");
      $('#checkup2').val("0");
      $('#cty2').val("");
       $('#chucvu2').val("");
        $('#nhiemvu2').val("");
       $('#lydonghi2').val("");
       $('#dc2').val("");
       $('#sdt2').val("");
  }
  function delmodal2(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel2').modal('show');
      $('#checkup2d').val(data2.recordid);
      
  }
 // them xoa sua nguoi tham chieu
  function editmodal3(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them3').text("Lưu");
      $('#myModal3').modal('show');
     $('#hoten3').val(data2.hoten);
      $('#chucvu3').val(data2.vitri);
      $('#checkup3').val(data2.recordid);
      $('#congty3').val(data2.cty);
       $('#lienhe3').val(data2.lienhe);
  }
  function showmodel3(){
  
      $('#them3').text("Thêm");
     
      $('#myModal3').modal('show');
       $('#hoten3').val("");
      $('#chucvu3').val("");
      $('#checkup3').val("0");
      $('#congty3').val("");
       $('#lienhe3').val("");
  }
      
  function delmodal3(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel3').modal('show');
      $('#checkup3d').val(data2.recordid);
      
  }
 // them xoa sua trinh do hoc van
   function editmodal4(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them4').text("Lưu");
      $('#myModal4').modal('show');
       $('#tuden1').val(data2.tu);
      $('#tuden2').val(data2.den);
      $('#checkup4').val(data2.recordid);
      $('#truong4').val(data2.truong);
       $('#noihoc4').val(data2.noihoc);
       $('#nganhhoc4').val(data2.nganhhoc);
       $('#trinhdo4').val(data2.chungchi);
       if(data2.caonhat == "Y"){
         $('#caonhat4').prop('checked',true);
        } else {
           $('#caonhat4').prop('checked',false);
        }
  }
  function showmodel4(){
  
      $('#them4').text("Thêm");
     
      $('#myModal4').modal('show');
       $('#tuden1').val("");
      $('#tuden2').val("");
      $('#checkup4').val("0");
      $('#truong4').val("");
       $('#noihoc4').val("");
       $('#nganhhoc4').val("");
       $('#trinhdo4').val("");
       $('#caonhat4').prop('checked',false);
  }
      
  function delmodal4(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel4').modal('show');
      $('#checkup4d').val(data2.recordid);
      
  }
   function editmodal5(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them5').text("Lưu");
      $('#myModal5').modal('show');
       $('#tuden3').val(data2.tu);
      $('#tuden4').val(data2.den);
      $('#checkup5').val(data2.recordid);
      $('#truong5').val(data2.truong);
       $('#tghoc5').val(data2.tghoc);
       $('#donvi5').val(data2.donvi);
       $('#nganhhoc5').val(data2.nganhhoc);
       $('#bangcap5').val(data2.chungchi);
       
  }
  function showmodel5(){
  
      $('#them5').text("Thêm");
     
      $('#myModal5').modal('show');
       $('#tuden3').val("");
      $('#tuden4').val("");
      $('#checkup5').val("0");
      $('#truong5').val("");
       $('#tghoc5').val("");
       $('#donvi5').val("Năm");
       $('#nganhhoc5').val("");
       $('#bangcap5').val("");
       
  }
  // them xoa sua ngoai ngu
  function editmodal6(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them6').text("Lưu");
     
      $('#myModal6').modal('show');
      $('#truong6').val(data2.ngonngu);
      $('#checkup6').val(data2.recordid);
      $('#nghe6').val(data2.rate1);
      $('#noi6').val(data2.rate2);
      $('#doc6').val(data2.rate3);
      $('#viet6').val(data2.rate4);
  }
  function showmodel6(){
  
      $('#them6').text("Thêm");
     
      $('#myModal6').modal('show');
      $('#truong6').val("");
      $('#checkup6').val("0");
      $('#nghe6').val("0");
      $('#noi6').val("0");
      $('#doc6').val("0");
      $('#viet6').val("0");
      
  }
  function delmodal6(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel6').modal('show');
     
      $('#checkup6d').val(data2.recordid);
      
  }
  //them xoa sua pm
   function editmodal7(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      
      $('#them7').text("Lưu");
     
      $('#myModal7').modal('show');
      $('#pm7').val(data2.pm);
      $('#checkup7').val(data2.recordid);
      
      $('#trinhdo7').val(data2.rate1);
      
  }
  function showmodel7(){
  
      $('#them7').text("Thêm");
     
      $('#myModal7').modal('show');
      $('#pm7').val("");
      $('#trinhdo7').val("0");
      $('#checkup7').val("0");
     
      
  }
  function delmodal7(idform){
      var data = ""; 
      data = $("#"+idform+"").serialize();
      var data2 = parseQuery(data);
      $('#myModaldel7').modal('show');
      $('#checkup7d').val(data2.recordid);   
  }
  function showmodel8(ss)
  {
    var dc = ss;
     $('.js-example-basic-single').select2({dropdownParent: $("#myModal8")});
      $('#myModal8').modal('show');
      $('#select2-thanhpho8-container').text("Chọn tỉnh thành");
      $('#select2-quanhuyen8-container').text("Chọn quận huyện");
      $('#select2-phuongxa8-container').text("Chọn phường xã");
        if(dc == 1)
        {
          var check = document.getElementById("checkPREMANENT").value;
          if(check != "PREMANENT")
          {
            $('#titleaddress').text("Địa chỉ thường trú");
            $('#checkup8').val("1");
            $('#quocgia8').val("0");
            $('#thanhpho8').val("0");
            $('#quanhuyen8').val("0");  
            $('#phuongxa8').val("0");
            $('#duong8').val("");
            $('#toanha8').val(""); 
            $('#del8').addClass("hide");
          }
          else
          {
            $('#titleaddress').text("Địa chỉ thường trú");
            $('#checkup8').val(check);
            $('#quocgia8 option[value="'+$("#countryPREMANENT").val()+'"]').prop('selected','selected');

            $('#thanhpho8 option[value="'+$("#cityPREMANENT").val()+'"]').prop('selected','selected');
            
            testcombo($("#cityPREMANENT").val(),$("#districtPREMANENT").val());
            testcombo2($("#districtPREMANENT").val(),$("#wardPREMANENT").val());
            // $('#quanhuyen8 option[value="'+$("#districtPREMANENT").val()+'"]').prop('selected','selected');
            // $('#phuongxa8 option[value="'+$("#wardPREMANENT").val()+'"]').prop('selected','selected');
            $('#duong8').val($("#streetPREMANENT").val());
            $('#toanha8').val($("#addressnoPREMANENT").val());
            $('#del8').removeClass('hide'); 
             $('#select2-thanhpho8-container').text($( "#thanhpho8 option:selected" ).text());
             $('#select2-quanhuyen8-container').text($( "#quanhuyen8 option:selected" ).text());
             $('#select2-phuongxa8-container').text($( "#phuongxa8 option:selected" ).text());
             if($("#cityPREMANENT").val() == "")
             {
                $('#del8').addClass("hide");
             }
             else
             {
              $('#del8').removeClass('hide'); 
              }
          }
        }
        else
        {
          var check2 = document.getElementById("checkCONTACT").value;
          if(check2 != "CONTACT")
          {
            $('#titleaddress').text("Địa chỉ liên hệ");
            $('#checkup8').val("2");
            $('#quocgia8').val("0");
            $('#thanhpho8').val("0");
            $('#quanhuyen8').val("0");  
            $('#phuongxa8').val("0");
            $('#duong8').val("");
            $('#toanha8').val("");
            $('#del8').addClass("hide");  
          }
          else
          {
            $('#titleaddress').text("Địa chỉ liên hệ");
            $('#checkup8').val(check2);
            $('#quocgia8 option[value="'+$("#countryCONTACT").val()+'"]').prop('selected','selected');

            $('#thanhpho8 option[value="'+$("#cityCONTACT").val()+'"]').prop('selected','selected');
            
            testcombo($("#cityCONTACT").val(),$("#districtCONTACT").val());
            testcombo2($("#districtCONTACT").val(),$("#wardCONTACT").val());
            // $('#quanhuyen8 option[value="'+$("#districtPREMANENT").val()+'"]').prop('selected','selected');
            // $('#phuongxa8 option[value="'+$("#wardPREMANENT").val()+'"]').prop('selected','selected');
            $('#duong8').val($("#streetCONTACT").val());
            $('#toanha8').val($("#addressnoCONTACT").val());
            $('#del8').removeClass('hide'); 
             $('#select2-thanhpho8-container').text($( "#thanhpho8 option:selected" ).text());
             $('#select2-quanhuyen8-container').text($( "#quanhuyen8 option:selected" ).text());
             $('#select2-phuongxa8-container').text($( "#phuongxa8 option:selected" ).text());

              if($("#cityPREMANENT").val() == "")
             {
                $('#del8').addClass("hide");
             }
             else
             {
              $('#del8').removeClass('hide'); 
              }
          }
        }
  }
  function showdel8()
  {
    $('#myModaldel8').modal('show');
    $('#myModal8').modal('hide');
    $('#checkup8d').val($("#checkup8").val());
  
  }
 


$(document).ready(function() {

    $("input[id='desirebenefit']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});

    $("input[id='cur_benefit']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});

    $("input[id='chieucao']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='cannang']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='idid']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='dt1']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='dt2']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

     $("input[id='sdt2']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
     
     $("input[id='tghoc5']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
});

    
   function testcombo(obj,get){

    var $id = obj;
    $('.gicungdc').remove();
    $('.gicungdc2').remove();
      $.ajax({
        url: base+'handling/selectCity',
        type: 'POST',
        dataType: 'JSON',
        data: {id_city : $id},
      })
      .done(function(data) {
                 for(var i in data)
                 {
                  if(get != 0 && get == data[i].id_district)
                  {
                    $('#chonqh').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                  }
                  else
                  {
                    $('#chonqh').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                  } 
                  }
              })
      .fail(function() {
        alert('thatbai');
        console.log("error");
      })
  }
  function testcombo2(obj,get){
    var $id = obj;
    $('.gicungdc2').remove();
    
      $.ajax({
        url: base+'handling/selectDistrict',
        type: 'POST',
        dataType: 'JSON',
        data: {id_district : $id},
      })
      .done(function(data) {
             for(var i in data)
             {
              if(get != 0 && get == data[i].id_ward)
              {
                $('#chonpx').after('<option class="gicungdc2" value="'+data[i].id_ward+'" selected>'+data[i].name+'</option>');
              }
              else
              {
                 $('#chonpx').after('<option class="gicungdc2" value="'+data[i].id_ward+'">'+data[i].name+'</option>');
              }
              }
          })
      .fail(function() {
        alert('thatbai');
        console.log("error");
      })
  }
$('.so').on('input', function(e){
    if ($(this).val() == '') {
              $(this).val(0);
        }        
    $(this).val(formatCurrency(this.value.replace(/[,VNĐ]/g,'')));
    }).on('keypress',function(e){
        if ($(this).val() == 0)
          $(this).val('');
        if(!$.isNumeric(String.fromCharCode(e.which))) e.preventDefault();
    }).on('paste', function(e){    
        var cb = e.originalEvent.clipboardData || window.clipboardData;      
        if(!$.isNumeric(cb.getData('text'))) e.preventDefault();
    });
    function formatCurrency(number){
        var n = number.split('').reverse().join("");
        var n2 = n.replace(/\d\d\d(?!$)/g, "$&,");    
        return  n2.split('').reverse().join('');
    }

var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

var states = JSON.parse($('#sstag').text());


$('#typeahead').tagsinput({
    typeaheadjs: {
    name: 'states',
    source: substringMatcher(states)
    },
    freeInput: true,
});

$('#typeahead').on('itemAdded', function(event) { 
 $('#typeahead').tagsinput('focus');
  $('#tags').val($('#typeahead').val());

});


  
$('#typeahead').on('itemRemoved', function(event) {
  $('#tags').val($('#typeahead').val());
});

