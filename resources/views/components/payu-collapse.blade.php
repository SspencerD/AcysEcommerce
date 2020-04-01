<label class="mt-3">Detalles de su tarjeta</label>

<div class="form-group form-row">
    <div class="col-4">
        <input class="form-control" name="payu_card" type="text" id="cardNumber" placeholder="Card Number">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" name="payu_cvc" placeholder="CVC">
    </div>

    <div class="col-1">
        <input class="form-control" type="text" name="payu_month" placeholder="MM">
    </div>

    <div class="col-1">
        <input class="form-control" type="text" name="payu_year" placeholder="YY">
    </div>
    <div class="col-2">
        <select class="custom-select" name="payu_network">
            <option selected>Seleccionar</option>
            <option value="visa">VISA</option>
            <option value="amex">AMEX</option>
            <option value="master">MASTER</option>
            <option value="diners">DINERS</option>
            <option value="mastercard">MASTERCARD</option>
        </select>
    </div>
</div>



<div class="form-group form-row">
    <div class="col-2">
        <select class="custom-select" name="payu_installments">
            <option selected>Seleccionar</option>
            <option value="1">1 cuota</option>
            <option value="2">2 cuotas</option>
            <option value="3">3 cuotas</option>
            <option value="4">4 cuotas</option>
            <option value="5">5 cuotas</option>
            <option value="6">6 cuotas</option>
            <option value="7">7 cuotas</option>
            <option value="8">8 cuotas</option>
            <option value="9">9 cuotas</option>
            <option value="10">10 cuotas</option>
            <option value="11">11 cuotas</option>
            <option value="12">12 cuotas</option>

        </select>
    </div>
    <div class="col-5">
        <input class="form-control" type="text" name="payu_name"
         placeholder="Your Name">
    </div>
    <div class="col-5">
        <input class="form-control" type="email"name="payu_email"
         placeholder="email@example.com">
    </div>
</div>