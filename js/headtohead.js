/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function verheadtohead(id1,id2){
    //alert(id1);
    //alert(id2);
    
    //get id from catch dat from headtohead
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("index.php/admin/do_search"); ?>',
        data:{'id':id},
        success:function(data){
            $('#resultdiv').html(data);
        }
    });    
}
