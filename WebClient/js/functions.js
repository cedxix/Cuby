/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).on("ready", function() {
//    alert('this is OK');
    
    //Tab in settings page
    $('#settingsTab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    //
    $('.required-icon').tooltip({
        placement: 'left',
        title: 'Required field'
    });
    //Dropzone
   
});

