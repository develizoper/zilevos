$.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\w+$/i.test(value);
}, "Letters, numbers, and underscores only please");

$.validator.addMethod("alpha", function(value, element) {
	return this.optional(element) || /^[A-Za-z\s]+$/i.test(value);
}, "Solo puede ingresar letras.");