
$(document).ready(function(){
  
  var  validator = $("#signup_form").validate({
    rules: {
     name:"required",
    
    email: {
       required: true,
       email: true
     },

     phone:
     {
     required:true,
     minlength:10,
     maxlength:10
 	},

 	pass:{ 
            required:true
            //re_pw: true
          },
    
    repass:
     {
      equalTo:"#pass"
     }
},
	messages: {
    
      name:"name should not empty",
	
	 email: {
       required: "We need your email address to contact you",
       email: "Your email address must be in the format of name@somaiya.edu"
    	 },
    	
    email1: {
       required: "We need your email address to contact you",
       email: "Your email address must be in the format of name@somaiya.edu"
    	 },

    phone:
    {
      required:"enter number",
      minlength:"enter 10 digit only",
      maxlength:"enter 10 digit only"
    },

     pass: { 
            required: "Enter Password",
            //re_pw : "Password must be 8 characters and must include a special character"
          }



 }
  });

  $.validator.addMethod("email",function(value,element){
      var em = /(\W|^)*@somaiya\.edu(\W|$)/;
      return (em.test(value) > 0); 
  });
     
});


$(document).ready(function(){
  var  validator = $("#signin_form").validate({
    rules: {
         
    email: {
       required: true,
       email: true
     },

  pass:{ 
            required:true,
            //re_pw: true
          }
    
    },

  messages: {
    
      
   email: {
       required: "We need your email address to contact you",
       email: "Your email address must be in the format of name@somaiya.edu"
       },
      
     pass: { 
            required: "Enter Password",
            //re_pw : "Password must be 8 characters and must include a special character"
          }

 }
  });

  $.validator.addMethod("email",function(value,element){
      var em = /(\W|^)*@somaiya\.edu(\W|$)/;
      return (em.test(value) > 0); 
  });
     
});
