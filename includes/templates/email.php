<table width="100%">
   <tr>
      <td align="center">
      	<h2>{{title}}</h2>
         <a href="{{base}}/assets/img/{{img}}.png"><img src="{{base}}/assets/img/{{img}}.png" id="graph" width="700" alt="Revenue Graph"></a>
         <p style="font-size:12px">Click  the image to see full size.</p>
         <table class="dataTable table striped" cellpadding="5" width="700">
            <thead>
               <tr>
                  <th>Client</th>
                  <th>Product</th>
                  <th>Total</th>
                  <th>Date</th>
               </tr>
            </thead>
            {# Printing a row for each record, hte 'total' variable will hold the sum of all sales #}
            {% set total = 0 %} {% set count = 0 %}
			{% for product in products %}
				{% set count = count + 1 %}

				{% if count % 2 == 0 %}
					{% set style = "bgcolor='#EEE'" %}
				{% else %}    
					{% set style = '' %}
				{% endif %}

			<tr {{style|raw}}>
               <td><strong>{{product.client}}</strong></td>
               <td>{{product.product}}</td>
               <td align="right" style="font-family:monospace">$ {{product.total|number_format(2, '.', ',')}}</td>
               <td>{{product.date|date("m/d/Y")}}</td>
               {% set total = total + product.total %}
            </tr>
            {% endfor %}
            <tfoot>
               <tr>
                  <td>&nbsp;</td>
                  <td><b>Total</b></td>
                  <td align="right" style="font-family:monospace"><b>$ {{total|number_format(2, '.', ',')}}</b></td>
                  <td>&nbsp;</td>
               </tr>
            </tfoot>
         </table>
      </td>
   </tr>
</table>