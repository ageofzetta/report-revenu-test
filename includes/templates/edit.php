{% extends "base.php" %}
	{% block errors %}
	{% if message %}
		<span class="message"> {{message}} </span>
	{% endif %}
	{% endblock %}
{% block results %}
	<article>
		<form method="POST">
            <fieldset>
                <legend>Edit '{{product.product}}'</legend>
                <label>Product Name</label>
                <div class="input-control text" data-role="input-control">
                    <input type="text" value='{{product.product}}' name="product" >
                    <button class="btn-clear" tabindex="-1"></button>
                </div>
                <label>Client</label>
                <div class="inputs input-control select">
					<select name="client" id="client">
						{% for client in clients %}
							<option value="{{client.client}}">{{client.client}}</option>
						{% endfor %}
					</select>
				</div>
                

                <label>Total</label>
                <div class="input-control text" data-role="input-control">
                    <input type="number" step="0.01"  name="total" placeholder="Only positive numbers (accepts decimals)"value='{{product.total}}' required="required">
                    <button class="btn-clear" tabindex="-1"></button>
                </div>

                <label>Date</label>
                <div class="input-control text" data-role="input-control">
                    <input type="date" id="datinput" value="{{product.date|date("Y-m-d")}}"  name="date" placeholder="In format yyyy-mm-dd" required="required">

                </div>


				{{csrf|raw}}
                <input class="success" type="submit" value="Save">
                <input class="danger deleterecord" data-id="{{product.id}}" type="button" value="Delete">
                <a href="/" class="btn button"> Cancel</a>

            </fieldset>
        </form>
    </article>
<script>
	 $('#client').val('{{product.client}}');
</script>

{% endblock %}