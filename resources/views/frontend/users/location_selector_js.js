
// Location Selector
$(document).on('change','#country',function(){


    var country_id=$(this).val();

    //var div=$(this).parent().parent();

    $op="";


    $.ajax({
         type:'get',
         url:'{!!URL::to('findLocation')!!}',
         data:{'id':country_id},
         dataType:'json',//return data will be json
         success:function(data){

              $op += '<option value="0" selected disabled>Select City</option>';
                 for(var i=0;i<data.length;i++){
                $op += '<option value="'+data[i].location_id+'">'+data[i].location_name+'</option>';
              }

                $('.v_location').html($op);
              // $('.v_location').append($tp);
                //div.find('.v_location').html(" ");
              //div.find('.v_location').append($op);



         },
         error:function(){

         }
     });



});
