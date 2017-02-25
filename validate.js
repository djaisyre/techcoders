<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

<script>
// just for the demos, avoids form submit
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});

$( "#savepp" ).validate({
  rules: {
    field: {
      required: true
    }
  }
});


$( "#savepp" ).validate({
  rules: {
    agree: {
      required: true
    }
  }
});


</script>