if(typeof js_dir === 'undefined') {var js_dir = 'js/';}
if(typeof img_dir === 'undefined') {var img_dir = 'img/';}
if(typeof css_dir === 'undefined') {var css_dir = 'css/';}
function include(c,d){
	var b=document.getElementsByTagName("head")[0];
	var a=document.createElement("script");
	a.type="text/javascript";
	a.src=c;
	a.onload=a.onreadystatechange=function(){if(d){d()}b.removeChild(a);
	a.onload=null};
	b.appendChild(a)
	}
	if(typeof jQuery==="undefined"){
			include("../js/jquery.min.js",runScript)
	}else{
		runScript()
	};
function runScript() {
	"use strict";
	$('html').addClass('jsenabled');
	$.ajaxSetup({cache: true});
	$(document).ready(function($){
		$('#r_due').on('focus', function(){
			$('.dueDateNot').show();
		});
		$('form').on('change','#noAlter',function(){
			if($(this).is(':checked')){
				$('input[name="r_no_altering"]').val('true');
			}else {
				$('input[name="r_no_altering"]').val('false');
			}
		});
		$('form').on('blur','#national_budget', function(){
			var val = +$(this).val().replace(/,/g,'');
			if( val < 15000){
				$('.nationalBudget #enhanced_budget').hide();
				$('.nationalBudget #standard_budget').hide();
				$('.nationalBudget').hide();
				$(this).val('').attr('placeholder','Minimum budget is $15,000');
			}else if (15000 <= val && val < 50000){
				$('.nationalBudget').show();
				$('.nationalBudget #standard_budget').show();
				$('.nationalBudget #enhanced_budget').hide();
			}else {
				$('.nationalBudget').show();
				$('.nationalBudget #enhanced_budget').show();
				$('.nationalBudget #standard_budget').hide();
			}
		});
		$('form').on('click', 'input[name="r_psize[]"]', function(){
			var val = $(this).val().toLowerCase();
			$('.sizes').hide();
			$('.'+val).show();
		});
		$('form').on('change','input[name="fb_option"]', function(){
			if($(this).val() === 'mockup'){
				$('#facebook .mockup').show();
				$('#facebook .design').hide();
                $('.complex').hide();
                $('.complex_mockup').show();
			}else if($(this).val() === 'design'){
				$('#facebook .mockup').hide();
				$('#facebook .design').show();
                $('.complex').show();
                $('.complex_mockup').hide();
			}else {
				$('#facebook .mockup').hide();
				$('#facebook .design').hide();
			}

		});
  });
	$(function() {
		var main = $('#main');
		$('a[rel=external]')
			.attr('title','opens in new window or tab')
			.click(function(e) {
				window.open($(this).attr('href'));
				e.preventDefault();
			});
		if($('form', main).length) {
			var quickInp = $('input[name=r_quickedit]', main);
			var budgetInp = $('input[name=r_budget]', main);
			var optionInp = $('input[name*=r_option]', main);
			if($('input[name=r_due]',main).length) {
				$.getScript(js_dir+'jquery-ui-1.10.3.custom.min.js', function() {
					var headID = document.getElementsByTagName("head")[0];
					var cssNode = document.createElement('link');
					cssNode.type = 'text/css';
					cssNode.rel = 'stylesheet';
					cssNode.href = css_dir+'ui/jquery-ui-1.10.3.custom.min.css';
					cssNode.media = 'screen';
					headID.appendChild(cssNode);
					$('input[name=r_due], #r_confdate', main).datepicker();
				});
			}
			$.getScript(js_dir+'jquery.validate.min.js', function() {
				var quickFn = function() {return quickInp.filter(':checked').val() === 'no';};
				var landingFn = function() {return optionInp.filter(':checked').val() === 'landing';};
				var confFn = function(el) {return $(el).parent().prev().children('input:checked');};

                var fileInp = $('<div>', {'class': 'file_inp'})
					.append($('<input>', {
						type: 'file',
						name: 'r_file[]',
						on: {
							focus: function() {
								$(this).click();
							},
							change: function() {
								$(this)
									.blur()
									.siblings('input:text').val($(this).val().replace('C:\\fakepath\\',''));
							}
						}
					}))
					.append($('<input>', {type: 'text'}))
					.append($('<button>', {text: 'Browse'}));
                var add_more = $('<a>', {
                    'class': 'add_more',
                    text: 'Add more files',
                    click: function() {
                        var newFile = fileInp.clone(true).find('input').val('').end().hide().fadeIn();
                        $(this).before(newFile);
                    }

                });
                $('form').on('change',function(){
                    $(this).find('.file_inp').after(add_more);
                });

				$('form', main)
					.find('input[type=file][id]')
						.siblings('input[type=file]')
							.remove()
						.end()
						.after()
						.replaceWith(fileInp)
					.end()
					.find('#i_type, #quick')
						.append($('<img>', {src: img_dir+'loading.gif', 'class': 'loading'}).hide())
						.find('input[name=b_update]')
							.on('click', function() {
								var b_update = $(this);
								b_update.closest('form').one('submit', function(e) {
									e.preventDefault();
									var el = $(this);
									var url = el.attr('action');
									var inpVal = b_update.siblings().find(':radio:checked').val().toLowerCase();
									inpVal = inpVal.split(' ').join('_');
									var sending = $.post(url, {
										r_igtype: inpVal,
										r_campaign: inpVal,
										b_update: 'Update'
									});
									if(b_update.closest('#i_type').length) {
										el
											.children('fieldset')
												.children('.file,.additional').remove().end()
											.end()
											.find('#i_type')
												.children('fieldset').remove().end()
												.children('.loading').fadeIn();
										sending.done(function(data) {
											var d = $(data);
											var submitBtn = d.find('#main > form > .submit');
											$('#i_type').children('.loading').hide();
											if(inpVal === 'other') {
												d.find('#main > form > fieldset > .file')
													.appendTo(el.children('fieldset'))
													.append()
														.children('input[type=file][id]')
															.siblings('input[type=file]')
																.remove()
															.end()
															.replaceWith(fileInp)
														.end()
														.hide().fadeIn()
												d.find('#main > form > fieldset > .additional').appendTo(el.children('fieldset')).hide().fadeIn();
											} // end if(inpVal === 'other')
											else {
												var result = d.find('#'+inpVal);
												$('#i_type')
													.append(result)
														.children('fieldset').hide().fadeIn()
														.find('.boards:not(.other) > div:not([class])').each(function() {
															var el = $(this);
															var labelText = el.children('label').text();
															el.append(

															);
														});
											}// end else
											if(!el.children('.submit').length) {
												submitBtn.appendTo(el);
											}
										}); // end sending.done()
									} // end if #i_type.length
									// client creative form – quick edit section
									if(b_update.closest('#quick').length) {
										var quick = b_update.closest('#quick');
										quick
											.find('.section.container').remove().end()
											.children('.loading').fadeIn();
										sending.done(function(data) {
											var d = $(data);
											var result = d.find('#quick .section.container');
											$('#quick > fieldset')
												.append(result)
												.children('.section.container').hide().fadeIn();
											quick
												.children('.loading').hide().end()
												.find('input[name=r_budget]')
													.filter(':checked')
														.parent()
															.siblings('.explanation').show()
																.children('#'+budgetInp.filter(':checked').val()+'_budget').show().end()
															.end()
														.end() // parent()
													.end() // filter(':checked')
													.on('change', function() {
														var el = $(this);
														var elVal = el.val();
														el.parent().siblings('.explanation').fadeIn()
															.children('#'+elVal+'_budget').show()
															.siblings('div[id$="budget"]').hide();
													}) // end on()
												.end() // find('input[name=r_budget]')
												.find('.sizes > ul > li > label input')
													.on('change', function() {
														var el = $(this);
														if(el.is(':checked')) {
															el.parent().siblings().fadeIn();
														}
														else {
															el.parent().siblings().hide();
														}
													});

										}); // end sending.done()
									} // end if #quick.length
								}); // end form.one('submit')
							}) // end .on('click')
						.end() // end .find('input[name=b_update]')
						.find('input[name=r_igtype], input[name=r_campaign]')
							.change(function() {
								$(this).parent().siblings('[name=b_update]').trigger('click');
                                setTimeout(
                                function(){$('.section.file').find('.file_inp').after(add_more)}, 100);
							})
						.end()
					.end() // end .find('#i_type')
					.validate({
						//debug: true,
						messages: {
							r_quickedit: 'This selection is required.',
							r_campaign: 'This selection is required.',
							r_budget: 'This selection is required.',
							r_option: 'This selection is required.',
							'r_csize[]': 'At least one selection is required.',
							'r_achieved[]': 'These fields are required.'
						},
						errorPlacement: function(error,element) {
							if(element.attr('type') === 'radio' || element.attr('type') === 'checkbox') {
								if(element.attr('name') === 'r_quickedit' || element.attr('name') === 'r_option') {
									error.appendTo(element.closest('div').prev().children('span'));
								}
								else if(element.attr('name') === 'r_psize[]'){
									error.appendTo(element.closest('div').children('legend'));
								}
								else if(element.attr('name') === 'r_sizes[]' && element.closest('div').closest('div').children('input[name="r_psize[]"]:checked')){
									error.appendTo(element.closest('div'));
								}
								else {
									error.appendTo(element.closest('div').children('span').children('span'));
								}
							}
							else if(element.attr('name') === 'r_achieved[]') {
								error.appendTo(element.closest('div'));
							}
							else {
								error.insertAfter(element);
							}
						},
						rules: {
							r_campaign: {
								required: {depends: quickFn}
							},
							r_budget: {
								required: {depends: quickFn}
							},
							'r_csize[]': {
								required: {depends: quickFn}
							},
							lp_title: {
								required: {depends: landingFn}
							},
							lp_purpose: {
								required: {depends: landingFn}
							},
							lp_url: {
								required: {depends: landingFn}
							},
							q_gum: {
								required: {depends: confFn}
							},
							q_wipes: {
								required: {depends: confFn}
							},
							q_tablecloth: {
								required: {depends: confFn}
							},
							q_banner: {
								required: {depends: confFn}
							},
							q_shirts: {
								required: {depends: confFn}
							},
							q_keycards: {
								required: {depends: confFn}
							},
							r_invite: {
								required: {depends: confFn}
							},
							r_print_format: {
								required: {
									depends: function(element) {
										return $(element).parent().parent().parent().prev().children(':checked');
									}
								}
							},
							r_print_size: {
								required: {
									depends: function(element) {
										return $(element).parent().parent().parent().prev().children(':checked');
									}
								}
							},
							r_print_quantity: {
								required: {
									depends: function(element) {
										return $(element).parent().parent().parent().prev().children(':checked');
									}
								}
							}
						},
						groups: {
							achieved: 'r_achieved[]'
						}
					});
			});
			quickInp.change(function() {
				var el = $(this);
				if(el.val() === 'no') {
					$('.quickEdit').fadeOut();
					$('.selectCampaign').fadeIn();
					$('.simple').fadeOut();
					$('.complex').fadeIn();
				}else {
					$('.selectCampaign').fadeOut();
					$('.quickEdit').fadeIn();
					$('.simple').fadeIn();
					$('.complex').fadeOut();
				}
			});
			if(quickInp.filter(':checked').val() === 'no') {
				quickInp.closest('div').next().show();
			}

			optionInp.change(function() {
				var el = $(this);
				var inpVal = el.val().toLowerCase();
				inpVal = inpVal.split(' ').join('_');
				if(inpVal === 'landing') {
					el.closest('fieldset')
						.children('fieldset').fadeIn().end()
						.siblings('.section.file')
							.hide();
				}
				else {
					if(inpVal === 'boarding_pass') {
						if(el.is(':checked')) {
							el.closest('fieldset').siblings('#boarding_pass').fadeIn();
						}
						else {
							el.closest('fieldset').siblings('#boarding_pass').hide();
						}
					}
					else {
						el.filter(':radio').closest('fieldset')
							.children('fieldset').hide().end()
							.siblings('.section.file').fadeIn().end()
							.siblings('#boarding_pass:visible').hide();
					}
				}
			});
			if(optionInp.filter(':checked').val() === 'landing') {
				optionInp.closest('fieldset')
					.children('fieldset').show().end()
					.siblings('.section.file').hide();
			}
			var confInp = $('input[name="r_confmaterials[]"]', main);
			confInp
				.change(function() {
					var el = $(this);
					if(el.is(':checked')) {
						el.parent().next().fadeIn();
					}
					else {
						el.parent().next().hide();
					}
				})
				.filter(':checked')
					.parent()
						.next()
							.show();
		} // end if $(form).length
		// new functions before this comment
	});

}
