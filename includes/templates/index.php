{% extends "base.php" %}
{% block results %}
	<hr style="clear:both">
	<img src="/assets/img/{{img}}.png" id="graph" alt="Graph should be here">
	<hr style="clear:both">
	<article>
		<table>
			<thead>
				<tr>
			    	<th>Id</th>
			    	<th>Client</th>
			    	<th>Product</th>
			    	<th>Total</th>
			    	<th>Date</th>
			    </tr>
			</thead>
			{% set total = 0 %}
			{% for product in products %}
			<tr>
		    	<td>{{product.id}}</td>
		    	<td><a href="/client/{{product.client}}/">{{product.client}}</a></td>
		    	<td>{{product.product}}</td>
		    	<td>{{product.total}}</td>
		    	<td>{{product.date|date("m/d/Y")}}</td>
				{% set total = total + product.total %}
			</tr>
			 {% endfor %}
			<tfoot>
				<tr>

					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td><b>Total</b></td>
					<td><b>{{total}}</b></td>
					<td>&nbsp;</td>
				</tr>
			</tfoot>
			</table>
		</article>
		
{% endblock %}