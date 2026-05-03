<?php 
    include "header.php";
?>
<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class=" container ">
			<!--begin::Card-->
<div class="card card-custom card-sticky" id="kt_page_sticky_card">
	
	<div class="card-body">
		<!--begin::Form-->
		<form class="form" id="kt_form">
			<div class="row">
				<div class="col-xl-2"></div>
				<div class="col-xl-8">
					<div class="my-5">
                        <form method="POST" action="update_account">
						<h3 class=" text-dark font-weight-bold mb-10">Customer Info:</h3>
						<div class="form-group row">
							<label class="col-3">Fullname</label>
							<div class="col-9">
								<input class="form-control" name="fullname" type="text" value="<?php echo $first_name;?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Email Address</label>
							<div class="col-9">
								<input class="form-control" disabled type="text" value="<?php echo $email?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-3">Phone No.</label>
							<div class="col-9">
                                <input type="text" class="form-control" name="phone" value="<?php echo $phone?>" placeholder="Phone">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-3">Country</label>
							<div class="col-9">
                                <select class="form-control" name="country">
									<option id="AF">Afghanistan</option>
									<option id="AX">Åland Islands</option>
									<option id="AL">Albania</option>
									<option id="DZ">Algeria</option>
									<option id="AS">American Samoa</option>
									<option id="AD">Andorra</option>
									<option id="AO">Angola</option>
									<option id="AI">Anguilla</option>
									<option id="AQ">Antarctica</option>
									<option id="AG">Antigua and Barbuda</option>
									<option id="AR">Argentina</option>
									<option id="AM">Armenia</option>
									<option id="AW">Aruba</option>
									<option id="AU">Australia</option>
									<option id="AT">Austria</option>
									<option id="AZ">Azerbaijan</option>
									<option id="BS">Bahamas</option>
									<option id="BH">Bahrain</option>
									<option id="BD">Bangladesh</option>
									<option id="BB">Barbados</option>
									<option id="BY">Belarus</option>
									<option id="BE">Belgium</option>
									<option id="BZ">Belize</option>
									<option id="BJ">Benin</option>
									<option id="BM">Bermuda</option>
									<option id="BT">Bhutan</option>
									<option id="BO">Bolivia, Plurinational State of</option>
									<option id="BQ">Bonaire, Sint Eustatius and Saba</option>
									<option id="BA">Bosnia and Herzegovina</option>
									<option id="BW">Botswana</option>
									<option id="BV">Bouvet Island</option>
									<option id="BR">Brazil</option>
									<option id="IO">British Indian Ocean Territory</option>
									<option id="BN">Brunei Darussalam</option>
									<option id="BG">Bulgaria</option>
									<option id="BF">Burkina Faso</option>
									<option id="BI">Burundi</option>
									<option id="KH">Cambodia</option>
									<option id="CM">Cameroon</option>
									<option id="CA">Canada</option>
									<option id="CV">Cape Verde</option>
									<option id="KY">Cayman Islands</option>
									<option id="CF">Central African Republic</option>
									<option id="TD">Chad</option>
									<option id="CL">Chile</option>
									<option id="CN">China</option>
									<option id="CX">Christmas Island</option>
									<option id="CC">Cocos (Keeling) Islands</option>
									<option id="CO">Colombia</option>
									<option id="KM">Comoros</option>
									<option id="CG">Congo</option>
									<option id="CD">Congo, the Democratic Republic of the</option>
									<option id="CK">Cook Islands</option>
									<option id="CR">Costa Rica</option>
									<option id="CI">Côte d'Ivoire</option>
									<option id="HR">Croatia</option>
									<option id="CU">Cuba</option>
									<option id="CW">Curaçao</option>
									<option id="CY">Cyprus</option>
									<option id="CZ">Czech Republic</option>
									<option id="DK">Denmark</option>
									<option id="DJ">Djibouti</option>
									<option id="DM">Dominica</option>
									<option id="DO">Dominican Republic</option>
									<option id="EC">Ecuador</option>
									<option id="EG">Egypt</option>
									<option id="SV">El Salvador</option>
									<option id="GQ">Equatorial Guinea</option>
									<option id="ER">Eritrea</option>
									<option id="EE">Estonia</option>
									<option id="ET">Ethiopia</option>
									<option id="FK">Falkland Islands (Malvinas)</option>
									<option id="FO">Faroe Islands</option>
									<option id="FJ">Fiji</option>
									<option id="FI">Finland</option>
									<option id="FR">France</option>
									<option id="GF">French Guiana</option>
									<option id="PF">French Polynesia</option>
									<option id="TF">French Southern Territories</option>
									<option id="GA">Gabon</option>
									<option id="GM">Gambia</option>
									<option id="GE">Georgia</option>
									<option id="DE">Germany</option>
									<option id="GH">Ghana</option>
									<option id="GI">Gibraltar</option>
									<option id="GR">Greece</option>
									<option id="GL">Greenland</option>
									<option id="GD">Grenada</option>
									<option id="GP">Guadeloupe</option>
									<option id="GU">Guam</option>
									<option id="GT">Guatemala</option>
									<option id="GG">Guernsey</option>
									<option id="GN">Guinea</option>
									<option id="GW">Guinea-Bissau</option>
									<option id="GY">Guyana</option>
									<option id="HT">Haiti</option>
									<option id="HM">Heard Island and McDonald Islands</option>
									<option id="VA">Holy See (Vatican City State)</option>
									<option id="HN">Honduras</option>
									<option id="HK">Hong Kong</option>
									<optiKon id="HU">Hungary</option>
									<option id="IS">Iceland</option>
									<option id="IN">India</option>
									<option id="ID">Indonesia</option>
									<option id="IR">Iran, Islamic Republic of</option>
									<option id="IQ">Iraq</option>
									<option id="IE">Ireland</option>
									<option id="IM">Isle of Man</option>
									<option id="IL">Israel</option>
									<option id="IT">Italy</option>
									<option id="JM">Jamaica</option>
									<option id="JP">Japan</option>
									<option id="JE">Jersey</option>
									<option id="JO">Jordan</option>
									<option id="KZ">Kazakhstan</option>
									<option id="KE">Kenya</option>
									<option id="KI">Kiribati</option>
									<option id="KP">Korea, Democratic People's Republic of</option>
									<option id="KR">Korea, Republic of</option>
									<option id="KW">Kuwait</option>
									<option id="KG">Kyrgyzstan</option>
									<option id="LA">Lao People's Democratic Republic</option>
									<option id="LV">Latvia</option>
									<option id="LB">Lebanon</option>
									<option id="LS">Lesotho</option>
									<option id="LR">Liberia</option>
									<option id="LY">Libya</option>
									<option id="LI">Liechtenstein</option>
									<option id="LT">Lithuania</option>
									<option id="LU">Luxembourg</option>
									<option id="MO">Macao</option>
									<option id="MK">Macedonia, the former Yugoslav Republic of</option>
									<option id="MG">Madagascar</option>
									<option id="MW">Malawi</option>
									<option id="MY">Malaysia</option>
									<option id="MV">Maldives</option>
									<option id="ML">Mali</option>
									<option id="MT">Malta</option>
									<option id="MH">Marshall Islands</option>
									<option id="MQ">Martinique</option>
									<option id="MR">Mauritania</option>
									<option id="MU">Mauritius</option>
									<option id="YT">Mayotte</option>
									<option id="MX">Mexico</option>
									<option id="FM">Micronesia, Federated States of</option>
									<option id="MD">Moldova, Republic of</option>
									<option id="MC">Monaco</option>
									<option id="MN">Mongolia</option>
									<option id="ME">Montenegro</option>
									<option id="MS">Montserrat</option>
									<option id="MA">Morocco</option>
									<option id="MZ">Mozambique</option>
									<option id="MM">Myanmar</option>
									<option id="NA">Namibia</option>
									<option id="NR">Nauru</option>
									<option id="NP">Nepal</option>
									<option id="NL">Netherlands</option>
									<option id="NC">New Caledonia</option>
									<option id="NZ">New Zealand</option>
									<option id="NI">Nicaragua</option>
									<option id="NE">Niger</option>
									<option id="NG">Nigeria</option>
									<option id="NU">Niue</option>
									<option id="NF">Norfolk Island</option>
									<option id="MP">Northern Mariana Islands</option>
									<option id="NO">Norway</option>
									<option id="OM">Oman</option>
									<option id="PK">Pakistan</option>
									<option id="PW">Palau</option>
									<option id="PS">Palestinian Territory, Occupied</option>
									<option id="PA">Panama</option>
									<option id="PG">Papua New Guinea</option>
									<option id="PY">Paraguay</option>
									<option id="PE">Peru</option>
									<option id="PH">Philippines</option>
									<option id="PN">Pitcairn</option>
									<option id="PL">Poland</option>
									<option id="PT">Portugal</option>
									<option id="PR">Puerto Rico</option>
									<option id="QA">Qatar</option>
									<option id="RE">Réunion</option>
									<option id="RO">Romania</option>
									<option id="RU">Russian Federation</option>
									<option id="RW">Rwanda</option>
									<option id="BL">Saint Barthélemy</option>
									<option id="SH">Saint Helena, Ascension and Tristan da Cunha</option>
									<option id="KN">Saint Kitts and Nevis</option>
									<option id="LC">Saint Lucia</option>
									<option id="MF">Saint Martin (French part)</option>
									<option id="PM">Saint Pierre and Miquelon</option>
									<option id="VC">Saint Vincent and the Grenadines</option>
									<option id="WS">Samoa</option>
									<option id="SM">San Marino</option>
									<option id="ST">Sao Tome and Principe</option>
									<option id="SA">Saudi Arabia</option>
									<option id="SN">Senegal</option>
									<option id="RS">Serbia</option>
									<option id="SC">Seychelles</option>
									<option id="SL">Sierra Leone</option>
									<option id="SG">Singapore</option>
									<option id="SX">Sint Maarten (Dutch part)</option>
									<option id="SK">Slovakia</option>
									<option id="SI">Slovenia</option>
									<option id="SB">Solomon Islands</option>
									<option id="SO">Somalia</option>
									<option id="ZA">South Africa</option>
									<option id="GS">South Georgia and the South Sandwich Islands</option>
									<option id="SS">South Sudan</option>
									<option id="ES">Spain</option>
									<option id="LK">Sri Lanka</option>
									<option id="SD">Sudan</option>
									<option id="SR">Suriname</option>
									<option id="SJ">Svalbard and Jan Mayen</option>
									<option id="SZ">Swaziland</option>
									<option id="SE">Sweden</option>
									<option id="CH">Switzerland</option>
									<option id="SY">Syrian Arab Republic</option>
									<option id="TW">Taiwan, Province of China</option>
									<option id="TJ">Tajikistan</option>
									<option id="TZ">Tanzania, United Republic of</option>
									<option id="TH">Thailand</option>
									<option id="TL">Timor-Leste</option>
									<option id="TG">Togo</option>
									<option id="TK">Tokelau</option>
									<option id="TO">Tonga</option>
									<option id="TT">Trinidad and Tobago</option>
									<option id="TN">Tunisia</option>
									<option id="TR">Turkey</option>
									<option id="TM">Turkmenistan</option>
									<option id="TC">Turks and Caicos Islands</option>
									<option id="TV">Tuvalu</option>
									<option id="UG">Uganda</option>
									<option id="UA">Ukraine</option>
									<option id="AE">United Arab Emirates</option>
									<option id="GB">Netherland</option>
									<option id="US" selected="">United States</option>
									<option id="UM">United States Minor Outlying Islands</option>
									<option id="UY">Uruguay</option>
									<option id="UZ">Uzbekistan</option>
									<option id="VU">Vanuatu</option>
									<option id="VE">Venezuela, Bolivarian Republic of</option>
									<option id="VN">Viet Nam</option>
									<option id="VG">Virgin Islands, British</option>
									<option id="VI">Virgin Islands, U.S.</option>
									<option id="WF">Wallis and Futuna</option>
									<option id="EH">Western Sahara</option>
									<option id="YE">Yemen</option>
									<option id="ZM">Zambia</option>
									<option id="ZW">Zimbabwe</option>
								</select>
							</div>
						</div>

                        <div class="form-group row">
							<label class="col-3">Upline</label>
							<div class="col-9">
								<input class="form-control" name="" type="text" disabled value="<?php echo $whos_name;?>">
							</div>
						</div>
                        <div class="form-group row mt-10">
							<label class="col-3"></label>
							<div class="col-9">
								<button type="submit" class="btn btn-light-danger font-weight-bold btn-sm">Save</button>
							</div>
						</div>
					</div>
                    </form>
                    <form method="POST" action="update_account">
                        <div class="separator separator-dashed my-10"></div>
                        
                        <div class="separator separator-dashed my-10"></div>
                        
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-52">
                            <h3 class=" text-dark font-weight-bold mb-10">Security:</h3>
                            <div class="form-group row">
                                <label class="col-3">Old Password</label>
                                <div class="col-9">
                                    <input class="form-control" name="old_password" type="password" value="" placeholder="Old Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">New Password</label>
                                <div class="col-9">
                                    <input class="form-control" name="new_password" type="password" value="" placeholder="New Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Confirm new password</label>
                                <div class="col-9">
                                    <input class="form-control" name="cnew_password" type="password" value="" placeholder="Confirm new password">
                                </div>
                            </div>
                            
                            <div class="form-group row mt-10">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <button type="submit" class="btn btn-light-danger font-weight-bold btn-sm">Change Password</button>
                                </div>
                            </div>
                        </form>
                    <form method="POST" action="kyc" enctype="multipart/form-data">
                        <div class="separator separator-dashed my-10"></div>
                        
                        <div class="separator separator-dashed my-10"></div>
                        
                        <div class="separator separator-dashed my-10"></div>
                        <div class="my-52">
                            <h3 class=" text-dark font-weight-bold mb-10">KYC:</h3>
                            <div class="form-group row">
                                <label class="col-3">KYC Status</label>
                                <div class="col-9">
                                    
                                        <?php 
                                            if($kyc_docs == ""){echo "<p>You have not applied for KYC yet.</p>";}
                                            if($kyc_docs !== "" && $kyc_status == "pending"){echo "<p>Your Documents are being verified, please check back later.</p>";}
                                            else{echo "<p>$kyc_status</p>";}
                                        ?>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Select Document Type</label>
                                <div class="col-9">
                                    <select class="form-control" name="doc_type">
                                        <?php 
                                            if($kyc_status == "pending" || $kyc_status == "Approved"){
                                                echo "<option>$doc_type</option>";
                                            }else{
                                                echo"
                                                    <option>International Passport</option>
                                                    <option>Drivers License</option>
                                                    <option>National ID</option>";
                                                }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Verification Documents</label>
                                <div class="col-9">
                                    <iframe type="image" src="<?php echo $kyc_docs?>" style="border-color:white;" height="150px" width="180px"></iframe>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Upload Documents</label>
                                <div class="col-9">
                                    <input class="form-control" name="img" type="<?php 
                                        if($kyc_status == 'Approved'){
                                            echo 'hidden';
                                        }else{
                                            echo 'file';
                                        }?>" 
                                        accept="image/*">
                                </div>
                            </div>
                            
                            <div class="form-group row mt-10">
                                <label class="col-3"></label>
                                <div class="col-9">
                                    <button type="submit" name="kyc" class="btn btn-light-danger font-weight-bold btn-sm" <?php if($kyc_status == "pending" OR $kyc_status == "Approved" ){echo "disabled";} ?>>
                                        Upload
                                    </button>
                                </div>
                            </div>
                        </form>
					</div>
				</div>
				<div class="col-xl-2"></div>
			</div>
		</form>
		<!--end::Form-->
	</div>
</div>
<!--end::Card-->
<script src="theme/html/demo1/dist/assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/scripts.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/js/pages/widgets7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/crud/forms/validation/form-widgets7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/custom/datatables/datatables.bundle7b4a.js?v=7.1.0"></script>
		
		<script src="theme/html/demo1/dist/assets/js/pages/crud/datatables/data-sources/html7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/crud/forms/widgets/bootstrap-datepicker7b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/js/pages/custom/wizard/wizard-37b4a.js?v=7.1.0"></script>
		<script src="theme/html/demo1/dist/assets/plugins/global/plugins.bundle7b4a.js?v=7.1.0"></script>