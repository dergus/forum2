$(function (){
   
    
    $('#forum-category_id').change(function (){
        var html='';
        $("#forum-category_id option:selected").each(function (){
           
            var cid=$(this).val();
            var times=+forumsAmount[cid]+1;
            for(var i=1;i<=times;i++){
               
                    html+="<option value="+i+">"+i+"</option>";
                
            }
            
            
            
        });
        $("#forum-position").removeAttr("disabled");
        $("#forum-position").html(html);
    });
    
    
});
    
    
    


