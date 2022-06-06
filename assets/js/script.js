$(document).ready(function () {
	$('input[type="tel"]').mask('+998 11 111 11 11');
	$('input[type="tel"]').on('focus', function () {
		$(this).val('+998');
	});
});
