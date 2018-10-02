
function showtextbox()
{
	var select_pds=$('#strProfileType').val();
	//alert(select_report);
	if(select_pds == 'Profile')
	{
		$('#surname_textbox').show();
		$('#firstname_textbox').show();
		$('#midname_textbox').show();
		$('#extension_textbox').show();
		$('#bdate_textbox').show();
		$('#birthplace_textbox').show();
		$('#cs_textbox').show();
		$('#weight_textbox').show();
		$('#height_textbox').show();
		$('#blood_textbox').show();
		$('#gsis_textbox').show();
		$('#pagibig_textbox').show();
		$('#philhealth_textbox').show();
		$('#tin_textbox').show();
		$('#label1_textbox').show();
		$('#label2_textbox').show();
		$('#block1_textbox').show();
		$('#block2_textbox').show();
		$('#street1_textbox').show();
		$('#street2_textbox').show();
		$('#subd1_textbox').show();
		$('#subd2_textbox').show();
		$('#brgy1_textbox').show();
		$('#brgy2_textbox').show();
		$('#city1_textbox').show();
		$('#city2_textbox').show();
		$('#prov1_textbox').show();
		$('#prov2_textbox').show();
		$('#zip1_textbox').show();
		$('#zip2_textbox').show();
		$('#tel1_textbox').show();
		$('#tel2_textbox').show();
		$('#email_textbox').show();
		$('#cp_textbox').show();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

			// $('#print_button').show();
	}
	else if(select_pds == 'Family')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').show();
		$('#ssurname_textbox').show();
		$('#sfirstname_textbox').show();
		$('#smidname_textbox').show();
		$('#spouseExt_textbox').show();
		$('#occu_textbox').show();
		$('#busname_textbox').show();
		$('#busadd_textbox').show();
		$('#tel_textbox').show();
		$('#father_textbox').show();
		$('#fsurname_textbox').show();
		$('#ffirstname_textbox').show();
		$('#fmidname_textbox').show();
		$('#fextension_textbox').show();
		$('#mother_textbox').show();
		$('#msurname_textbox').show();
		$('#mfirstname_textbox').show();
		$('#mmidname_textbox').show();
		$('#paddress_textbox').show();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	else if(select_pds == 'Educational')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').show();
		$('#submit').show();
	}

	else if(select_pds == 'Trainings')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();
	}
	else if(select_pds == 'Examinations')
	{
		// profile
		$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	else if(select_pds == 'Children')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').show();
		$('#childbdate_textbox').show();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	else if(select_pds == 'Community')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();
	}
	else if(select_pds == 'References')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	else if(select_pds == 'Voluntary')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();	
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	else if(select_pds == 'WorkExp')
	{
		// profile
	 	$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();
	}
	
	else 
	{
		// profile
		$('#surname_textbox').hide();
		$('#firstname_textbox').hide();
		$('#midname_textbox').hide();
		$('#extension_textbox').hide();
		$('#bdate_textbox').hide();
		$('#birthplace_textbox').hide();
		$('#cs_textbox').hide();
		$('#weight_textbox').hide();
		$('#height_textbox').hide();
		$('#blood_textbox').hide();
		$('#gsis_textbox').hide();
		$('#pagibig_textbox').hide();
		$('#philhealth_textbox').hide();
		$('#tin_textbox').hide();
		$('#label1_textbox').hide();
		$('#label2_textbox').hide();
		$('#block1_textbox').hide();
		$('#block2_textbox').hide();
		$('#street1_textbox').hide();
		$('#street2_textbox').hide();
		$('#subd1_textbox').hide();
		$('#subd2_textbox').hide();
		$('#brgy1_textbox').hide();
		$('#brgy2_textbox').hide();
		$('#city1_textbox').hide();
		$('#city2_textbox').hide();
		$('#prov1_textbox').hide();
		$('#prov2_textbox').hide();
		$('#zip1_textbox').hide();
		$('#zip2_textbox').hide();
		$('#tel1_textbox').hide();
		$('#tel2_textbox').hide();
		$('#email_textbox').hide();
		$('#cp_textbox').hide();
		// Family
		$('#spouse_textbox').hide();
		$('#ssurname_textbox').hide();
		$('#sfirstname_textbox').hide();
		$('#smidname_textbox').hide();
		$('#spouseExt_textbox').hide();
		$('#occu_textbox').hide();
		$('#busname_textbox').hide();
		$('#busadd_textbox').hide();
		$('#tel_textbox').hide();
		$('#father_textbox').hide();
		$('#fsurname_textbox').hide();
		$('#ffirstname_textbox').hide();
		$('#fmidname_textbox').hide();
		$('#fextension_textbox').hide();
		$('#mother_textbox').hide();
		$('#msurname_textbox').hide();
		$('#mfirstname_textbox').hide();
		$('#mmidname_textbox').hide();
		$('#paddress_textbox').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		//Educational
		$('#tab_education').hide();
		$('#submit').show();

	}
	
}

