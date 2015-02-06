 
<script src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>
<!-- when using Google to load JSON API -->
<script src="http://www.google.com/jsapi" type="text/javascript"></script>
<script src="http://www.geoplugin.net/ajax_currency_converter.gp" type="text/javascript"></script>
<!-- When using your own JSON API -->
<!-- <script src="http://www.geoplugin.net/ajax_currency_converter.gp?nogoog=1" type="text/javascript">
</script> -->
<input type='text' id='gp_amount' size='4' /> 
<select id="gp_from"></select> to <select id="gp_to"></select>
<p><input type='button' onClick='gp_convertIt()' value = 'Convert It' /></p>
<div id="gp_converted"></div>
<script>gp_currencySymbols()</script>