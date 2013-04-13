$(document).ready(function(){
 
 $('#registro').validate(
 {
  rules: {
    username: {
      minlength: 6,
      maxlength: 10,
      required: true
    },
	first_name: {
		minlength: 4,
		maxlength: 24,
		required: true
	},    
	last_name: {
		minlength: 4,
		maxlength: 24,
		required: true
	},
    email: {
      required: true,
      email: true
    },
    password: {
    	required: true
    },
    password_confirmation: {
    	equalTo: "#password"
    },
    birthday: {
    	required: true
    },
  },
  highlight: function(element) {
    $(element).closest('.fuelux .control-group').removeClass('success').addClass('error');
    $('button.btn.btn-mini.btn-next').removeClass('enabled').addClass('disabled');
  },
  success: function(element) {
    element
    .text('OK!').addClass('valid')
    .closest('.fuelux .control-group').removeClass('error').addClass('success');
    $('button.btn.btn-mini.btn-next').removeClass('disabled').addClass('enabled');
  },
 });

 $('#birthday').datepicker();
 
 // INITIALIZE WIZARD
 $('#MyWizard').on('change', function(e, data) {
   console.log('change');
   if(data.step===3 && data.direction==='Terminar') {
     return e.preventDefault();
   }
 });
 $('#MyWizard').on('changed', function(e, data) {
   console.log('changed');
 });
 $('#MyWizard').on('finished', function(e, data) {
   console.log('finished');
 });
 $('#btnWizardPrev').on('click', function() {
   $('#MyWizard').wizard('previous');
 });
 $('#btnWizardNext').on('click', function() {
   $('#MyWizard').wizard('next','foo');
 });
 $('#btnWizardStep').on('click', function() {
   var item = $('#MyWizard').wizard('selectedItem');
   console.log(item.step);
 });
 $('#MyWizard').on('stepclick', function(e, data) {
   console.log('step' + data.step + ' clicked');
   if(data.step===1) {
     // return e.preventDefault();
   }
 });
})