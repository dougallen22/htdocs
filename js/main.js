$(function(){
 
$("#wizard").validate({
          rules: { 
            
            fname : {
                required : true,
            },
            lname : {
                required : true,
            }, 
            email : {
                required : true,
           },  

           phone : {
                required : true,
            },
            address : {
                required : true,
            },

            city : {
                required : true,
            },

            zip : {
                required : true,
            },

            state : {
                required : true,
            },
            
            gender : {
                required : true,
            }

        },


        /*messages: {
         
            
            fname : {
                required : "Please Provide Your Name"
            }, 
            lname : {
                required : "Please Provide Your Name"
            },
            email : {
                required : "Please Provide Your Email"
            },
             phone : {
                required : "Please Provide Your phone No"
            },
        }*/
    });












    $("#wizard").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        labels: {
            previous : 'Back',
            next : 'Continue',
            finish : 'Submit'
            
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            $("#wizard").validate().settings.ignore = ":disabled,:hidden";
            return $("#wizard").valid();
        },
        onFinished: function (event, currentIndex)
        { 
            $("#wizard").validate().settings.ignore = ":disabled,:hidden";
            if($("#wizard").valid())
            {
              $("#wizard").submit();
            }
           
        }
});
    });

