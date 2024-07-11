function readURL(input) {
    if (input.files && input.files[0]) {
  
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.image-upload-wrap').hide();
  
        $('.file-upload-image').attr('src', e.target.result);
        $('.file-upload-content').show();
  
        $('.image-title').html(input.files[0].name);
      };
  
      reader.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload();
    }
  }
  
  function removeUpload() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content').hide();
    $('.image-upload-wrap').show();
  }
  $('.image-upload-wrap').bind('dragover', function () {
      $('.image-upload-wrap').addClass('image-dropping');
    });
    $('.image-upload-wrap').bind('dragleave', function () {
      $('.image-upload-wrap').removeClass('image-dropping');
  });

// fuction2

  function readURL1(input) {
    if (input.files && input.files[0]) {
  
      var reader1 = new FileReader();
  
      reader1.onload = function(e) {
        $('.image-upload-wrap1').hide();
  
        $('.file-upload-image1').attr('src', e.target.result);
        $('.file-upload-content1').show();
  
        $('.image-title').html(input.files[0].name);
      };
  
      reader1.readAsDataURL(input.files[0]);
  
    } else {
      removeUpload1();
    }
  }
  
  function removeUpload1() {
    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
    $('.file-upload-content1').hide();
    $('.image-upload-wrap1').show();
  }
  $('.image-upload-wrap1').bind('dragover', function () {
      $('.image-upload-wrap1').addClass('image-dropping');
    });
    $('.image-upload-wrap1').bind('dragleave', function () {
      $('.image-upload-wrap1').removeClass('image-dropping');
  });