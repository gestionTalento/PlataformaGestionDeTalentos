   $('#modalButton').click(function(){
      $('#modal').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
   });

     $('#modalButtons').click(function(){
      $('#modal1').modal('show')
              .find('#modalContent')
              .load($(this).attr('value'));
               var imgsrc = $(this).data('id');
 				$('#my_image').attr('src',imgsrc);
   });