{% extends "base.php" %}
{% block results %}
	<img src="/assets/img/{{img}}.png" id="graph" alt="Revenue Graph">
	<article>
		<h2><button class="success mailSend ">Send this report via email <i class="fa fa-envelope-o"></i> </button></h2>
		<hr style="clear:both;">
		<table class="dataTable table striped">
			<thead>
				<tr>
			    	<th>Client</th>
			    	<th>Product</th>
			    	<th>Total</th>
			    	<th>Date</th>
			    	<th>Actions</th>
			    </tr>
			</thead>
			{# Printing a row for each record, the 'total' variable will hold the sum of all sales #}
			{% set total = 0 %}
			{% for product in products %}
			<tr>
		    	<td><strong>{{product.client}}</strong></td>
		    	<td>{{product.product}}</td>
		    	<td class="money">$ {{product.total|number_format(2, '.', ',')}}</td>
		    	<td>{{product.date|date("m/d/Y")}}</td>
{% set total = total + product.total %}
		    	<td align="center"> <a href="/product/edit/{{product.id}}/">Edit</a> &nbsp;&nbsp;&nbsp; <a href="Javascript:;" data-id="{{product.id}}" class="deleterow">Delete</a></td>
			</tr>
			 {% endfor %}
			<tfoot>
				<tr>

					<td>&nbsp;</td>
					<td><b>Total</b></td>
					<td class="money"><b>$ {{total|number_format(2, '.', ',')}}</b></td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</tfoot>
			</table>
		</article>

{% endblock %}