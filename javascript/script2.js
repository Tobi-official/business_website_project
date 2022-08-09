
   $("#register_form").on("submit", function(e) {
      e.preventDefault();
      $('#submit').text('Loading...');
      let full_name = $("#full_name").val(),
      email = $("#email").val();

      var formdata = new FormData();
      const xhttp = new XMLHttpRequest();

      formdata.append('full_name', full_name);
      formdata.append('email', email);

      xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          //Send Success message
          $('.alert').text(this.responseText);
          $('#full_name').val('');
          email = $('#email').val('');
          $('#submit').text('Submit');
        }
      }
      xhttp.open("POST", "ajax/register_ajax.php", true);
      xhttp.send(formdata);
   });




  





/*
 $("#fetch_button").click(function() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          $('#sample').HTMl(this.responseText);
          //document.getElementById('sample').innerHTML=this.responseText;
        }
        xhttp.open("GET","ajax/sample.txt");
        xhttp.send();
    });

$(document).ready(function() {
  // $('.box').animate({left: '100px', width: '200px', top: '200px'});
     $('.box').hide('slow', function() {
      alert('Box hidden!');
    });
  }); 
$(document).ready(function() {
    let boxText = $('.box').text();
    console.log(boxText);
  }); 

$("#register_form").on("submit", function(e) {
    e.preventDefault();
    $('#submit').text('Loading...');
    let full_name = $('#full_name').val(),
     email = $('#email').val();

     $.ajax({
      type: 'POST',
      url: 'ajax/register_ajax.php',
      data: {
        full_name: full_name,
        email: email
      },
      success: function(response) {
          $('.alert').text(response);
          $('#full_name').val('');
          $('#email').val('');
          $('#submit').text('Submit');
      }
    });


  });




  $("#register_form").on("submit", function(e) {
    e.preventDefault();
    $('#submit').text('Loading...');
    let full_name = $('#full_name').val(),
     email = $('#email').val();

     const xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if(this.readyState == 4 && this.status == 200) {
          // send success message
          $('.alert').text(this.responseText);
          $('#full_name').val('');
          email = $('#email').val('');
          $('#submit').text('Submit');
      }
    }

    xhttp.open("POST", "ajax/register_ajax.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("full_name="+full_name+"&email="+email);

  });
    





  $('#fetch_button').click(function() {
    const xhttp =  new XMLHttpRequest();
    xhttp.onload = function() {
      //Display response in html
      document.getElementById('sample').innerHTML=this.responseText;
    }
    xhttp.open("GET", "ajax/sample.txt");
    xhttp.send();
  });
  
  */
  
  $('#style').click(function() {
    $('.simple.heading1 ').not('.select').css('color', 'red')
  })


  //animate
 /*
$(document).ready(function() {
    //$('.box').animate({left: '100px', width: '500px', top: '200px'});
    $('.box').hide('slow');
    alert('Box hidden')
  });

  



  $(document).ready(function() {
    $('.box').html("This is <h1>another text</h1> for the box");
  })
  
$('#reg_form').on('submit', function(e) {
    e.preventDefault();
    $('#first_name').val('Tobiloba');
  });

$('#add').click(function() {
    $('.paragraph').before('<b> Hello Tobi.</b>');
  });

   $('#remove').click(function() {
    var dimension = $(window).height();
    console.log(dimension);
  })

  

  */
  
 



  $('#hamburger_menu').click(function() {
    $('#media_menu').slideToggle('slow');
    
  });
  
  /*
  $(document).ready(function() {
  });
    $('.product').hide(5000);

  
  $('.slider').click(function() {
    $('.product').toggle();
  })


  $('.product h4').hover(function() {
    $(this).css('color','red');
  });


$('#hamburger_menu').click(function() {
    $('#media_menu').slideUp('slow');
    
  });

  $(document).ready(function() {
    $('#media_menu').slideDown('slow');
  });

*/

  


/*   $(document).ready(function() {
      $('.product').fadeTo('slow', 0.3);
  });

var menu_icon = document.getElementById("hamburger_menu");

menu_icon.addEventListener("click", function() {
    var menu_item = document.getElementById("media_menu");
    menu_item.classList.toggle("display");
});   */


