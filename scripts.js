/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function (){
   
   // alert('JS Works');
   //post Add  pressed
   $(document).on('click', '#submit_btn', function (){
      
       var name = $('#name').val();
      // var comment = $('#comment').val();
       
       $.ajax({
          
            url: "server.php", type: 'POST', 
            data: {
             'save': 1,
             'name': name
           //  'comment': comment
            }, success: function (response) {
                 $('#name').val();
              //  $('#comment').val();
                $('#display_area').append(response);
              
            }
       });
   });
   
    $(document).on('click', '.delete', function (){
      
       var id = $(this).data('id');
       var $clicked_btn = $(this);
       $.ajax({
           
            url: "server.php", type: 'GET', 
            data: {
             'delete': 1,
             'id':id
            }, success: function (response) {
                
                $clicked_btn.parent().remove() ;
              
            }
       });
   });
   
    var edit_id;
   var edit_comment;
   $(document).on('click', '.edit', function (){
     
       edit_id = $(this).data('id');
       edit_comment = $(this).parent();
       
        var name = $(this).siblings('.display_name').text();
       var comment = $(this).siblings('.comment_text').text();

       //pace value to input fields
       $('#name').val(name);
       $('#comment').val(comment);
       $('#submit_btn').hide();
       $('#update_btn').show();
   
   
   });
   $(document).on('click', '#update_btn', function (){
       
       var name = $('#name').val();
       var comment = $('#comment').val();
       
       $.ajax({
          
            url: "server.php", type: 'POST', 
            data: {
             'update': 1,
             'id':edit_id,
             'name': name,
             'comment': comment
            }, success: function (response) {
                
                $('#name').val();
                $('#comment').val();
  
                $('#submit_btn').show();
                $('#update_btn').hide();
  
                edit_comment.replaceWith(response);
               
            }
       });
   });
});