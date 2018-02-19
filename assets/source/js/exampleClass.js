(#theme_namespace#) = (#theme_namespace#) || {};
(#theme_namespace#).ExampleNamespace = (#theme_namespace#).Liquid || {};

(#theme_namespace#).ExampleNamespace.ExampleClass = (function ($) {

	var classVariable = false;

    /**
     * Constructor
     * Should be named as the class itself
     */
	function ExampleClass() {

    }

    /**
     * Method
     */
    ExampleClass.prototype.exampleMethod = function () {

    }

	return new ExampleClass();

})(jQuery);
