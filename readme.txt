/************************
*** How to Use ***
************************/

1) Install this extension using Magento Connect.

2) Open "app/design/frontend/your theme package/default or your theme name/template/persistent/customer/form/register.phtml"

3) Put following code just after email.

	<div class="field mobile">
        <label for="mobile" class="required"><em>*</em>Mobile</label>
        <div class="input-box">
        <input type="text" id="mobile" name="mobile" value="" title="Mobile Number" maxlength="20" class="input-text required-entry">
        </div>
    	</div>

4) Now open app/design/frontend/your theme package/default or your theme name/template/persistent/customer/form/login.phtml

5) Comment the email html and put following code just after email html you commented.

	<li>
	<label for="mobile" class="required"><em>*</em>Mobile Number</label>
	<div class="input-box">
	<input type="text" name="login[username]" value="" id="mobile" class="input-text required-entry validate" title="Mobile Number">
	</div>
	</li>

6) Now register yourself and login by mobile number.