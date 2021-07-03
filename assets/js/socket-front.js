$(function () {
  //var dybSocket = location.protocol+'//'+host+':'+port+'';
  //var socket = io(dybSocket);
    var socket = io('https://socket.gdmbpo.com');
  /*************************** chat**********************/

   socket.on('logoutUpdate',function(id){
      console.log(id);
   });

  // chat submit
  socket.on('updatechat', function (room, senderId, data) {
    $('.typing'+room).addClass('d-none');


    var dataMessage = data;

  //  var sender = $('.typing'+room).parents('.chat-div').attr('data-sender');
    let ele2 = $('.message-wrap');

    if(senderId != sender)
    {

      $.ajax({
        url: SITE_URL + '/gettime',
        type: "post",
        data: {
          'time': 1,'sender':senderId
        },
        headers : {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success: function (data) {

          var row = '';
          row +='<div class="message-list">';
          row +='<div class="msg">';
          row +='<p class="msgsendname">'+data.senderName+'</p>';
          row +='<p>'+dataMessage+'</p>';
          row +='</div>';
          row +='<div class="time">'+data.time+'</div>';
          row +='</div>';
          $('.message-wrap').append(row);
        },
        error: function (data) {
          console.log(data, error);
        }
      });
    }
    if(senderId == sender)
    {
      $.ajax({
        url: SITE_URL + '/save-chat',
        type: "post",
        data: {
          'message': dataMessage,
          'roomId' : room,
          'userId' : sender
        },
        headers : {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
        success: function (data) {
          var row = '';
          row +='<div class="message-list me">';
          row +='<div class="msg">';
          row +='<p class="msgsendname">'+data.senderName+'</p>';
          row +='<p>'+dataMessage+'</p>';
          row +='</div>';
          row +='<div class="time">'+data.time+'</div>';
          row +='</div>';
          $('.message-wrap').append(row);
        },
        error: function (data) {
          console.log(data, error);
        }
      });
    }
    ele2.animate({ scrollTop: ele2.prop('scrollHeight')}, 1000);
  });

  // show new message alert on inactive user screen
  socket.on('allusermessage', function(room, sender, data) {
    var senderId = $('.senderId').val()
    // var receiverId = $('.typing'+room).parents('.chat-div').attr('data-receiver');
    // var roomIdd = $('.typing'+room).parents('.chat_wrap').attr('data-room');
    // console.log(sender+' sender '+senderId+' '+receiver+' receiver '+receiverId);
    // var ko = isOnScreen( jQuery( '#tab15-tab' ) );console.log('hjjjjj '+ko);
    if(sender != senderId)
    {
      $('.unread'+room).removeClass('d-none');
      var currentCount = $.trim($('.unread'+room).html());
      if(currentCount == '')
      currentCount = 0;
      else
      currentCount = currentCount;
      // $('.personli'+receiverId).parent().prepend($('.personli'+receiverId).clone(true,true));
      // $('.personli'+receiverId).addClass('un-read-message');
      $('.unread'+room).html(parseInt(currentCount)+1);
      var unread = parseInt(currentCount)+1;
      $(document).prop('title','Chat ('+unread+')');
      document.title = 'Chat ('+unread+')';


      // $('.personli'+receiverId).last().remove();
    }
    // if(($('.personli'+receiverId).hasClass('active') == true) && (receiver == senderId))
    // {
    //   $('.personli'+receiverId).trigger('click');
    // }
  });

  // typing event
  socket.on('showtyping', function(room,sender){
    var senderId = $('.typing'+room).parents('.chat-div').attr('data-sender');
    var receiverId = $('.typing'+room).parents('.chat-div').attr('data-receiver');
    if(senderId != sender)
    $('.typing'+room).removeClass('d-none');

    setTimeout(function(){
      let ele2 = $('.chat_wrap[data-room-id="'+room+'"]');
      ele2.animate({ scrollTop: ele2.prop('scrollHeight')}, 1000);
      $('.typing'+room).addClass('d-none');
    },3500);
    return false;
  });

  // set user
  if(roomIdd)
  {
    let ele = $('.message-wrap');
    ele.animate({ scrollTop: ele.prop("scrollHeight")}, 1000);
    socket.emit('switchRoom', roomIdd);
    socket.emit('adduser', roomIdd, sender);
  }

  function p()
  {
    let x = document.getElementById('myAudio');
    x.play();
  }
  // click event on chat person
  $(document).on('click', '.person', function (event) {
    var sender = $(this).attr('data-sender');
    var room = $(this).attr('data-room');
    $('.unread'+room).html('');
    $('.unread'+room).addClass('d-none');
    $('.person').removeClass('active');
    $(this).addClass('active');
    // $(this).find('.msg_count').html('');
    // $('.left-mobile').hide();
    // $('.right-mobile').show();
    socket.emit('switchRoom', room);
    socket.emit('adduser', room, sender);
    $(document).find('#message-to-send').val('');
    $.ajax({
      url: SITE_URL + '/latest-history',
      type: "post",
      data: {
        'data_room' : room,
        'sender' : receiver,
      },
      headers : {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
      success: function (data) {
        let ele = $(document).find('.message-wrap');
        ele.html(data.rhtml);
        $('.chatroomName').html(data.roomName);
         ele.attr('data-room',data.roomId);
         ele.attr('data-offset',data.offset);
         $('.groupdetail').attr('data-id',data.roomId);
        ele.animate({ scrollTop: ele.prop("scrollHeight")}, 1000);
        var t = 0;
        var ttotal = 0;
          $( ".unread" ).each(function( index ) {
          var t = $.trim($(this).html());
          if(t)
          {
          ttotal = parseFloat(t) + parseFloat(ttotal);
          }
          });
          if(ttotal > 0)
          {
          document.title = 'Chat ('+ttotal+')';
          }
          else
          {
            document.title = ' Chat ';
          }
      },
      error: function (data) {
        console.log(data, error);
      }
    });
  });

  // readMessage
  $(document).on('click', '.message-wrap,.chatinputForm', function () {
  var room = $('.message-wrap').attr('data-room');
  var receiver = $('.senderId').val();
  var currentCount = $.trim($('.unread'+room).html());
  var count = parseInt(currentCount);
  if(count)
  {
  $.ajax({
    url: SITE_URL + '/readmessage',
    type: "post",
    data: {
      'roomId' : room,
      'userId' : receiver,
    },
    headers     : {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
    success: function (data) {
      if(data.success == "true")
      {

      $('.unread'+room).html('');
      $('.unread'+room).addClass('d-none');
      var t = 0;
      var ttotal = 0;
        $( ".unread" ).each(function( index ) {
        var t = $.trim($(this).html());
        if(t)
        {
        ttotal = parseFloat(t) + parseFloat(ttotal);
        }
        });
        if(ttotal > 0)
        {
        document.title = 'Chat ('+ttotal+')';
        }
        else
        {
          document.title = ' Chat ';
        }

      }
    },
    error: function (data) {
      console.log(data, error);
       }
    });
    }
  })
  // readMessage


  // send message with enter
  $(document).on('submit', '.chatinputForm', function (event) {
    if($('#message-to-send').val() != '')
    {
      var roomId = $('.active-chat').attr('data-room');
      event.preventDefault();
      socket.emit('sendchat', $('#message-to-send').val());
      $('#message-to-send').val('');
    }
    return false;
  });

  // keyup on text input
  $(document).on('keyup', '#message-to-send', function () {
    var user = $('.active-chat').attr('data-user');
    var sender = $('.active-chat').attr('data-sender');
    var receiver = $('.active-chat').attr('data-receiver');
    var roomId = $('.active-chat').attr('data-room');
    socket.emit('showtyping',roomId,sender);
  });

  // view user
$('body').on('click','.groupdetail',function(){

   var id = $(this).attr('data-id');
   $.ajax({
     dataType:'json',
      url: SITE_URL + '/groupdetail',
      type :'post',
      data : {
        id:id
      },
      enctype : 'multipart/form-data',
     headers     : {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     beforeSend  : function () {
       $(".loader_panel").css('display','block');
     },
     complete: function () {
       $(".loader_panel").css('display','none');
     },
     success: function(response){
     if (response.success)
     {
       var result = response.result;

       var rows = '';
     if(result)
    {
     $.each( result, function( key, value ){


      rows +='<div class="maintaxiview">';
      rows += '<p><b>'+value.name+' - '+value.company;
      rows +='<span class="roleshow">('+value.type+')</span>';
      if(value.time == 0)
      {
      rows +='<i  class="offline fa fa-circle"></i></b></p>';
      }
      else if(value.time == 1)
      {
        rows +='<i  class="online fa fa-circle"></i></b></p>';
      }
      rows +='</div>';
     })
    }
      console.log(rows);
     $('.viewgroupdetails').html(rows);
     $('#view').modal('show');
     }

   }
 });
});

// view driver

  // get preview message on scroll up
  $('.message-wrap').scroll(function () {
    if($(this).scrollTop() < 1) {
      let ele = $(this);
      let data_offset = parseInt($(this).attr('data-offset'));
      let data_room = $(this).attr('data-room');
      $.ajax({
        url: SITE_URL + '/getoldMessage',
        type: "post",
        data: {
          'data_offset': data_offset,
          'data_room' : data_room,
        },
        headers : {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
        success: function (data) {
          /*let sm = ele.find('append-chat');*/
          ele.prepend(data.rhtml);
          ele.attr('data-offset',data.offset);
          isOnScreen(ele);
        },
        error: function (data) {
          console.log(data, error);
        }
      });
    }
  })

  $('.btn-back').on('click', function(){
    $('.right-mobile').hide();
    $('.left-mobile').show();
  })
  if ($(window).width() < 767) {
    // console.log($(window).width());
    $('#left-chat').addClass('left-mobile');
    $('#right-panel').addClass('right-mobile');
  } else {
    // console.log($(window).width());
    $('#left-chat').removeClass('left-mobile');
    $('#right-panel').removeClass('right-mobile');
  }

  function isOnScreen(elem) {
    // if the element doesn't exist, abort
    if( elem.length == 0 ) {
      return;
    }
    var $window = jQuery(window)
    var viewport_top = $window.scrollTop()
    var viewport_height = $window.height()
    var viewport_bottom = viewport_top + viewport_height
    var $elem = jQuery(elem)
    var top = $elem.offset().top
    var height = $elem.height()
    var bottom = top + height

    return (top >= viewport_top && top < viewport_bottom) ||
    (bottom > viewport_top && bottom <= viewport_bottom) ||
    (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
  }
});
