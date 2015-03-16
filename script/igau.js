
$(document).ready(function(){
  
  $("#phd_subject").hide();
  });
$(document).ready(function()
                  {
                    $("#msc").click(function(){
                      $("#msc_subject").show();
                      $("#phd_subject").hide();
                      });
                  });
$(document).ready(function()
                  {
                    $("#phd").click(function(){
                      $("#phd_subject").show();
                      $("#msc_subject").hide();
                      });
                  });
$(document).ready(function()
{
   $("#msc_course").click(function()
                          {
                            
                            var reso_person ="hello";
                          var link = $("#url").val()+"welcome/msc_page";
                          
            $.post(link, {reso_person: reso_person}, function(data){
            $("#ms_auto").html(data);
            });
                          }
                          );
     
     $("#phd_course").click(function()
                          {
                           var reso_person ="hello";
                          var link = $("#url").val()+"welcome/phd_page";
            $.post(link, {reso_person: reso_person}, function(data){
            $("#ms_auto").html(data);
            
            });
                          }
                          );
     
});

function search_subject(data)
{
  
                          var course_id;
                          if($("#msc_course").attr('checked') ==true)
                          {
                            course_id = $("#msc_course").val();
                          }
                           if($("#phd_course").attr('checked') ==true)
                          {
                            course_id = $("#phd_course").val();
                          }                         
  
  var link = $("#url").val()+"welcome/search_subject"; 
  $.post(link,{data:data, course_id:course_id}, function(search_data){    
    $('#search_data').html(search_data);    
    });  
}
function search_year(year)
{
      var course_id;
                          if($("#msc_course").attr('checked') ==true)
                          {
                            course_id = $("#msc_course").val();
                          }
                           if($("#phd_course").attr('checked') ==true)
                          {
                            course_id = $("#phd_course").val();
                          }                         
  var data = $("#ms_auto").val();
  var link = $("#url").val()+"welcome/search_by_all"; 
  $.post(link,{data:data, course_id:course_id, year:year}, function(search_data){    
    $('#search_data').html(search_data);    
    });     
}
