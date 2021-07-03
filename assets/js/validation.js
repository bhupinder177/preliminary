jQuery(document).ready(function () {

var base_url = $('.base_url').val();



$.validator.addMethod("lettersonly", function(value, element) {
         return this.optional(element) || /^[a-z," "]+$/i.test(value);
   }, "Only alphabets are allowed.");

   jQuery.validator.addMethod("noSpace", function(value, element) {
		return value.indexOf(" ") < 0 && value != "";
	}, "Space are not allowed");

   jQuery.validator.addMethod("regex", function(value, element, param){
         return this.optional(element) || /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i.test(value);
      }, "Please enter a valid email address.");


    // login
    $("#loginform").validate({
      errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
   rules:
   {
     email: {
       required: true,
       email:true,
       regex: "",
     },
     password: {
       required: true
     },
   },
   messages:
   {
     email: {
       required: "Please enter email address",
     },
     password: {
       required: "Please enter password",

     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // login
    // login
    $("#employeeloginform").validate({
      errorClass: "has-error",
    highlight: function(element, errorClass) {
        //$(element).parents('.form-group').addClass(errorClass);
    },
    unhighlight: function(element, errorClass, validClass) {
      //  $(element).parents('.form-group').removeClass(errorClass);
    },
   rules:
   {
     companyId: {
       required: true,
     },
     loginId: {
       required: true,
     },
     password: {
       required: true
     },
   },
   messages:
   {
     companyId: {
       required: "Please enter company Id",
     },
     loginId: {
       required: "Please enter login Id",
     },
     password: {
       required: "Please enter password",

     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // login

    // forgotpassword
    $("#forgotpasswordform").validate({
   rules:
   {
     email: {
       required: true,
       email:true,
       regex: "",
     },
   },
   messages:
   {
     email: {
       required: "Please enter email address",
     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // forgotpassword

    // Newpassword
    $("#newpasswordform").validate({
   rules:
   {
     password: {
       required: true
     },
     confirm_password: {
       required: true,
        equalTo: "#password",
     },
   },
   messages:
   {
     password: {
       required: "Please enter password",
     },
     confirm_password: {
       required: "Confirm password is required",
     },
   },
   submitHandler: function (form)
   {
     formSubmit(form);
   }
 });

 // Newpassword

 // profile update
 $("#profileUpdate").validate({
rules:
{
  name: {
    required: true
  },
  address: {
    required: true,
  },
  timezone: {
    required: true,
  },
},
messages:
{
  name: {
    required: "Please enter name",
  },
  address: {
    required: "Please enter address",
  },
  timezone: {
    required: "Please select timezone",
  },
},
submitHandler: function (form)
{
  formSubmit(form);
}
});

// profile update

// company
$("#addcustomer").validate({
rules:
{
 name: {
   required: true,
 },
 email: {
   required: true,
   email:true,
   regex: "",
 },
 address: {
   required: true,
 },
 phone: {
   required: true,
 },
},
messages:
{
 name: {
   required: "Please company name",
 },
 email: {
   required: "Please enter email",
 },
 address: {
   required: "Please enter address",
 },
 phone: {
   required: "Please enter address",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});

// company add

// add variation
 $("#addvariation").validate({
   errorClass: "has-error",
       highlight: function (element, errorClass) {
         jQuery(element).parents('.form-group').addClass(errorClass);
       },
       unhighlight: function (element, errorClass, validClass) {
         jQuery(element).parents('.form-group').removeClass(errorClass);
       },
 rules:
 {
  variationName: {
    required: true
  },
  variationStatus: {
    required: true,
  },
 },
 messages:
 {
  variationName: {
    required: "Please enter variation name ",
  },

  variationStatus: {
    required: "Please select status",
  },
 },
 submitHandler: function (form)
 {
    formSubmit(form);

 }
 });

// user
$("#adduser").validate({
rules:
{
 name: {
   required: true,
 },
 email: {
   required: true,
   email:true,
   regex: "",
 },
 type: {
   required: true,
 },
},
messages:
{
 name: {
   required: "Please company name",
 },
 email: {
   required: "Please enter email",
 },
 type: {
   required: "Please select type",
 },
},
submitHandler: function (form)
{
 formSubmit(form);
}
});

// user add

  // back
 $('.cancel').click(function(){
		parent.history.back();
		return false;
	});

  // back

});
  // End jquery



 function formSubmit(form)
{

  $.ajax({
    url         : form.action,
    type        : form.method,
    data        : new FormData(form),
    enctype : 'multipart/form-data',
    contentType : false,
    cache       : false,
    headers     : {
     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    processData : false,
    dataType    : "json",
    beforeSend  : function () {
      $(".button-disabled").attr("disabled", "disabled");
      $(".loader_panel").css('display','block');
    },
    complete: function () {
      $(".loader_panel").css('display','none');
        $(".button-disabled").attr("disabled",false);
    },
    success: function (response) {

      if(response.url)
      {
        if(response.delayTime)
        setTimeout(function() { window.location.href=response.url;}, response.delayTime);
        else
        window.location.href=response.url;
      }
      $.toast().reset('all');
      var delayTime = 3000;
      if(response.delayTime)
      delayTime = response.delayTime;
      if (response.success)
      {
        $.toast({
          heading             : 'Success',
          text                : response.success_message,
          loader              : true,
          loaderBg            : '#fff',
          showHideTransition  : 'fade',
          icon                : 'success',
          hideAfter           : delayTime,
          position            : 'top-right'
        });

            if (response.modelhide) {

            if (response.delay)
            {

            setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
            }
             else
             {

            $(response.modelhide).modal('hide');
              }
            }
      }
      else
      {

        $(".button-disabled").removeAttr("disabled");
        if( response.formErrors)
        {
          $.toast({
            heading             : 'Error',
            text                : response.errors,
            loader              : true,
            loaderBg            : '#fff',
            showHideTransition  : 'fade',
            icon                : 'error',
            hideAfter           : delayTime,
            position            : 'top-right'
          });
        }
        // else
        // {
        //   $.toast({
        //     heading             : 'Error',
        //     text                : response.error_message,
        //     loader              : true,
        //     loaderBg            : '#fff',
        //     showHideTransition  : 'fade',
        //     icon                : 'error',
        //     hideAfter           : delayTime,
        //     position            : 'top-right'
        //   });
        // }
      }

      if(response.validation == false)
      {
          var i = 0;
          $.each(response.errors, function( index, value )
          {
          if (i == 0) {
          $("input[name='"+index+"']").focus();
          }
          var str=value.toString();
          if (str.indexOf('edit') != -1) {
          // will not be triggered because str has _..
          value=str.toString().replace('edit', '');
          }


          // $("input[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("input[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

          // $("textarea[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("textarea[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

          // $("select[name='"+index+"']").parents('.form-group').addClass('has-error');
          $("select[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');
          i++;
          });
          $("input[type=submit]").removeAttr("disabled");
          $("button[type=submit]").removeAttr("disabled");
      }

      if(response.ajaxPageCallBack)
      {
        response.formid = form.id;
        ajaxPageCallBack(response);
      }
      if(response.resetform)
        {
         //$('.reset').resetForm();
         $('.reset')[0].reset();
         }
      if(response.url)
      {
        if(response.delayTime)
        setTimeout(function() { window.location.href=response.url;}, response.delayTime);
        else
        window.location.href=response.url;
      }
      if (response.modelhide)
      {
         if (response.delay)
         setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
         else
         $(response.modelhide).modal('hide');
      }
      if(response.html){
          $(response.target).html(response.html);
      }
      if (response.reload)
      {
         if(response.delayTime)
         setTimeout(function(){  location.reload(); }, response.delayTime)
         else
         location.reload();
      }
    },
    error:function(response){
        $.toast({
          heading             : 'Error',
          text                : "Server Error",
          loader              : true,
          loaderBg            : '#fff',
          showHideTransition  : 'fade',
          icon                : 'error',
          hideAfter           : 4000,
          position            : 'top-right'
        });

    }
  });
}
 // *************** submit function******************
 function formSubmit1(form)
{
    $.ajax({
        url         : form.action,
        type        : form.method,
        // data        : form.serialize(),
        data        : new FormData(form),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType : false,
        cache       : false,
        processData : false,
        dataType    : "json",
        beforeSend  : function () {
            $("input[type=submit]").attr("disabled", "disabled");
            $("#preloader").show();
        },
        complete: function () {
            $("#preloader").hide();
            $("input[type=submit]").removeAttr("disabled");
            $("button[type=submit]").removeAttr("disabled");
        },
        success: function (response) {
            console.log(response);
            $("#preloader").hide();
            $("input[type=submit]").removeAttr("disabled");
            if (response.success)
            {
                form.reset();
                toastr.success(response.message,response.delayTime);
                if( response.updateRecord)
                {
                    $.each(response.data, function( index, value )
                    {
                        $(document).find('#tableRow_'+response.data.id).find("td[data-name='"+index+"']").html(value);
                    });
                }
                if( response.addRecord)
                {
                    $.each(response.data, function( index, value )
                    {
                        $("input[name='"+index+"']").parents('.form-group').addClass('has-error');
                        $("input[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');

                        $("select[name='"+index+"']").parents('.form-group').addClass('has-error');
                        $("select[name='"+index+"']").after('<label id="'+index+'-error" class="has-error" for="'+index+'">'+value+'</label>');
                    });
                }
                if(response.showElement)
                {
                    var showIDs = response.showElement.split(",");
                    $.each(showIDs, function(i, val){ $(val).removeClass('d-none'); });
                }
                if(response.hideElement)
                {
                    var hideIDs = response.hideElement.split(",");
                    $.each(hideIDs, function(i, val){ $(val).addClass('d-none'); });
                }
            }
            if(response.validation===false){
                jQuery.each(response.message,function(index,value){
                    $('#error_'+index).html(value);
                    $('#error_'+index).show();
                    $("input[name='"+index+"']").addClass('is-invalid');
                    $("select[name='"+index+"']").addClass('is-invalid');
                    $("textarea[name='"+index+"']").addClass('is-invalid');
                });
            }
            if(response.error){
                toastr.error(response.message,response.delayTime);
            }
            if(response.html){
                jQuery(response.target).html(response.content);
            }

            if(response.ajaxPageCallBack)
            {
                response.formid = form.id;
                ajaxPageCallBack(response);
            }

            if(response.resetform)
            {
                $('#'+form.id).trigger('reset');
            }
            if(response.submitDisabled)
            {
                $("input[type=submit]").attr("disabled", "disabled");
                $("button[type=submit]").attr("disabled", "disabled");

            }
            if (response.modelhide) {

                if (response.delay)
                    setTimeout(function (){ $(response.modelhide).modal('hide') },response.delay);
                else
                    $(response.modelhide).modal('hide');
            }
            if(response.url)
            {
                if(response.delayTime)
                    setTimeout(function() { window.location.href=response.url;}, response.delayTime);
                else
                    window.location.href=response.url;
            }
            if (response.reload) {
                if(response.delayTime)
                    setTimeout(function(){  location.reload(); }, response.delayTime)
                else
                    location.reload();
            }

            if (response.elementHide) {
                jQuery(response.elementHide).addClass('d-none');
            }
            if (response.elementShow) {
                jQuery(response.elementShow).removeClass('d-none');
            }

            if (response.customScript=='adminWalletTxn') {
                $('#walletModelForm').attr('action',response.wallet_url);
                $('.w_ag_name').text(response.agent_name);
                $('.w_ag_amt').text(response.wallet_amount);
            }

        },
        error:function(response){
            networkError();
            console.log('Connection Error');
        }
    });
}
