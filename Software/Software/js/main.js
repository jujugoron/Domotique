function Calculator()
{
    that 		= this,
    this.field  = "input#number",
    this.button = ".buttons",
    this.init   = false,

    this.run = function()
    {
        $(this.button).click(function() {
            var value = $(this).html();
            $(that.field).val($(that.field).val() + value);
        });
    },

   
    this.operation = function(value, symbol)
    {};
}