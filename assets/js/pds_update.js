
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
		$('#submitProfile').show();
		// $('#submit').show();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();			
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').show();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
				// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();		
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').show();
		$('#schoolname_textbox ').show();
		$('#degree_textbox').show();
		$('#frmyr_textbox').show();
		$('#yrto_textbox').show();
		$('#units_textbox').show();
		$('#scholarship_textbox').show();
		$('#honors_textbox').show();
		$('#licensed_textbox').show();
		$('#graduated_textbox').show();
		$('#yrgraduated_textbox').show();
		$('#tab_education').show();
		$('#submitEduc').show();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide()
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_exam').hide();
		$('#tab_training').show();
		$('#traintitle_textbox').show();
		$('#startdate_textbox').show();
		$('#enddate_textbox').show();
		$('#number_textbox').show();
		$('#typeLD_textbox').show();
		$('#conduct_textbox').show();
		$('#venue_textbox').show();
		$('#cost_textbox').show();
		$('#contract_textbox').show();
		$('#submitTraining').show();
		// Examination
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').show();
		$('#examdesc_textbox').show();
		$('#rating_textbox').show();
		$('#examdate_textbox').show();
		$('#examplace_textbox').show();
		$('#licenseNo_textbox').show();
		$('#release_textbox').show();
		$('#submitExam').show();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').show();
		$('#childbdate_textbox').show();
		$('#submitChild').show();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').show();
		$('#issuedAt_textbox').show();
		$('#issuedOn_textbox').show();
		$('#submitTax').show();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
		
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').show();
		$('#refname_textbox').show();
		$('#refadd_textbox').show();
		$('#refcontact_textbox').show();
		$('#submitRef').show();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').show();
		$('#volname_textbox').show();
		$('#voladd_textbox').show();
		$('#voldatefrom_textbox').show();
		$('#voldateto_textbox').show();
		$('#volhours_textbox').show();
		$('#worknature_textbox').show();
		$('#submitVol').show();
		// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();
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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		$('#tab_exam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
			// Work Experience
		$('#tab_workExp').show();
		$('#expdatefrom_textbox').show();
		$('#expdateto_textbox').show();
		$('#exptitle_textbox').show();
		$('#expdept_textbox').show();
		$('#expsalary_textbox').show();
		$('#expper_textbox').show();
		$('#expcurrency_textbox').show();
		$('#expsg_textbox').show();
		$('#expstatus_textbox').show();
		$('#expgov_textbox').show();
		$('#expbranch_textbox').show();
		$('#expsepcause_textbox').show();
		$('#expsepdate_textbox').show();
		$('#expleave_textbox').show();
		$('#submitWorkExp').show();

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
		$('#submitProfile').hide();
		$('#submit').hide();
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
		$('#submitFam').hide();
		// Children
		$('#childname_textbox').hide();
		$('#childbdate_textbox').hide();
		$('#submitChild').hide();
		//Educational
		$('#educlevel_textbox ').hide();
		$('#schoolname_textbox ').hide();
		$('#degree_textbox').hide();
		$('#frmyr_textbox').hide();
		$('#yrto_textbox').hide();
		$('#units_textbox').hide();
		$('#scholarship_textbox').hide();
		$('#honors_textbox').hide();
		$('#licensed_textbox').hide();
		$('#graduated_textbox').hide();
		$('#yrgraduated_textbox').hide();
		$('#tab_education').hide();
		$('#submitEduc').hide();
		// Training
		$('#tab_training').hide();
		$('#traintitle_textbox').hide();
		$('#startdate_textbox').hide();
		$('#enddate_textbox').hide();
		$('#number_textbox').hide();
		$('#typeLD_textbox').hide();
		$('#conduct_textbox').hide();
		$('#venue_textbox').hide();
		$('#cost_textbox').hide();
		$('#contract_textbox').hide();
		$('#submitTraining').hide();
		// Examination
		$('#tab_exam').hide();
		$('#examdesc_textbox').hide();
		$('#rating_textbox').hide();
		$('#examdate_textbox').hide();
		$('#examplace_textbox').hide();
		$('#licenseNo_textbox').hide();
		$('#release_textbox').hide();
		$('#submitExam').hide();
		// Community
		$('#taxcert_textbox').hide();
		$('#issuedAt_textbox').hide();
		$('#issuedOn_textbox').hide();
		$('#submitTax').hide();
		// References
		$('#tab_ref').hide();
		$('#refname_textbox').hide();
		$('#refadd_textbox').hide();
		$('#refcontact_textbox').hide();
		$('#submitRef').hide();
		// Voluntary
		$('#tab_volWork').hide();
		$('#volname_textbox').hide();
		$('#voladd_textbox').hide();
		$('#voldatefrom_textbox').hide();
		$('#voldateto_textbox').hide();
		$('#volhours_textbox').hide();
		$('#worknature_textbox').hide();
		$('#submitVol').hide();
			// Work Experience
		$('#tab_workExp').hide();
		$('#expdatefrom_textbox').hide();
		$('#expdateto_textbox').hide();
		$('#exptitle_textbox').hide();
		$('#expdept_textbox').hide();
		$('#expsalary_textbox').hide();
		$('#expper_textbox').hide();
		$('#expcurrency_textbox').hide();
		$('#expsg_textbox').hide();
		$('#expstatus_textbox').hide();
		$('#expgov_textbox').hide();
		$('#expbranch_textbox').hide();
		$('#expsepcause_textbox').hide();
		$('#expsepdate_textbox').hide();
		$('#expleave_textbox').hide();
		$('#submitWorkExp').hide();

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
	$('#submitProfile').hide();
	$('#submit').hide();
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
	$('#submitFam').hide();
	// Children
	$('#childname_textbox').hide();
	$('#childbdate_textbox').hide();
	$('#submitChild').hide();
	//Educational
	$('#educlevel_textbox ').hide();
	$('#schoolname_textbox ').hide();
	$('#degree_textbox').hide();
	$('#frmyr_textbox').hide();
	$('#yrto_textbox').hide();
	$('#units_textbox').hide();
	$('#scholarship_textbox').hide();
	$('#honors_textbox').hide();
	$('#licensed_textbox').hide();
	$('#graduated_textbox').hide();
	$('#yrgraduated_textbox').hide();
	$('#tab_education').hide();
	$('#submitEduc').hide();
	// Training
	$('#tab_training').hide();
	$('#traintitle_textbox').hide();
	$('#startdate_textbox').hide();
	$('#enddate_textbox').hide();
	$('#number_textbox').hide();
	$('#typeLD_textbox').hide();
	$('#conduct_textbox').hide();
	$('#venue_textbox').hide();
	$('#cost_textbox').hide();
	$('#contract_textbox').hide();
	$('#submitTraining').hide();
	// Examination
	$('#tab_exam').hide();
	$('#examdesc_textbox').hide();
	$('#rating_textbox').hide();
	$('#examdate_textbox').hide();
	$('#examplace_textbox').hide();
	$('#licenseNo_textbox').hide();
	$('#release_textbox').hide();
	$('#submitExam').hide();
	// Community
	$('#taxcert_textbox').hide();
	$('#issuedAt_textbox').hide();
	$('#issuedOn_textbox').hide();
	$('#submitTax').hide();
	// References
	$('#tab_ref').hide();
	$('#refname_textbox').hide();
	$('#refadd_textbox').hide();
	$('#refcontact_textbox').hide();
	$('#submitRef').hide();
	// Voluntary
	$('#tab_volWork').hide();
	$('#volname_textbox').hide();
	$('#voladd_textbox').hide();
	$('#voldatefrom_textbox').hide();
	$('#voldateto_textbox').hide();
	$('#volhours_textbox').hide();
	$('#worknature_textbox').hide();
	$('#submitVol').hide();
	// Work Experience
	$('#tab_workExp').hide();
	$('#expdatefrom_textbox').hide();
	$('#expdateto_textbox').hide();
	$('#exptitle_textbox').hide();
	$('#expdept_textbox').hide();
	$('#expsalary_textbox').hide();
	$('#expper_textbox').hide();
	$('#expcurrency_textbox').hide();
	$('#expsg_textbox').hide();
	$('#expstatus_textbox').hide();
	$('#expgov_textbox').hide();
	$('#expbranch_textbox').hide();
	$('#expsepcause_textbox').hide();
	$('#expsepdate_textbox').hide();
	$('#expleave_textbox').hide();
	$('#submitWorkExp').hide();

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