$(document).ready(function() 
{ 
	// profile
	$('#surname_textbox').hide();
	$('#firstname_textbox').hide();
	$('#midname_textbox').hide();
	$('#extension_textbox').hide();
	$('#bdate_textbox').hide();
	$('#birthplace_textbox').hide();
	$('#cs_textbox').hide();
	$('#weight_textbox').hide();
	$('#height_textbox').hide();
	$('#blood_textbox').hide();
	$('#gsis_textbox').hide();
	$('#pagibig_textbox').hide();
	$('#philhealth_textbox').hide();
	$('#tin_textbox').hide();
	$('#label1_textbox').hide();
	$('#label2_textbox').hide();
	$('#block1_textbox').hide();
	$('#block2_textbox').hide();
	$('#street1_textbox').hide();
	$('#street2_textbox').hide();
	$('#subd1_textbox').hide();
	$('#subd2_textbox').hide();
	$('#brgy1_textbox').hide();
	$('#brgy2_textbox').hide();
	$('#city1_textbox').hide();
	$('#city2_textbox').hide();
	$('#prov1_textbox').hide();
	$('#prov2_textbox').hide();
	$('#zip1_textbox').hide();
	$('#zip2_textbox').hide();
	$('#tel1_textbox').hide();
	$('#tel2_textbox').hide();
	$('#email_textbox').hide();
	$('#cp_textbox').hide();
	// Family
	$('#spouse_textbox').hide();
	$('#ssurname_textbox').hide();
	$('#sfirstname_textbox').hide();
	$('#smidname_textbox').hide();
	$('#spouseExt_textbox').hide();
	$('#occu_textbox').hide();
	$('#busname_textbox').hide();
	$('#busadd_textbox').hide();
	$('#tel_textbox').hide();
	$('#father_textbox').hide();
	$('#fsurname_textbox').hide();
	$('#ffirstname_textbox').hide();
	$('#fmidname_textbox').hide();
	$('#fextension_textbox').hide();
	$('#mother_textbox').hide();
	$('#msurname_textbox').hide();
	$('#mfirstname_textbox').hide();
	$('#mmidname_textbox').hide();
	$('#paddress_textbox').hide();
	// Children
	$('#childname_textbox').hide();
	$('#childbdate_textbox').hide();
	//Educational
	$('#tab_education').hide();
	$('#submit').show();
	

	// $('#printreport').click(function(){
	// 	var leave=$('#strLeavetype').val();
		
	// 	var person=$('#strperson').val();
	// 	var year=$('#txtYear').val();
	// 	var agency=$('#stragency').val();
	// 	var quarter=$('#intQuarter').val();
	// 	var sponsor=$('#strSponsor').val();
	// 	var valid = false;
	// 	if(leave=='reportperson' && person!='')
	// 		valid=true;
	// 	else
	// 		document.getElementById('errorPerson').innerHTML = "This field is required!";
	// 	if(leave=='reportagency' && agency!='')
	// 		valid=true;
	// 	else
	// 		document.getElementById('errorAgency').innerHTML = "This field is required!";
	// 	if(leave=='forced' || leave=='special' || leave=='sick' || leave=='vacation' ||  leave=='maternity' ||  leave=='paternity' || leave=='study' )
	// 		valid=true;
	// 	if(valid)
	// 		window.open("reports/generate?leave="+leave+"&person="+person+"&year="+year+"&quarter="+quarter+"&agency="+agency,'_blank'); //ok
	
	// // window.open("reports/generate?rpt="+rpt+"&year="+year,'_blank');
	
	
	// });


});