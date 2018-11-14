<script type="text/javascript">
  function editFilter(id){
      $('#iframe_filter').attr('src','<?php echo base_url() ?>admin/handling/editFilter/'+id);  
     
      $('#editFilter').modal('show');
  }
  $(document).keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
        $(".btn_search").trigger('click'); 
    }
  });
    function gioitinh(obj)
    {
        var value = obj.value;
        
        if(value == 'M')
        {
          $("#chk_nu").prop("checked",false);
        }
        if(value == 'F')
        {
          $("#chk_nam").prop('checked', false); 
        }
        filter();
    }
    function giadinh(obj)
    {

        var value = obj.value;
        
        if(value == 'S')
        {
          $("#chk_cogd").prop("checked",false);
        }
        if(value == 'M')
        {
          $( "#chk_chuacogd").prop('checked', false); 
        }
        filter();
    }
    function kinhnghiem(obj)
    {

        var value = obj.value;
        
        if(value == 'C')
        {
          $("#chk_cokm").prop("checked",false);
        }
        if(value == 'D')
        {
          $( "#chk_chuacokm").prop('checked', false); 
        }
        filter();
    }
    function hocvan(obj)
    {

        var value = obj.value;
       
        if(value == '1')
        {
          for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
                $('#hv'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_tthv").prop('checked', false); 
        }
        filter();
    }
    function ngoaingu(obj)
    {

        var value = obj.value;
        if(value == '1')
        {
          for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
                $('#nn'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttnn").prop('checked', false); 
        }
        filter();
    }
    function tinhoc(obj)
    {

        var value = obj.value;
       
        if(value == '1')
        {
          for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
                $('#th'+i).prop("checked",false);
           }
        }
        else
        {
          $( "#chk_hs_co_ttth").prop('checked', false); 
        }
        filter();
    }
    
    function filter(check = '')
    {
      if(check == 'on'){
        if ($(':checkbox').is(':checked')){
          $(':checkbox').prop('checked', false);
          $('#check_filter').prop('checked', true);
        }
      }else{
        $('#check_filter').prop('checked', false);
      }
      var value = {'gender' : '','placeofbirth' : '' , 'agefrom': '' , 'ageto' : '', 'heightto' : '', 'heightfrom': '',  'weightto' : '', 'weightfrom': '' , 'ethnic' : '', 'nationality' : '' , 'cityori' : '' , 'citycurr' : '' , 'district' : '' , 'currbenefitto' : '' , 'currbenefitfrom' : '' , 'desbenefitto' : '' , 'desbenefitfrom' : '' , 'experfrom' : '' , 'experto' : '', 'knowledge' : '' , 'language' : '' , 'software' : '' , 'profilesrc' : '', 'maritalstatus' : '' , 'istalent' : '' ,  'blocked' : '' , 'rateto' : '' , 'ratefrom' : '' };
       if($('#chk_chuacogd').is(':checked'))
       {
          value['maritalstatus'] = 'S'; 
       }
       if($('#chk_cogd').is(':checked'))
       {
          value['maritalstatus'] = 'M';
       }
       if($('#chk_nam').is(':checked'))
       {
          value['gender'] = 'M'; 
       }
       if($('#chk_nu').is(':checked'))
       {
          value['gender'] = 'F';
       }
       if($('#chk_noisinh').is(':checked'))
       {
         if(($('#noisinh-ad').val() != '') && ($('#noisinh-ad').val() != 0))
         {
            value['placeofbirth'] = $('#noisinh-ad').val();
         }
         else {
          $( "#chk_noisinh").prop('checked', false); 
         }
       }
       if($('#chk_tuoi').is(':checked'))
       {
          if(($('#tuoi-tu').val() == '') && ($('#tuoi-den').val() == ''))
          {
            $( "#chk_tuoi").prop('checked', false); 
          }
          else
          {
            value['agefrom'] = $('#tuoi-tu').val();
            value['ageto'] = $('#tuoi-den').val();
          }
       }
       if($('#chk_chieucao').is(':checked'))
       {
          if(($('#caotu').val() == '') && ($('#caoden').val() == ''))
          {
            $( "#chk_chieucao").prop('checked', false); 
          }
          else
          {
            value['heightfrom'] = $('#caotu').val();
            value['heightto'] = $('#caoden').val();
          }
       }
       if($('#chk_cannang').is(':checked'))
       {
          if(($('#nangtu').val() == '') && ($('#nangden').val() == ''))
          {
            $( "#chk_cannang").prop('checked', false); 
          }
          else
          {
            value['weightfrom'] = $('#nangtu').val();
            value['weightto'] = $('#nangden').val();
          }
       }
       if($('#chk_dantoc').is(':checked'))
       {
          if($('#dantoc-ad').val() == ''){
            $( "#chk_dantoc").prop('checked', false); 
          } else {
            value['ethnic'] = $('#dantoc-ad').val();
          }
       }
       if($('#chk_quoctich').is(':checked'))
       {
          if($('#quoctich-ad').val() == ''){
            $( "#chk_quoctich").prop('checked', false); 
          } else {
            value['nationality'] = $('#quoctich-ad').val();
          }
       }
       if($('#chk_tp_thgtru').is(':checked'))
       {
          if(($('#tp_thgtru').val() == '') || ($('#tp_thgtru').val() == 0) ){
            $( "#chk_tp_thgtru").prop('checked', false); 
          } else {
            value['cityori'] = $('#tp_thgtru').val();
          }
       }
       if($('#chk_tp_dgsg').is(':checked'))
       {
          if(($('#tp_dgsg').val() == '') || ($('#tp_dgsg').val() == 0) ){
            $( "#chk_tp_dgsg").prop('checked', false); 
          } else {
            value['citycurr'] = $('#tp_dgsg').val();
          }
       }
       if($('#quanhuyen-nav12').is(':checked'))
       {  

          if(($('#quanhuyen-nav').val() == '') || ($('#quanhuyen-nav').val() == 0) ){
            $( "#quanhuyen-nav12").prop('checked', false); 
          } else {
            if($('#quanhuyen-nav').val() == null){
              value['district'] = $('#quanhuyen_filter').val();
            }else{
              value['district'] = $('#quanhuyen-nav').val();
            }
          }
       }
       if($('#chk_thunhapht').is(':checked'))
       {
          if(($('#tn_httu').val() == '' ) && ($('#tn_htden').val() == ''))
          {
            $( "#chk_thunhapht").prop('checked', false); 
          }
          else
          {
            value['currbenefitfrom'] = $('#tn_httu').val();

            value['currbenefitto'] = $('#tn_htden').val();
          
          }
       }
       if($('#chk_thunhapmm').is(':checked'))
       {
          if(($('#tn_mmtu').val() == '') && ($('#tn_mmden').val() == ''))
          {
            $( "#chk_thunhapmm").prop('checked', false); 
          }
          else
          {
            value['desbenefitfrom'] = $('#tn_mmtu').val(); 
            value['desbenefitto'] = $('#tn_mmden').val();
          }
       }
       if($('#chk_chuacokm').is(':checked'))
       {
          value['experfrom'] = 'C'; 
       }
       if($('#chk_cokm').is(':checked'))
       {
          if(($('#kinhnghiem_tu').val() == '') && ($('#kinhnghiem_den').val() == ''))
          {
            $( "#chk_cokm").prop('checked', false); 
          }
          else
          {
            value['experfrom'] = $('#kinhnghiem_tu').val();
            value['experto'] = $('#kinhnghiem_den').val();
          }
       }
       if($('#chk_hs_co_tthv').is(':checked'))
       {
          value['knowledge'] = '1';
       } else{
          for(var i = 0; i < $('#counthocvan').val() ; i++ )
          {
            if($('#hv'+i).is(':checked'))
           {
              value['knowledge'] += $('#hv'+i).val()+'/';
           }
          }
       }
       if($('#chk_hs_co_ttnn').is(':checked'))
       {
          value['language'] = '1';
       } else{
          for(var i = 0; i < $('#countngoaingu').val() ; i++ )
          {
            if($('#nn'+i).is(':checked'))
           {
              value['language'] += $('#nn'+i).val()+'/';
           }
          }
       }
       if($('#chk_hs_co_ttth').is(':checked'))
       {
          value['software'] = '1';
       }else{
          for(var i = 0; i < $('#counttinhoc').val() ; i++ )
          {
            if($('#th'+i).is(':checked'))
           {
              value['software'] += $('#th'+i).val()+'/';
           }
          }
       }
       for(var i = 0; i < $('#countprofile').val() ; i++ )
       {
          if($('#src'+i).is(':checked'))
         {
            value['profilesrc'] += $('#src'+i).val()+'/';
         }
       }
       if($('#chk_tiemnang').is(':checked'))
       {
          value['istalent'] = 'T';
       }
       if($('#chk_chan').is(':checked'))
       {
          value['blocked'] = 'Y';
       }
        if($('#chk_diem').is(':checked'))
       {
          if(($('#diem_tu').val() == '') && ($('#diem_den').val() == ''))
          {
            $( "#chk_diem").prop('checked', false); 
          }
          else
          {
            value['ratefrom'] = $('#diem_tu').val();
            value['rateto'] = $('#diem_den').val();
          }
       }
      $('.candidate-load').empty();
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/filter_candidate',
          type: 'POST',
          dataType: 'JSON',
          data: value,
        })
        .done(function(data) {
             for(var i in data)
             {
               var gt = "";
              if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ"; 
              
              var chieucao = "";
              if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

              var cannang = "";
              if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
              var kinhnghiem = "";
              
              var bangcap = "";
              if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
              var ngonngu = "";
              if(data[i]['countlanguage'] == 0)
              { ngonngu = ""; }
              else if(data[i]['countlanguage'] == 1) 
              { ngonngu = data[i]['language']+", "; }
              else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
              var phanmem = "";
              if(data[i]['countsoftware'] == 0) phanmem = "";
              else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
              else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", "; 
              var star = '';
              if(data[i]['istalent'] == 0) {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>'; 
               } else {
              star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
              }
              var dss = ''; 
              if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
              else {
                dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; 
              }
              var bb = '';
               if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
               var bell = '';
              if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
              var vt = '';
              if(data[i]['position'] != '') {
                  vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
              }
              var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
              hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox()"></td><td class="td-cot2">';
              hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

              hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >3 mẩu thư</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
              hm+= '<label class="label-name color-black">'+data[i]['name']+'</label>';
              hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+'<label class="tuyendung-label2">Tuyển dụng, đào tạo</label><label class="tuyendung-label3">';

              hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
              hm+= '</label> <span class="highr">#HighR</span></td></tr> </table></div></a>';
               
              $('.candidate-load').append(hm);
              // console.log(data.length);
              $('.demhs').text(data.length +' Hồ sơ');
             }

          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    
    }
    function selectcity(obj,get=''){
      var $id = obj;
      $('.gicungdc').remove();
      $('#quanhuyen-nav11').addClass("disabled");
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false); 
      if($id != '0')
      {
        $('#quanhuyen-nav11').removeClass("disabled");
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
      }

        $.ajax({
          url: '<?php echo base_url()?>admin/handling/selectCity',
          type: 'POST',
          dataType: 'JSON',
          data: {id_city : $id},
        })
        .done(function(data) {
             for(var i in data)
             {  
                if(get != 0 && get == data[i].id_district)
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                } 
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }

    function clicksave()
    {
        $('#save-preset').modal('show');
    }
     $('#example-multiple-selected').multiselect();
     $('.js-example-basic-single').select2();

    $("input[id='tuoi-tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='tuoi-den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='caotu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='caoden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='nangtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='nangden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});

    $("input[id='tn_httu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_htden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmtu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
    $("input[id='tn_mmden']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9,]/g, ''));});
     
    $("input[id='kinhnghiem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='kinhnghiem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));}); 
     
    $("input[id='diem_tu']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});
    $("input[id='diem_den']").on('input', function (e) {
    $(this).val($(this).val().replace(/[^0-9]/g, ''));});  
     $('.so').on('input', function(e){
      if ($(this).val() == '') {
              $(this).val();
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
    function save_filter()
    {
      var value = {'gender' : '','placeofbirth' : '' , 'age': '' , 'height' : '',  'weight' : '', 'ethnic' : '', 'nationality' : '' , 'cityori' : '' , 'citycurr' : '' , 'district' : '' , 'currentbenefit' : '' , 'desirebenefit' : '' , 'experience' : '' , 'knowledge' : '' , 'language' : '' , 'software' : '' , 'maritalstatus' : '' , 'istalent' : '' , 'blocked' : '' , 'rate' : ''};
      
       if($('#chk_nam').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/M/'; 
       }
       if($('#chk_nu').is(':checked'))
       {
          value['gender'] = 'candidate/gender/S/=/F/';
       }
        if($('#chk_chuacogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/S/'; 
       }
       if($('#chk_cogd').is(':checked'))
       {
          value['maritalstatus'] = 'candidate/maritalstatus/S/=/M/';
       }
       if($('#chk_noisinh').is(':checked'))
       {
         if(($('#noisinh-ad').val() != '') && ($('#noisinh-ad').val() != 0))
         {
            value['placeofbirth'] = 'candidate/placeofbirth/S/=/'+$('#noisinh-ad').val()+'/';
         }
         else {
          $( "#chk_noisinh").prop('checked', false); 
         }
       }
       if($('#chk_tuoi').is(':checked'))
       {
          if(($('#tuoi-tu').val() == '') && ($('#tuoi-den').val() == ''))
          {
            $( "#chk_tuoi").prop('checked', false); 
          }
          else
          {
            if(($('#tuoi-tu').val() != '' ) && ($('#tuoi-den').val() != '') ) $ope = "BETWEEN";
            else if($('#tuoi-tu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['age'] = 'candidate/dateofbirth/D/'+$ope+'/'+$('#tuoi-tu').val()+'/'+$('#tuoi-den').val();
          }
       }
       if($('#chk_chieucao').is(':checked'))
       {
          if(($('#caotu').val() == '') && ($('#caoden').val() == ''))
          {
            $( "#chk_chieucao").prop('checked', false); 
          }
          else
          {
            if(($('#caotu').val() != '' ) && ($('#caoden').val() != '') ) $ope = "BETWEEN";
            else if($('#caotu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['height'] = 'candidate/height/N/'+$ope+'/'+$('#caotu').val()+'/'+$('#caoden').val();
          }
       }
       if($('#chk_cannang').is(':checked'))
       {
          if(($('#nangtu').val() == '') && ($('#nangden').val() == ''))
          {
            $( "#chk_cannang").prop('checked', false); 
          }
          else
          {
            if(($('#nangtu').val() != '' ) && ($('#nangden').val() != '') ) $ope = "BETWEEN";
            else if($('#nangtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['weight'] = 'candidate/weight/N/'+$ope+'/'+$('#nangtu').val()+'/'+$('#nangden').val();
          }
       }
       if($('#chk_dantoc').is(':checked'))
       {
          if($('#dantoc-ad').val() == ''){
            $( "#chk_dantoc").prop('checked', false); 
          } else {
            
            value['ethnic'] = 'candidate/ethnic/S/=/'+$('#dantoc-ad').val()+'/';
          }
       }
       if($('#chk_quoctich').is(':checked'))
       {
          if($('#quoctich-ad').val() == ''){
            $( "#chk_quoctich").prop('checked', false); 
          } else {
            value['nationality'] = 'candidate/nationality/S/=/'+$('#quoctich-ad').val()+'/';
          }
       }
       if($('#chk_tp_thgtru').is(':checked'))
       {
          if(($('#tp_thgtru').val() == '') || ($('#tp_thgtru').val() == 0) ){
            $( "#chk_tp_thgtru").prop('checked', false); 
          } else {
            value['cityori'] = 'canaddress/cityori/S/=/'+$('#tp_thgtru').val()+'/';
          }
       }
       if($('#chk_tp_dgsg').is(':checked'))
       {
          if(($('#tp_dgsg').val() == '') || ($('#tp_dgsg').val() == 0) ){
            $( "#chk_tp_dgsg").prop('checked', false); 
          } else {
            value['citycurr'] = 'canaddress/citycurr/S/=/'+$('#tp_dgsg').val()+'/';
          }
       }
       if($('#quanhuyen-nav12').is(':checked'))
       {
          if(($('#quanhuyen-nav').val() == '') || ($('#quanhuyen-nav').val() == 0) ){
            $( "#quanhuyen-nav12").prop('checked', false); 
          } else {
          
            value['district'] = 'canaddress/district/S/=/'+$('#quanhuyen-nav').val()+'/';
          }
       }
       if($('#chk_thunhapht').is(':checked'))
       {
          if(($('#tn_httu').val() == '') && ($('#tn_htden').val() == ''))
          {
            $( "#chk_thunhapht").prop('checked', false); 
          }
          else
          {
            if(($('#tn_httu').val() != '' ) && ($('#tn_htden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_httu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['currentbenefit'] = 'candidate/currentbenefit/N/'+$ope+'/'+$('#tn_httu').val()+'/'+$('#tn_htden').val();
          }
       }
       if($('#chk_thunhapmm').is(':checked'))
       {
          if(($('#tn_mmtu').val() == '') && ($('#tn_mmden').val() == ''))
          {
            $( "#chk_thunhapmm").prop('checked', false); 
          }
          else
          {
            if(($('#tn_mmtu').val() != '' ) && ($('#tn_mmden').val() != '') ) $ope = "BETWEEN";
            else if($('#tn_mmtu').val() != '') $ope = "BEGIN WITH";
            else $ope = "END WITH";
            value['disirebenefit'] = 'candidate/disirebenefit/N/'+$ope+'/'+$('#tn_mmtu').val()+'/'+$('#tn_mmden').val();
          }
       }
       if($('#chk_chuacokm').is(':checked'))
       {
          value['experience'] = 'canexperience/experience/S/NOT IN/C/';
       }
       if($('#chk_cokm').is(':checked'))
       {
          if(($('#kinhnghiem_tu').val() != '' ) && ($('#kinhnghiem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#kinhnghiem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['experience'] = 'canexperience/experience/N/'+$ope+'/'+$('#kinhnghiem_tu').val()+'/'+$('#kinhnghiem_den').val();
       }
       if($('#chk_hs_co_tthv').is(':checked'))
       {
           value['knowledge'] = 'canknowledge/knowledge/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
              if($('#hv'+i).is(':checked'))
             {
                value['knowledge'+i] = 'canknowledge/knowledge/S/=/'+$('#hv'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttnn').is(':checked'))
       {
          value['language'] = 'canlanguage/language/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
              if($('#nn'+i).is(':checked'))
             {
                value['language'+i] = 'canlanguage/language/S/=/'+$('#nn'+i).val()+'/';
             }
           }
       }
       if($('#chk_hs_co_ttth').is(':checked'))
       {
         
          value['software'] = 'cansoftware/software/S/IN/1/';
       }
       else
       {
           for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
              if($('#th'+i).is(':checked'))
             {
                value['software'+i] = 'cansoftware/software/S/=/'+$('#th'+i).val()+'/';
             }
           }
       }
       for(var i = 0; i < $('#countprofile').val() ; i++ )
       {
          if($('#src'+i).is(':checked'))
         {
            value['profilesrc'+i] = 'candidate/profilesrc/S/=/'+$('#src'+i).val()+'/';
         }
       }
       if($('#chk_tiemnang').is(':checked'))
       {
          value['istalent'] = 'candidate/istalent/N/<>/0/';
       }
       if($('#chk_chan').is(':checked'))
       {
          value['blocked'] = 'candidate/blocked/S/=/Y/';
       }
       if($('#chk_diem').is(':checked'))
       {
          if(($('#diem_tu').val() != '' ) && ($('#diem_den').val() != '') ) $ope = "BETWEEN";
          else if($('#diem_tu').val() != '') $ope = "BEGIN WITH";
          else $ope = "END WITH";
          value['rate'] = 'cancomment/rate/N/'+$ope+'/'+$('#diem_tu').val()+'/'+$('#diem_den').val();
       }
       value['filter'] = $('#name_filter').val();
       if($('#chk_share_tieuchi').is(':checked'))
       {
          value['share'] = '1';
       }
       else
       {
          value['share'] = '0';
       } 
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/savefilter',
          type: 'POST',
          dataType: 'json',
          data: value,
        })
        .done(function(data) {
          // console.log(data);
            $('.nav-check-save').append('<li id="dropdown" class="width100"><a class="nav-menu-hs" onclick="loadfilter('+data[0]['filterid']+')">'+data[0]['filtername']+'</a></li>');
            $('#save-preset').modal('hide');
          alert("Thêm thành công!");
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }
    
    function loadfilter(obj)
    {
      var id = obj;
    
        $.ajax({
          url: '<?php echo base_url()?>admin/handling/loadfilter',
          type: 'POST',
          dataType: 'json',
          data: { filterid : id },
        })
        .done(function(data) {

           $("#chk_thunhapht").prop("checked",false);
           $("#chk_thunhapmm").prop("checked",false);
           $('#tn_httu').val("");
           $('#tn_htden').val("");
           $('#tn_mmtu').val("");
           $('#tn_mmden').val("");
           $("#chk_chuacokm").prop("checked",false);
           $("#chk_cokm").prop("checked",false);
           $('#kinhnghiem_tu').val("");
           $('#kinhnghiem_den').val("");
           $("#chk_hs_co_tthv").prop("checked",false);
           $("#chk_hs_co_ttnn").prop("checked",false);
           $("#chk_hs_co_ttth").prop("checked",false);
           $("#chk_tuoi").prop("checked",false);
           $("#chk_nam").prop("checked",false);
           $("#chk_nu").prop("checked",false);
           $('#tuoi-tu').val("");
           $('#tuoi-den').val("");
           $("#chk_chieucao").prop("checked",false);
           $('#caotu').val("");
           $('#caoden').val("");
           $("#chk_cannang").prop("checked",false);
           $('#nangtu').val("");
           $('#nangden').val("");
           $("#chk_noisinh").prop("checked",false);
           $('#noisinh-ad').val("0");
           $("#chk_dantoc").prop("checked",false);
           $('#dantoc-ad').val("");
           $("#chk_quoctich").prop("checked",false);
           $('#quoctich-ad').val("Việt Nam");
           $("#chk_tp_thgtru").prop("checked",false);
           $('#tp_thgtru').val("0");
           $("#chk_tp_dgsg").prop("checked",false);
           $('#tp_dgsg').val("0");
           $("#quanhuyen-nav12").prop("checked",false);
           $('#quanhuyen-nav').val("null");
           $("#chk_chuacogd").prop("checked",false);
           $("#chk_cogd").prop("checked",false);
           $("#chk_tiemnang").prop("checked",false);
           $("#chk_chan").prop("checked",false);
           $("#chk_diem").prop("checked",false);
           $('#diem_tu').val("");
           $('#diem_den').val("");
           for(var i = 0; i < $('#countprofile').val() ; i++ )
           {
                $('#src'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counthocvan').val() ; i++ )
           {
                $('#hv'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#countngoaingu').val() ; i++ )
           {
                $('#nn'+i).prop("checked",false);
           }
           for(var i = 0; i < $('#counttinhoc').val() ; i++ )
           {
                $('#th'+i).prop("checked",false);
           }
           $('#dropdown-lvl1').removeClass('in');
           $('#dropdown-lvl2').removeClass('in');
           $('#dropdown-lvl4').removeClass('in');
           $('#dropdown-lvl5').removeClass('in');
           $('#dropdown-lvl6').removeClass('in');
           $('#dropdown-lvl7').removeClass('in');
           $('#dropdown-lvl8').removeClass('in');
           $('#dropdown-lvl9').removeClass('in');
           $('#dropdown-lvl10').removeClass('in');
           for(var i in data)
           {
              if(data[i]['fieldname'] == 'desirebenefit') 
              {
                $("#chk_thunhapmm").prop("checked",true);
                $('#tn_mmtu').val(data[i]['filterfrom']);
                $('#tn_mmden').val(data[i]['filterto']);
                $('#dropdown-lvl4').addClass('in');
                continue;
              }
              
              if(data[i]['fieldname'] == 'currentbenefit') 
              {
                $("#chk_thunhapht").prop("checked",true);
                $('#tn_httu').val(data[i]['filterfrom']);
                $('#tn_htden').val(data[i]['filterto']);
                $('#dropdown-lvl4').addClass('in');
                continue;
              }
              
               if(data[i]['fieldname'] == 'experience')
              {
                if(data[i]['filterfrom'] == 'C')
                {
                  $("#chk_chuacokm").prop("checked",true);
                }
                else{ 
                  $("#chk_cokm").prop("checked",true);
                  $('#kinhnghiem_tu').val(data[i]['filterfrom']);
                  $('#kinhnghiem_den').val(data[i]['filterto']);
                }
                 $('#dropdown-lvl5').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'gender')
              {
                  if(data[i]['filterfrom'] == 'F') {
                     $("#chk_nu").prop("checked",true);
                  }else {
                     $("#chk_nam").prop("checked",true);
                  }
                  $('#dropdown-lvl9').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'knowledge')
              {
                   
                    if(data[i]['filterfrom'] == '1')
                    {
                      $("#chk_hs_co_tthv").prop("checked",true);
                    }
                    else {
                        for(var ii = 0; ii < $('#counthocvan').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#hv'+ii).val())
                          {
                            $('#hv'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl6').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'language')
              {
                  if(data[i]['filterfrom'] == '1')
                  {
                     $("#chk_hs_co_ttnn").prop("checked",true);
                  }
                    else {
                        for(var ii = 0; ii < $('#countngoaingu').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#nn'+ii).val())
                          {
                            $('#nn'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl7').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'software')
              {
                if(data[i]['filterfrom'] == '1')
                  {
                   $("#chk_hs_co_ttth").prop("checked",true);
                 }
                 else {
                        for(var ii = 0; ii < $('#counttinhoc').val() ; ii++ )
                        {
                          if(data[i]['filterfrom'] == $('#th'+ii).val())
                          {
                            $('#th'+ii).prop("checked",true);
                          }
                        }
                    }
                    $('#dropdown-lvl8').addClass('in');
                   continue;
              }
              if(data[i]['fieldname'] == 'age') 
              {
                $("#chk_tuoi").prop("checked",true);
                $('#tuoi-tu').val(data[i]['filterfrom']);
                $('#tuoi-den').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'height') 
              {
                $("#chk_chieucao").prop("checked",true);
                $('#caotu').val(data[i]['filterfrom']);
                 $('#caoden').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
              
              if(data[i]['fieldname'] == 'weight') 
              {
                $("#chk_cannang").prop("checked",true);
                $('#nangtu').val(data[i]['fliterfrom']);
                $('#nangden').val(data[i]['filterto']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
              
              if(data[i]['fieldname'] == 'placeofbirth')
              {
                $("#chk_noisinh").prop("checked",true);
                $('#noisinh-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'nationality')
              {
                $("#chk_quoctich").prop("checked",true);
                $('#quoctich-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'ethnic')
              {
                $("#chk_dantoc").prop("checked",true);
                $('#dantoc-ad').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                continue;
              }
               if(data[i]['fieldname'] == 'cityori')
              {
                $("#chk_tp_thgtru").prop("checked",true);
                $('#tp_thgtru').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                $('#select2-tp_thgtru-container').text($( "#tp_thgtru option:selected" ).text());
                continue;
              }
               if(data[i]['fieldname'] == 'citycurr')
              {
                $("#chk_tp_dgsg").prop("checked",true);
                $('#tp_dgsg').val(data[i]['filterfrom']);
                $('#dropdown-lvl9').addClass('in');
                $('#select2-tp_dgsg-container').text($( "#tp_dgsg option:selected" ).text());
                $("#quanhuyen-nav12").prop("checked",true);
                continue;
              }
               if(data[i]['fieldname'] == 'district')
              {
                var id_city = $('#tp_dgsg').val();
                selectcity(id_city, data[i]['filterfrom']);
                $("#quanhuyen-nav12").prop("checked",true);
                $('#quanhuyen_filter').val(data[i]['filterfrom']);
                $('#select2-quanhuyen-nav-container').text($( "#quanhuyen-nav option:selected" ).text());
                continue;
              }
              if(data[i]['fieldname'] == 'profilesrc')
              {
                for(var ii = 0; ii < $('#countprofile').val() ; ii++ )
                {
                  if(data[i]['filterfrom'] == $('#src'+ii).val())
                  {
                    $('#src'+ii).prop("checked",true);
                  }
                }
                $('#dropdown-lvl2').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'maritalstatus') 
              {
                  if(data[i]['filterfrom'] == 'S') {
                     $("#chk_chuacogd").prop("checked",true);
                  }else {
                     $("#chk_cogd").prop("checked",true);
                  }
                 $('#dropdown-lvl10').addClass('in');
                 continue;
              }
              if(data[i]['fieldname'] == 'istalent') 
              {
                $("#chk_tiemnang").prop("checked",true);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'blocked') 
              {
                $("#chk_chan").prop("checked",true);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
              if(data[i]['fieldname'] == 'rate') 
              {
                $("#chk_diem").prop("checked",true);
                $('#diemtu').val(data[i]['filterfrom']);
                $('#diemden').val(data[i]['filterto']);
                $('#dropdown-lvl1').addClass('in');
                continue;
              }
           }
           filter();
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
    }
    $(document).ready(function(){
     // console.log($('#checkqh').val());
    if($('#checkqh').val() != "")
    {
      var get = $('#checkqh').val();
      var $id = $('#checkcity').val();
      $('.gicungdc').remove();
      $('#quanhuyen-nav11').addClass("disabled");
      $('#quanhuyen-nav12').attr('disabled','disabled');
      $( "#quanhuyen-nav12").prop('checked', false); 
      if($id != '0')
      {
        $('#quanhuyen-nav11').removeClass("disabled");
        $('#quanhuyen-nav12').removeAttr('disabled','disabled');
        $( "#quanhuyen-nav12").prop('checked', true); 
      }

        $.ajax({
          url: '<?php echo base_url()?>admin/handling/selectCity',
          type: 'POST',
          dataType: 'JSON',
          data: {id_city : $id},
        })
        .done(function(data) {
             for(var i in data)
             {  
                if(get != 0 && get == data[i].id_district)
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'" selected>'+data[i].name+'</option>');
                }
                else
                {
                  $('#chonqh-nav1').after('<option class="gicungdc" value="'+data[i].id_district+'">'+data[i].name+'</option>');
                } 
              }
          })
        .fail(function() {
          alert('thatbai');
          console.log("error");
        });
    }
  });

  function searchFilter() {
    var name = $('#text_filter_1').val();
    $('.filter-load').empty();
    $.ajax({
      url: '<?php echo base_url() ?>admin/handling/searchFilter',
      type: 'POST',
      dataType: 'json',
      data: {name: name},
    })
    .done(function(data) {
      // console.log(data);
      var row ='';
      for(var i in data){
        row += '<li id="dropdown" class="width100"><a class="nav-menu-hs" onclick="loadfilter('+data[i]['filterid']+')">'+data[i]['filtername']+'</a></li>';
      }
      $('.filter-load').append(row);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }
  function searchname()
  {
    var name1 = $('#text_search').val();
    $('.candidate-load').empty();
    $.ajax({
      url: '<?php echo base_url() ?>admin/handling/searchname',
      type: 'POST',
      dataType: 'json',
      data: {name: name1},
    })
    .done(function(data) {
      
      for(var i in data)
           {
            var gt = "";
            if(data[i]['gender'] == "M") gt = "Nam"; else gt = "Nữ"; 
            
            var chieucao = "";
            if(data[i]['height'] == 0) chieucao = ""; else chieucao = data[i]['height']+"cm, ";

            var cannang = "";
            if(data[i]['weight'] == 0) cannang = ""; else cannang = data[i]['weight']+"kg, ";
            var kinhnghiem = "";
            
            var bangcap = "";
            if(data[i]['certificate'] == "") bangcap = ""; else bangcap = data[i]['certificate']+", ";
            var ngonngu = "";
            if(data[i]['countlanguage'] == 0)
            { ngonngu = ""; }
            else if(data[i]['countlanguage'] == 1) 
            { ngonngu = data[i]['language']+", "; }
            else ngonngu = data[i]['language']+"+"+(data[i]['countlanguage']-1)+", ";
            var phanmem = "";
            if(data[i]['countsoftware'] == 0) phanmem = "";
            else if(data[i]['countsoftware'] == 1) phanmem = data[i]['software']+", ";
            else phanmem = data[i]['software']+"+"+(data[i]['countsoftware']-1)+", "; 
            var star = '';
            if(data[i]['istalent'] == 0) {
            star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-gray fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9"></span></span>'; 
             } else {
            star = '<span class="fa-stack fa-1x"><i class="fa fa-star color-orange fa-stack-2x nohover size18"></i><span class="fa fa-stack-1x color-white size9">'+data[i]['istalent'] +'</span></span>';
            }
            var dss = ''; 
            if(data[i]['blocked'] == 'Y') { dss ='<div class="col-md-3 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; }
            else {
              dss = '<div class="col-md-4 padding-lr0 " id="ds'+data[i]['candidateid']+'">'; 
            }
            var bb = '';
             if(data[i]['blocked'] == 'Y') { bb = '<i class="fa fa-ban color-red " ></i>'; }
             var bell = '';
            if(data[i]['unsubcribe'] == 'Y') bell = "-slash";
            var vt = '';
            if(data[i]['position'] != '') {
                vt = '<label class="tuyendung-label1 color-black">'+data[i]['position']+'</label>';
            }
            var hm = '<a href="<?php echo base_url()?>admin/handling/profile/'+data[i]['candidateid']+'" class="hover-profile load-remove">';
            hm+= '<div class="col-md-6 profile dash-horizontal pad-l0 pad-r5 min-h152"><table class="margin-t5 margin-b5"><tr><td class="td-cot1"><input class="checkcandidate" type="checkbox" value="'+data[i]['candidateid']+'" name="check[]" onclick="checkbox()"></td><td class="td-cot2">';
            hm+= '<img src="<?php echo base_url()?>public/image/'+data[i]['imagelink']+'" class="frameimage" width="70px" height="70px">';

            hm+= '<label class="label-td pad-t3" >'+Math.round(data[i]['rate'])+' điểm</label><label class="label-td pad-t1" >3 mẩu thư</label><label class="margin-t-3"><i class="fa fa-bell'+bell+' icon-label pad-l2"></i><i class="fa fa-user icon-label"></i><i class="fa fa-clock-o icon-de" ></i></label></td><td class="td-cot3"><div class="row width100 margin-l0" ><div class="col-md-7 padding-lr0">';
            hm+= '<label class="label-name color-black">'+data[i]['name']+'</label>';
            hm+= '</div>'+dss+'<span class="webportal">'+data[i]['profilesrc']+'</span></div><div id="talent'+data[i]['candidateid']+'" class="col-md-1 padding-lr0 ">'+star+'</div><div class="col-md-1 padding-lr0 icon-block" id="block'+data[i]['candidateid']+'">'+bb+'</div></div>'+vt+'<label class="tuyendung-label2">Tuyển dụng, đào tạo</label><label class="tuyendung-label3">';

            hm+= ''+gt+', '+data[i]['dateofbirth2']+' tuổi, '+chieucao+''+cannang+''+data[i]['kinhnghiem']+''+data[i]['thunhap']+''+bangcap+''+ngonngu+''+phanmem+'...';
            hm+= '</label> <span class="highr">#HighR</span></td></tr> </table></div></a>';
             
            $('.candidate-load').append(hm);
           }
           $('.demhs').text(data.length +' Hồ sơ');             
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

</script