var properties_fr = {
	CommonInvalidField: "Saisie invalide",
	CommonMandatoryField: "Saisie obligatoire",
	InvalidField: "{0} invalide",
	MinLengthConstraint: "(minimum {0} caractères)",
	MaxLengthConstraint: "(maximum {0} caractères)",
	UnknownZipCode: "Code postal introuvable.",
	IncorrectMail: "Votre email ne correspond à votre mot de passe",
	NoRightsOnClassified: "Vous ne disposez pas des droits nécessaires à la modification de cette annonce",
	UnknownConstraint: "{0} {1}",
	NoAtAllowed: "caractère '@' interdit.",
	NoMailAddress: "Aucune adresse mail n'est autorisée dans ce champ."
};

var enum_typeUpload = {
	Photos: "PHOTOS",
	Logo: "LOGO"
};

var partyJson = null;
var integrateClassifiedJson = null;
var global = {};
global.nbPicturesMax = 5;
global.pictures = [];
global.tips = {
	TitleHelper: null,
	DescriptionHelper: null
};
global.zipCodeSelected = false;
global.ENV = {};
global.ENV.dev = false;
global.sections = null;
global.submittedClassifiedId = null;
global.facebookUser = null;
global.phoneUpsellId = 6;
global.upsellsLoaded = false;
global.tauxTVA = 20;
global.usePayline = false;

!function (e) { "use strict"; e.fn.serializeJSON = function (n) { var r, a, t, i, s, u, l; return u = e.serializeJSON, l = u.optsWithDefaults(n), u.validateOptions(l), a = this.serializeArray(), u.readCheckboxUncheckedValues(a, this, l), r = {}, e.each(a, function (e, n) { t = u.splitInputNameIntoKeysArray(n.name), i = t.pop(), "skip" !== i && (s = u.parseValue(n.value, i, l), l.parseWithFunction && "_" === i && (s = l.parseWithFunction(s, n.name)), u.deepSet(r, t, s, l)) }), r }, e.serializeJSON = { defaultOptions: { parseNumbers: !1, parseBooleans: !1, parseNulls: !1, parseAll: !1, parseWithFunction: null, checkboxUncheckedValue: void 0, useIntKeysAsArrayIndex: !1 }, optsWithDefaults: function (n) { var r, a; return null == n && (n = {}), r = e.serializeJSON, a = r.optWithDefaults("parseAll", n), { parseNumbers: a || r.optWithDefaults("parseNumbers", n), parseBooleans: a || r.optWithDefaults("parseBooleans", n), parseNulls: a || r.optWithDefaults("parseNulls", n), parseWithFunction: r.optWithDefaults("parseWithFunction", n), checkboxUncheckedValue: r.optWithDefaults("checkboxUncheckedValue", n), useIntKeysAsArrayIndex: r.optWithDefaults("useIntKeysAsArrayIndex", n) } }, optWithDefaults: function (n, r) { return r[n] !== !1 && "" !== r[n] && (r[n] || e.serializeJSON.defaultOptions[n]) }, validateOptions: function (e) { var n, r; r = ["parseNumbers", "parseBooleans", "parseNulls", "parseAll", "parseWithFunction", "checkboxUncheckedValue", "useIntKeysAsArrayIndex"]; for (n in e) if (-1 === $.inArray(n, r)) throw new Error("serializeJSON ERROR: invalid option '" + n + "'. Please use one of " + r.join(",")) }, parseValue: function (n, r, a) { var t; return t = e.serializeJSON, "string" == r ? n : "number" == r || a.parseNumbers && t.isNumeric(n) ? Number(n) : "boolean" == r || a.parseBooleans && ("true" === n || "false" === n) ? -1 === $.inArray(n, ["false", "null", "undefined", "", "0"]) : "null" == r || a.parseNulls && "null" == n ? -1 !== $.inArray(n, ["false", "null", "undefined", "", "0"]) ? null : n : "array" == r || "object" == r ? JSON.parse(n) : "auto" == r ? t.parseValue(n, null, { parseNumbers: !0, parseBooleans: !0, parseNulls: !0 }) : n }, isObject: function (e) { return e === Object(e) }, isUndefined: function (e) { return void 0 === e }, isValidArrayIndex: function (e) { return /^[0-9]+$/.test(String(e)) }, isNumeric: function (e) { return e - parseFloat(e) >= 0 }, splitInputNameIntoKeysArray: function (n) { var r, a, t, i, s; return s = e.serializeJSON, i = s.extractTypeFromInputName(n), a = i[0], t = i[1], r = a.split("["), r = e.map(r, function (e) { return e.replace(/]/g, "") }), "" === r[0] && r.shift(), r.push(t), r }, extractTypeFromInputName: function (n) { var r, a; if (a = e.serializeJSON, r = n.match(/(.*):([^:]+)$/)) { var t = ["string", "number", "boolean", "null", "array", "object", "skip", "auto"]; if (-1 !== $.inArray(r[2], t)) return [r[1], r[2]]; throw new Error("serializeJSON ERROR: Invalid type " + r[2] + " found in input name '" + n + "', please use one of " + t.join(", ")) } return [n, "_"] }, deepSet: function (n, r, a, t) { var i, s, u, l, o, p; if (null == t && (t = {}), p = e.serializeJSON, p.isUndefined(n)) throw new Error("ArgumentError: param 'o' expected to be an object or array, found undefined"); if (!r || 0 === r.length) throw new Error("ArgumentError: param 'keys' expected to be an array with least one element"); i = r[0], 1 === r.length ? "" === i ? n.push(a) : n[i] = a : (s = r[1], "" === i && (l = n.length - 1, o = n[l], i = p.isObject(o) && (p.isUndefined(o[s]) || r.length > 2) ? l : l + 1), "" === s ? (p.isUndefined(n[i]) || !e.isArray(n[i])) && (n[i] = []) : t.useIntKeysAsArrayIndex && p.isValidArrayIndex(s) ? (p.isUndefined(n[i]) || !e.isArray(n[i])) && (n[i] = []) : (p.isUndefined(n[i]) || !p.isObject(n[i])) && (n[i] = {}), u = r.slice(1), p.deepSet(n[i], u, a, t)) }, readCheckboxUncheckedValues: function (n, r, a) { var t, i, s, u, l; null == a && (a = {}), l = e.serializeJSON, t = "input[type=checkbox][name]:not(:checked):not([disabled])", i = r.find(t).add(r.filter(t)), i.each(function (r, t) { s = e(t), u = s.attr("data-unchecked-value"), u ? n.push({ name: t.name, value: u }) : l.isUndefined(a.checkboxUncheckedValue) || n.push({ name: t.name, value: a.checkboxUncheckedValue }) }) } } }(window.jQuery || window.Zepto || window.$);

// Surcharge des selecteurs CSS CONTAINS pour être 'insensitive case'
jQuery.expr[':'].Contains = function (a, i, m) {
	return jQuery(a).text().toUpperCase()
        .indexOf(m[3].toUpperCase()) >= 0;
};
jQuery.expr[':'].contains = function (a, i, m) {
	return jQuery(a).text().toUpperCase()
        .indexOf(m[3].toUpperCase()) >= 0;
};

$(window).resize(function () {
	$(".popup").remove();
	$(document.body).children(".wrapper").remove();
});

$(window).on("scroll", function () {
	$(".popup").remove();
	$(document.body).children(".wrapper").remove();
});

$(document).ready(function () {

	commonWebApi = new WebApi();

	setFieldsMasks();

	HtmlConstructor.prototype.addPlaceholder();

	HtmlConstructor.prototype.addConstraintNumberOnly(new Array('#InfoClassified_Price'), true);

	/*******************************************************
    *             FileUpload 
    ******************************************************/

	var upload = new Uploader(enum_typeUpload.Photos);
	var navClient = new Browser();
	if (navClient.isLimitedBrowserVersion()) {
		if (navClient.hasFlash()) {
			$('#photos-input-container').removeClass();
			$('#photos-input-container').addClass("col-md-offset-7 col-md-3");
			upload.doUploadify();
		}
		else {
			var htmlNewBrowser = '<div class="text-center">';
			htmlNewBrowser += 'L\'ajout de photos n\'est pas disponible avec la version de votre navigateur.<br>';
			htmlNewBrowser += 'Merci d\'utiliser un navigateur plus récent.';
			htmlNewBrowser += '</div>';
			$('.photos').empty();
			$('.photos').append(htmlNewBrowser);
			$('.photos').css('margin-top', '100px');
		}
	} else {
		$('#mainPicture').on('click', function (event) {
			if (!$(this).hasClass("hasPhotoInside")) {
				$('#photoInput').click();
			}
		});

		$('.thumbnails-container .thumbnail').parent().on('click', function (event) {
			if (!$(this).children(".thumbnail").hasClass("hasPhotoInside")) {
				$('#photoInput').click();
			}
		});

		$('#photoInput').on('change', function (event) {
			upload.doUpload(event.target.files);
		});
	}

	$(".dropdown-menu a").each(function (index, link) {
		$(link).click(function (event) {
			event.preventDefault();
			fakeComboSelect($(this));
		});
	});

	$("#selectUnivers li a").on('click', function () {
		var classified = new Classified();
		resetSubUniversAndChildrenDynamicFields();
		hideSubUniversAndChildrenDynamicFields();
		var subUniversId = $(this).data('id');
		classified.getSubUnivers(subUniversId);
		var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
		var fieldValidator = new FieldValidator(inputAssociated);
		fieldValidator.isValidField();
		var currentStep = $("nav .navetape.etat-on").find($("a")).attr("href");
		var profileType = $("#part").is(':checked') ? 1 : 2;
		if (global.submittedClassifiedId !== null && global.submittedClassifiedId > 0) {
			var request = commonWebApi.cleanOrder(global.submittedClassifiedId);
			request.success(function (data) {
				$(".bill-line").remove();
				$(".recap-annonce").slideUp("slow");
				$(".billing-off").slideUp("slow");
				Classified.prototype.getUpsells(subUniversId, profileType, (currentStep != "#etape1"));
			});
		} else {
			Classified.prototype.getUpsells(subUniversId, profileType, (currentStep != "#etape1"));
		}
		$(".recap-annonce").slideUp("slow", function () {
			$(".recap-annonce table tbody tr").each(function () { $(this).remove(); });
			$(".billing-off").slideUp("slow");
			global.upsellsLoaded = false;
		});
		//Univers rencontre
		if ($('#Univers').val() === "19") {
			$('#InfoClassified_Price').val('0');
			$('#row-price').hide();
		}
		else {
			$('#InfoClassified_Price').val('');
			$('#row-price').show();
		}
	});

	var uploadLogo = new Uploader(enum_typeUpload.Logo);
	if (navClient.isLimitedBrowserVersion()) {
		if (!navClient.hasFlash()) {
			if (navClient.isLimitedBrowserVersion() && (!navClient.hasFlash())) {
				var htmlNewBrowser = '<div class="text-center">';
				htmlNewBrowser += 'L\'ajout de logo n\'est pas disponible avec la version de votre navigateur.<br>';
				htmlNewBrowser += 'Merci d\'utiliser un navigateur plus récent.';
				htmlNewBrowser += '</div>';
				$('#logoDiv').empty();
				$('#logoDiv').append(htmlNewBrowser);
			}
		}
		else {
			if (navClient.isLimitedBrowserVersion()) {
				uploadLogo.doUploadify();
			}
		}
	}

	$('#logoInput').on('change', function () {
		if (!navClient.isLimitedBrowserVersion()) {
			uploadLogo.doUpload(this.files);
		}
		else {
			uploadLogo.doUploadify();
		}
	});

	/******************************************************
    *                   User submit
    ******************************************************/
	function validatePartyFormAndSubmit(registerUser) {
		function passToNextStep() {
			$('#etape1').slideUp("slow", function () { $("#nav-step2").removeClass('disabled'); $(".go-to-step-2").removeClass('disabled'); });
			$('#etape2 .wrapper').remove();
			$("nav .navetape").removeClass("etat-on");
			$("#nav-step1").parent().parent().next().removeClass("text-primary");
			$("#nav-step2").parent().parent().next().addClass("text-primary");
			var currentStep = $("#nav-step2").parents(".navetape");
			currentStep.addClass('etat-on');
			$(".go-to-step-2").toggleClass('active');
			if (Classified.prototype.partyIsPro() && $("#invoiceAddress").val().length === 0) {
				$("#invoiceAddress").val($("#Address").val());
			}
			var subUniversId = $("#SubUnivers").val();
			if (subUniversId !== null && subUniversId > 0) {
				var profileType = $("#part").is(':checked') ? 1 : 2;
				Classified.prototype.getUpsells(subUniversId, profileType, true);
				if ($('#etape3 .wrapper').length === 0)
					$('#etape3').append('<div class="wrapper">&nbsp;</div>');
			}
		}

		function successCallback() {
			passToNextStep();
		}

		function successLoginCallback(result) {
			if (result == "OK") {
				successAutoLoginCallback();
			} else if (result == "FORBIDDEN") {
				FieldValidator.prototype.displayErrorOn($("#Email"), properties_fr.NoRightsOnClassified);
				errorCallback(properties_fr.NoRightsOnClassified);

			}
			else {
				FieldValidator.prototype.displayErrorOn($("#Email"), properties_fr.IncorrectMail);
				errorCallback(properties_fr.IncorrectMail);
			}
		}

		function successAutoLoginCallback() {
			successCallback();
			$('#etape3').slideDown("slow");
			global.upsellsLoaded = true;
		}


		function errorCallback(reason) {
			Logger.prototype.logError("validatePartyFormAndSubmit()", reason);
			$(".go-to-step-2").removeClass('disabled');
			$("#nav-step2").removeClass('disabled');
			$(".go-to-step-2").toggleClass('active');
		}

		function displayEmailError(emailInputField) {
			var fieldValdidator = new FieldValidator($(emailInputField));
			fieldValdidator.isValidField();
		}

		function manageEmailValidation(formContainer, emailValue) {
			var emailInputField = $(formContainer).find("#Email")[0];
			$(emailInputField).setCustomValidity(0);
			displayEmailError(emailInputField);
			$(emailInputField).keypress(function () {
				if (FieldValidator.prototype.isValidEmail(emailValue)) {
					$(emailInputField).setCustomValidity(1);
				}
			});
		}

		$(".go-to-step-2").addClass('disabled');
		$("#nav-step2").addClass('disabled');
		var formContainer;
		var selectedPartyType
		if ($("input[name='IsPro']").length > 0 && $("input[name='IsPro']").css("display") != "none") {
			selectedPartyType = $("input[name='IsPro']:checked").attr("id");
			formContainer = $("#container-login-is" + selectedPartyType);
		} else {
			formContainer = $("#container-login");
		}
		var partyForm = formContainer.find("form");
		var formValidator = new FormValidator(partyForm);
		formValidator.scrollToIfNotValid($("#etape1"));
		if (formValidator.isValid()) {
			emailValue = $(formContainer).find("#Email").val();
			if (!FieldValidator.prototype.isValidEmail(emailValue)) {
				manageEmailValidation(formContainer, emailValue);
			} else {
				$(".go-to-step-2").toggleClass('active');
				if (registerUser) {
					partyJson = new PartyForm(selectedPartyType, partyForm).partyJsonHonest;
					commonWebApi.createParty(selectedPartyType, partyJson, successCallback, errorCallback);
				}
				else if ($("input[name='IsPro']").length == 0 || $("input[name='IsPro']").css("display") == "none") {
					commonWebApi.loginParty($("#Email").val(), $("#Password").val(), $("#InfoClassified_Id").val(), successLoginCallback, errorCallback);
				} else { successAutoLoginCallback(); }
			}
		} else {
			$(".go-to-step-2").removeClass('disabled');
			$("#nav-step2").removeClass('disabled');
		}
	}

	function validClassifiedFormAndSubmit() {
		function passToNextStep() {
			$(".go-to-step-3").removeClass('disabled');
			$('#nav-step3').removeClass('disabled');
			$('#etape3 .wrapper').remove();
			$("nav .navetape").removeClass("etat-on");
			$("#nav-step2").parent().parent().next().removeClass("text-primary");
			$("#nav-step3").parent().parent().next().addClass("text-primary");
			var currentStep = $("#nav-step3").parents(".navetape");
			currentStep.addClass('etat-on');
			$('#etape2').slideUp("slow");
			$(".go-to-step-3").toggleClass('active');
			if ($("#invoiceZC").val().length === 0)
				$("#invoiceZC").val($("#ZipCode").val());

			if ($("#invoiceCity").val().length === 0)
				$("#invoiceCity").val($("#City").val());

			document.getElementById('etapes').scrollIntoView(true);

		}

		function successUpdateCallback(updateData) {
			if (updateData.update != undefined && updateData.update) {
				global.submittedClassifiedId = updateData.classifiedId;
				var telephone = $("#telephone");
				var subUniversId = $("#SubUnivers").val();
				var cprom = commonWebApi.contactRegister(global.submittedClassifiedId, telephone.val(), $("#tel-number").prop("checked"));
				cprom.success(function () {
					passToNextStep();
				});
			}
		}

		function successCreateCallback(submittedClassifiedId) {
			global.submittedClassifiedId = submittedClassifiedId;
			var prom = commonWebApi.makeCalcMandatoryUpsells(submittedClassifiedId);
			prom.success(function () {
				var telephone = $("#telephone");
				if (global.upsellsLoaded === false) {
					var subUniversId = $("#SubUnivers").val();
					var profileType = $("#part").is(':checked') ? 1 : 2;
					var clean = commonWebApi.cleanOrder(global.submittedClassifiedId);
					clean.success(function (data) {
						$(".bill-line").remove();
						$(".recap-annonce").slideUp("slow");
						$(".billing-off").slideUp("slow");
						Classified.prototype.setTotalUpSells();
						Classified.prototype.getUpsells(subUniversId, profileType, true);
					});
				}
				var cprom = commonWebApi.contactRegister(global.submittedClassifiedId, telephone.val(), $("#tel-number").prop("checked"));
				cprom.success(function () {
					passToNextStep();
				});
			});
		}

		function errorCallback(reason) {
			$(".go-to-step-3").removeClass('disabled');
			$('#nav-step3').removeClass('disabled');
			$(".go-to-step-3").toggleClass('active');
			Logger.prototype.logError("commonWebApi.createClassified(integrateClassified)", reason);
		}

		$(".go-to-step-3").addClass('disabled');
		$('#nav-step3').addClass('disabled');
		var formContainer = $("#etape2");
		var classifiedForm = formContainer.find("form");
		var formValidator = new FormValidator(classifiedForm);
		var anchor = $("#etape2");
		formValidator.scrollToIfNotValid(anchor);
		var updateClassifiedId = $("#InfoClassified_Id").val();
		if (updateClassifiedId != null && updateClassifiedId > 0) AutoComplete.prototype.setGlobalZipCodeSelected();
		if (formValidator.isValid() && global.zipCodeSelected) {
			$(".go-to-step-3").toggleClass('active');

			if (updateClassifiedId != null && updateClassifiedId > 0) {
				$("#Pictures").val("");
				var pictures = $(".thumbnails-container .thumbnails-carousel .hasPhotoInside img");
				pictures.each(function (index, img) {

					var url = $(img).attr("src");
					if (pictures.length != (index + 1))
						$("#Pictures").val($("#Pictures").val() + url + ",");
					else {
						$("#Pictures").val($("#Pictures").val() + url);
					}
				});
			}

			var classifiedJson = classifiedForm.serializeJSON();
			var sanitizedClassifiedJson = $(classifiedJson).sanitizeJson();

			if (updateClassifiedId != null && updateClassifiedId > 0) {

				integrateClassifiedJson = Classified.prototype.updateClassifiedFromClassifiedFormJson(sanitizedClassifiedJson);
				var promise = commonWebApi.updateClassified(integrateClassifiedJson, successUpdateCallback, errorCallback);
			} else {
				integrateClassifiedJson = Classified.prototype.createClassifiedFromClassifiedFormJson(sanitizedClassifiedJson);
				var promise = commonWebApi.createClassified(integrateClassifiedJson, successCreateCallback, errorCallback);
			}

		} else {
			$(".go-to-step-3").removeClass('disabled');
			$('#nav-step3').removeClass('disabled');
		}

	}

	function validInvoiceFormAndSubmit() {
		function successCallback(result) {
			if (result != "false") {
				$(document.body).append($(Classified.prototype.makePaymentForm(result)));
				$("#formPaymentCARTE").submit();
			} else {
				document.location.href = "/confirmation-" + global.submittedClassifiedId + ".html";
			}
		}
		function successPaylineCallback(result) {
			if (result != "false") {
				document.location.href = result;
			} else {
				alert("Service de paiement indisponible. Merci de nous excuser pour la gêne occasionée. Veuillez réessayer utlérieurement...");
			}
		}

		function errorCallback(reason) {
			Logger.prototype.logError("commonWebApi.validInvoiceFormAndSubmit()", reason);
			$("#publish").toggleClass('active');
		}

		if ($("#cgv").prop("checked")) {
			if ($(".recap-annonce table tbody tr").length > 0) {
				var formContainer = $(".billing-form");
				var invoiceForm = formContainer.find("form#invoiceForm");
				var formValidator = new FormValidator(invoiceForm);
				if (formValidator.isValid() && Classified.prototype.getTotalUpSells() > 0) {
					$("#publish").toggleClass('active');
					if (global.usePayline) {
						commonWebApi.getPaylineUrl(global.submittedClassifiedId, $("#invoiceAddress").val(), $("#invoiceZC").val(), $("#invoiceCity").val(), successPaylineCallback, errorCallback);
					}
					else {
						commonWebApi.payBoxModeCheck(global.submittedClassifiedId, $("#invoiceAddress").val(), $("#invoiceZC").val(), $("#invoiceCity").val(), successCallback, errorCallback);
					}
				}
			} else {
				$("#publish").toggleClass('active');
				document.location.href = "/confirmation-" + global.submittedClassifiedId + ".html";
			}
		} else {
			$("#modalCGV").modal({
				backdrop: 'static',
				keyboard: false
			});
		}
	}

	$("#btn-saisir").on('click', function (event) {
		event.preventDefault();
		validatePartyFormAndSubmit(true);
	});

	$("#btn-modifier").on('click', function (event) {
		event.preventDefault();
		validatePartyFormAndSubmit(false);
	});


	$("#publish").on('click', function (event) {
		event.preventDefault();
		validInvoiceFormAndSubmit();
	});

	//Facebook blocks listener
	$(".facebook").on('click', function (event) {
		$(".facebook").addClass("disabled");
		event.preventDefault();
		function successCallback(profilePictureUrl) {
			PartyForm.prototype.adaptParticularFormToFacebookLoggedDom(profilePictureUrl);
		}
		//do the login
		FB.login(function (response) {
			if (response.authResponse) {
				//user just authorized your app
				FBApi.prototype.getUserData(successCallback);
			}
		}, { scope: 'email'});
	});

	$("nav .navetape .stepnum a").on('click', function (event) {
		event.preventDefault();
		var currentStep = $("nav .navetape.etat-on").find($("a")).attr("href");
		switch ($(this).attr("href")) {
			case "#etape1":


				$("nav .navetape").removeClass("etat-on");

				if ($('#etape2 .wrapper').length === 0)
					$('#etape2').append('<div class="wrapper">&nbsp;</div>');

				Classified.prototype.hideAllErrorInputOfelement($("#etape2"));

				$('#etape3').slideUp("slow");
				$('#etape2').slideDown("slow");
				$('#etape1').slideDown("slow");
				$("#nav-step3").parent().parent().next().removeClass("text-primary");
				$("#nav-step2").parent().parent().next().removeClass("text-primary");

				var newStep = $("#nav-step1").parents(".navetape");
				newStep.addClass('etat-on');
				$("#nav-step1").parent().parent().next().addClass("text-primary");

				break;
			case "#etape2":
				if (currentStep === "#etape1") {
					$(".go-to-step-2").click();
				}
				if (currentStep === "#etape3") {

					$("#nav-step3").parents(".navetape").removeClass("etat-on");
					$("#nav-step2").parents(".navetape").addClass("etat-on");
					$("#nav-step3").parent().parent().next().removeClass("text-primary");
					$("#nav-step2").parent().parent().next().addClass("text-primary");
					$("#etape2").slideDown("slow");
				}
				if (global.upsellsLoaded) {
					if ($('#etape3 .wrapper').length === 0) $('#etape3').append('<div class="wrapper">&nbsp;</div>');
					$("#etape3").slideDown("slow");
				}
				break;
			case "#etape3":
				if ((currentStep === "#etape2") && (!$(".go-to-step-3").hasClass('triggerClick'))) {
					var navClient = new Browser();
					if ($(".hasPhotoInside").length > 0 || (!navClient.hasFlash())) {
						validClassifiedFormAndSubmit();
					} else {
						$("#photoinfo").modal({
							backdrop: 'static',
							keyboard: false
						});
					}
				}
				break;
		}
	});

	$(".propart").on("change", function () {
		var hiddenDefClass = "hidden-xs hidden-sm";
		var current = $("#container-login-is" + $(this).attr("id"));
		var notCurrent = $(".container-login").not(current);
		if ($(this).prop("checked")) {
			notCurrent.addClass(hiddenDefClass);
			notCurrent.find("input").attr("disabled", "disabled");
			notCurrent.find("input").prop("readonly", true);
			Classified.prototype.hideAllErrorInputOfelement(notCurrent);
			current.removeClass(hiddenDefClass);
			current.find("input").prop("readonly", false);
			current.find("input").removeAttr("disabled");
			var inputFile = null;
			inputFile = notCurrent.find("#logoInput");
			var subUniversId = $("#SubUnivers").val();
			if (subUniversId !== null && subUniversId > 0) {
				var profileType = $("#part").is(':checked') ? 1 : 2;
				if (global.submittedClassifiedId !== null && global.submittedClassifiedId > 0) {
					var clean = commonWebApi.cleanOrder(global.submittedClassifiedId);
					clean.success(function (data) {
						$(".bill-line").remove();
						$(".recap-annonce").slideUp("slow");
						$(".billing-off").slideUp("slow");
						Classified.prototype.setTotalUpSells();
						Classified.prototype.getUpsells(subUniversId, profileType, false);
					});
				}
				if (profileType == 1) {
					if (subUniversId == "398" || subUniversId == "400" || subUniversId == "402" || subUniversId == "406") {
						$("#selectUnivers a[data-id='" + $("#Univers").val() + "']").click();
					}
				}
			}
		}
	});

	$("#container-login-ispro").find("#Name").focusout(function () {
		if ($("#container-login-ispro").find("#Email").val() !== "" &&
            $("#container-login-ispro").find("#Name").val() !== "") {
			var response = commonWebApi.getPartyByEmailAndName($("#container-login-ispro").find("#Email").val(), $("#container-login-ispro").find("#Name").val());
			response.success(function (data) {
				$("#container-login-ispro").find("#CompanyName").val(data.companyName);
				$("#container-login-ispro").find("#Siret").val(data.siret);
				$("#container-login-ispro").find("#Address").val(data.address);
				$("#container-login-ispro").find("#Website").val(data.webSite);
				if (data.publicPath !== undefined && data.publicPath !== null && data.publicPath !== "") {
					PartyForm.prototype.adaptLogoDom(data.publicPath);
					$("#urlPicture").val(data.publicPath);
					$("#guidlogo").val(data.guid);
				}
			});
			response.error(function (error) {
				console.log("getPartyByEmailAndName : Error An error was occured : " + error);
			});
		}
	});

	$("#container-login-ispro").find("#Email").focusout(function () {
		if ($("#container-login-ispro").find("#Email").val() !== "" &&
            $("#container-login-ispro").find("#Name").val() !== "") {
			var response = commonWebApi.getPartyByEmailAndName($("#container-login-ispro").find("#Email").val(), $("#container-login-ispro").find("#Name").val());
			response.success(function (data) {
				$("#container-login-ispro").find("#CompanyName").val(data.companyName);
				$("#container-login-ispro").find("#Siret").val(data.siret);
				$("#container-login-ispro").find("#Address").val(data.address);
				$("#container-login-ispro").find("#Website").val(data.webSite);
				if (data.publicPath !== undefined && data.publicPath !== null && data.publicPath !== "") {
					PartyForm.prototype.adaptLogoDom(data.publicPath);
					$("#urlPicture").val(data.publicPath);
					$("#guidlogo").val(data.guid);
				}
			});
			response.error(function (error) {
				console.log("getPartyByEmailAndName : Error. An error was occured : " + error);
			});
		}
	});

	function positionDeleteImageButton() {
		$(".picturesSpan .cleanableImg").each(function () {
			var spanRemove = $(this).next();
			$(spanRemove).css("margin-top", $(this).height);
		});
	}

	Listener.prototype.bindFieldsValidationListenerOn(".mandatory input, .mandatory textarea, #ZipCode", "focusout");

	/******************************************************
    *               Auto-completion ZipCode
    ******************************************************/
	$("#ZipCode").keypress(function (event) {
		return Tools.prototype.isValidNumber(event, false);
	});

	$("#ZipCode").keyup(function () {
		var autocomplete = new AutoComplete();
		autocomplete.attachInputElement("#ZipCode");
		var zipCode = $.trim($("#ZipCode").val().replace(/_/g, ''));
		if (zipCode.length > 2) {
			var request = commonWebApi.getZipCode(zipCode);
			request.success(function (data) {
				if (data.NB === 0) {
					autocomplete.constructUnfindedErrorData();
				} else {
					autocomplete.bindData(data);
					autocomplete.constructData();
				}
				autocomplete.displayDataOn();
			});
			request.error(function () {
				autocomplete.constructUnfindedErrorData();
				autocomplete.displayDataOn();
			});
		}
		else {
			autocomplete.displayDataOff();
		}
	});

	$("#invoiceZC").on('focusout', function (event) {
		var autocomplete = new AutoComplete();
		autocomplete.attachInputElement("#invoiceZC");
		autocomplete.displayDataOff();
	});

	$("#invoiceZC").keypress(function (event) {
		return Tools.prototype.isValidNumber(event, false);
	});


	$("#invoiceZC").keyup(function () {
		var autocomplete = new AutoComplete();
		autocomplete.attachInputElement("#invoiceZC");
		var zipCode = $.trim($("#invoiceZC").val().replace(/_/g, ''));
		if (zipCode.length > 2) {
			var request = commonWebApi.getZipCode(zipCode);
			request.success(function (data) {
				if (data.NB === 0) {
					autocomplete.constructUnfindedErrorData();
				} else {
					autocomplete.bindData(data);
					autocomplete.constructData();
				}
				autocomplete.displayDataOn();
			});
			request.error(function () {
				autocomplete.constructUnfindedErrorData();
				autocomplete.displayDataOn();
			});
		}
		else {
			autocomplete.displayDataOff();
		}
	});

	/******************************************************
    *               Classified submit
    ******************************************************/
	$(".go-to-step-3").on("click", function (event) {
		var browser = new Browser();
		event.preventDefault();
		if (browser.isLimitedBrowserVersion() && !browser.hasFlash()) {
			validClassifiedFormAndSubmit();
		}
		else
			if ($(".hasPhotoInside").length > 0 || $(".go-to-step-3").hasClass('triggerClick')) {
				validClassifiedFormAndSubmit();
			} else {
				var formContainer = $("#etape2");
				var classifiedForm = formContainer.find("form");
				var formValidator = new FormValidator(classifiedForm);
				var anchor = $("#etape2");
				formValidator.scrollToIfNotValid(anchor);
				var updateClassifiedId = $("#InfoClassified_Id").val();
				if (updateClassifiedId != null && updateClassifiedId > 0) AutoComplete.prototype.setGlobalZipCodeSelected();
				if (formValidator.isValid() && global.zipCodeSelected) {
					$("#photoinfo").modal({
						backdrop: 'static',
						keyboard: false
					});
				}
			}

	});

	$("#publish-without-photo").on("click", function (event) {
		event.preventDefault();
		$('#photoinfo').modal('hide');
		validClassifiedFormAndSubmit();
	});

	$("#publish-with-photo").on("click", function (event) {
		event.preventDefault();
		$('#photoinfo').modal('hide');
		document.getElementById('typeProposal').scrollIntoView(true);
	});

	$("#InfoClassified_Title").focus(function () {
		if (global.tips.TitleHelper !== null) {
			var template = '<div class="tooltip" style="height:35% !important; z-index: 10000;" role="tooltip"><div class="tooltip-arrow info"></div><div class="tooltip-inner info"></div></div>';
			var tooltip = new TooltipElement();
			tooltip.attachElement(Classified.prototype.getElementToApplyTooltipError($("#InfoClassified_Title")));
			tooltip.destroy();
			setTimeout(function () {
				tooltip.applyTemplate(template);
				tooltip.setTitle(global.tips.TitleHelper);
				tooltip.show();
			}, 200);
		}
	});

	$("#InfoClassified_Description").focus(function () {
		if (global.tips.DescriptionHelper !== null) {
			var template = '<div class="tooltip" style="height:35% !important; z-index: 10000;" role="tooltip"><div class="tooltip-arrow info"></div><div class="tooltip-inner info"></div></div>';
			var tooltip = new TooltipElement();
			tooltip.attachElement(Classified.prototype.getElementToApplyTooltipError($("#InfoClassified_Description")));
			tooltip.destroy();
			setTimeout(function () {
				tooltip.applyTemplate(template);
				tooltip.setTitle(global.tips.DescriptionHelper);
				tooltip.show();
			}, 200);
		}
	});

	$("#InfoClassified_Title").focusout(function () {
		if (global.tips.TitleHelper !== null) {
			var tooltip = new TooltipElement();
			tooltip.attachElement(Classified.prototype.getElementToApplyTooltipError($("#InfoClassified_Title")));
			tooltip.destroy();
		}
	});

	$("#InfoClassified_Description").focusout(function () {
		if (global.tips.DescriptionHelper !== null) {
			var tooltip = new TooltipElement();
			tooltip.attachElement(Classified.prototype.getElementToApplyTooltipError($("#InfoClassified_Description")));
			tooltip.destroy();
		}
	});

	$("#UniversName").keyup(function () {
		var autocompleteList = new ListFilter();
		autocompleteList.useUlElementsCollection($("#selectUnivers")[0]);
		$('#UniversName.listInputSearch').keyup(function () {
			$(autocompleteList.htmlListToUse).parent().addClass("open");
			$(autocompleteList.htmlListToUse).siblings(".dropdown-toggle").attr("aria-expanded", "true");
			var searchKey = $(this).val();
			autocompleteList.filterList(searchKey);
		});
		//Oblige l'utilisateur à cliquer sur une valeur de la liste pour remplir champs
		$('#UniversName.listInputSearch').blur(function () {
			var self = this;
			if ($('#Univers').val() === undefined || $('#Univers').val() === "") {
				$(self).val("");
				setTimeout(function () {

					//Rétablie les valeurs par défault
					autocompleteList.filterList("");
				}, 150);
			}
		});
	})

	/*Update specifics loading*/
	$(".thumbnails-carousel .thumbnail img").each(function (index, img) {
		global.pictures.push($(img));
	});
	Carousel.prototype.bindDeleteButtonClickListner();
	$(".upsell-container").each(function (index, upsellHtml) {
		var upsell = {
			"Id": $(upsellHtml).find(".upsell-Id").val(),
			"Subtitle": $(upsellHtml).find(".upsell-Subtitle").val(),
			"PathLogo": $(upsellHtml).find(".upsell-PathLogo").val(),
			"Title": $(upsellHtml).find(".upsell-Title").val(),
			"LabelMinPrice": $(upsellHtml).find(".upsell-LabelMinPrice").val(),
		};
	});
	Classified.prototype.bindListenerUpsellsOptionClick();
	/*Bind Update specifics loading*/


	/* begin Brouillage*/
	var _BaseClassName = "tatiana";

	jsli = {
		getElementsByClassName: function (className) {
			if (!document.getElementsByClassName) {
				var retour = new Array();
				var dc = document.getElementsByTagName("a");
				for (i = 0; i < dc.length; i++) {
					var cln = dc[i].className.split(" ");
					for (j = 0; j < cln.length; j++) {
						if (cln[j] == className) retour[retour.length] = dc[i];
					}
				}
				return retour;
			} else {
				return document.getElementsByClassName(className);
			}
		},

		getOptionsElementsByClassName: function (className) {
			if (!document.getOptionsElementsByClassName) {
				var retour = new Array();
				var dc = document.getElementsByTagName("option");
				for (i = 0; i < dc.length; i++) {
					var cln = dc[i].className.split(" ");
					for (j = 0; j < cln.length; j++) {
						if (cln[j] == className) retour[retour.length] = dc[i];
					}
				}
				return retour;
			} else {
				return document.getOptionsElementsByClassName(className);
			}
		},

		getDataTargetUrlElementsByClassName: function (className) {
			if (!document.getDataTargetUrlElementsByClassName) {
				var retour = new Array();
				var dc = document.getElementsByTagName("input");
				for (i = 0; i < dc.length; i++) {
					var cln = dc[i].className.split(" ");
					for (j = 0; j < cln.length; j++) {
						if (cln[j] == className) retour[retour.length] = dc[i];
					}
				}
				return retour;
			} else {
				return document.getDataTargetUrlElementsByClassName(className);
			}
		},

		BrouilleLinkUrl: function () {
			try {
				var str, rurl = ""
				var _base16 = "0A12B34C56D78E9F";
				var spanstotos = this.getElementsByClassName(_BaseClassName);
				var nbspanstotos = spanstotos.length;
				var rclassn, ln = null;
				var ch, cl, j = 0;
				var i = nbspanstotos;
				while (i--) {
					if (spanstotos[i].tagName == 'SPAN' || spanstotos[i].tagName == 'A') {
						var curSpan = spanstotos[i];
						var rurl = "";
						if (curSpan.getAttribute("rel")) {
							str = curSpan.getAttribute("rel");
							for (j = 0; j < str.length; j += 2) {
								ch = _base16.indexOf(str.charAt(j));
								cl = _base16.indexOf(str.charAt(j + 1));
								rurl += String.fromCharCode((ch * 16) + cl);
							}
							curSpan.setAttribute("href", rurl);
							curSpan.removeAttribute("rel");
						}
					}
				}
			} catch (e) { }
		},

		BrouilleOptionUrl: function () {
			try {
				var str, rurl = ""
				var _base16 = "0A12B34C56D78E9F";
				var spanstotos = this.getOptionsElementsByClassName(_BaseClassName);
				var nbspanstotos = spanstotos.length;
				var rclassn, ln = null;
				var ch, cl, j = 0;
				var i = nbspanstotos;
				while (i--) {
					if (spanstotos[i].tagName == 'OPTION') {
						var curSpan = spanstotos[i];
						var rurl = "";
						if (curSpan.getAttribute("rel")) {
							str = curSpan.getAttribute("rel");
							for (j = 0; j < str.length; j += 2) {
								ch = _base16.indexOf(str.charAt(j));
								cl = _base16.indexOf(str.charAt(j + 1));
								rurl += String.fromCharCode((ch * 16) + cl);
							}
							curSpan.setAttribute("value", rurl);
							curSpan.removeAttribute("rel");
						}
					}
				}
			} catch (e) { }
		},

		BrouilleDataTargetUrlUrl: function () {
			try {
				var str, rurl = ""
				var _base16 = "0A12B34C56D78E9F";
				var spanstotos = this.getDataTargetUrlElementsByClassName(_BaseClassName);
				var nbspanstotos = spanstotos.length;
				var rclassn, ln = null;
				var ch, cl, j = 0;
				var i = nbspanstotos;
				while (i--) {
					if (spanstotos[i].tagName == 'INPUT') {
						var curSpan = spanstotos[i];
						var rurl = "";
						if (curSpan.getAttribute("rel")) {
							str = curSpan.getAttribute("rel");
							for (j = 0; j < str.length; j += 2) {
								ch = _base16.indexOf(str.charAt(j));
								cl = _base16.indexOf(str.charAt(j + 1));
								rurl += String.fromCharCode((ch * 16) + cl);
							}
							curSpan.setAttribute("data-targeturl", rurl);
							curSpan.removeAttribute("rel");
						}
					}
				}
			} catch (e) { }
		}
	}
	jsli.BrouilleLinkUrl();
	jsli.BrouilleOptionUrl();
	jsli.BrouilleDataTargetUrlUrl();

	/* End brouillage */

	$(document).on({
		click: function () {
			if ($('#attributes-Bienencopropriete').val() == "") {
				$('#selectBienencopropriete a[data-id$="Non"]').click()
			}
			if ($('#attributes-Bienencopropriete').val().split('|')[1] != "Oui") {
				$('#Numerodulot').parents('.form-group').hide();
				$('#Nombredelots').parents('.form-group').hide();
				$('#ProcedureencoursName').parents('.form-group').hide();
				$('#Chargesannuelles').parents('.form-group').hide();
				$('#StatutdusyndicatName').parents('.form-group').hide();
				$('#RepresentantLegal').parents('.form-group').hide();
				$('#Evolutionprocedure').parents('.form-group').hide();
			}
			else {
				$('#Numerodulot').parents('.form-group').show();
				$('#Nombredelots').parents('.form-group').show();
				$('#ProcedureencoursName').parents('.form-group').show();
				$('#Chargesannuelles').parents('.form-group').show();
				$('#StatutdusyndicatName').parents('.form-group').show();
				$('#RepresentantLegal').parents('.form-group').show();
				$('#Evolutionprocedure').parents('.form-group').show();
			}
		}
	}, '#selectBienencopropriete');

	$(document).on({
		click: function () {
			if ($('#attributes-Afficherenvaleur').val() == "") {
				$('#selectAfficherenvaleur a[data-id$="Non"]').click()
			}
		}
	}, '#selectAfficherenvaleur');

	$(document).on({
		click: function () {
			if ($('#attributes-SoumisauDPE').val() == "") {
				$('#selectSoumisauDPE a[data-id$="Non"]').click()
			}
			if ($('#attributes-SoumisauDPE').val().split('|')[1] == "Non") {
				$('#Performanceenergetique').val("0");
			}
		}
	}, '#selectSoumisauDPE');

	$(document).on({
		click: function () {

			if ($('#attributes-Typedusage').val() == "") {
				$('#SientrepriseName').parents('.form-group').hide();
				$('#selectTypedusage a[data-id$="Habitation"]').click();
			}
			else {
				if (($('#attributes-Typedusage').val().split('|')[1]).split(' ')[0] != "Entreprise") {
					$('#SientrepriseName').parents('.form-group').hide();
				}
				else {
					$('#SientrepriseName').parents('.form-group').show();
				}
			}
		}
	}, '#selectTypedusage');


	$(document).on({
		click: function () {
			if ($('.occulted').is(":visible")) {
				$('.occulted').hide();
				$('#occultediv').html("<div id='occulte-plus-moins'>+</div><div id='occulteAttr'>Je souhaite donner plus de details</div>");
			}
			else {
				$('.occulted').show();
				$('#occultediv').html("<div id='occulte-plus-moins'>-</div> <div id='occulteAttr'>Je souhaite donner moins de details</div>");
			}
		}
	}, '#occultediv');

	$(document).on({
		click: function () {
			$("#infoenergy").modal({
				backdrop: 'static',
				keyboard: false
			});
		}
	}, '#energyinfo');

	$(document).on({
		click: function () {
			$("#infoenergy").modal('hide');
		}
	}, '#infoenergy');

	//go to step3 on ready
	if ($(".go-to-step-3").hasClass('triggerClick')) {
		$(".go-to-step-3").trigger("click");
	}
	$(".go-to-step-3").removeClass('triggerClick');
});

/******************************************************
*                    Class WebApi
******************************************************/
function WebApi() {
	this.urls = {
		ShowSubUnivers: "/Repository/showSubUnivers",
		ShowSections: "/Repository/showSections",
		ShowAttributes: "/Repository/ShowAttributesJson",
		ShowChildrenAttributes: "/Repository/ShowChildrenAttributesJson",
		GetPartyByEmailAndName: "/ClassifiedSubmit/GetPartyByEmailAndName",
		AutoCompleteZipCode: "ClassifiedSubmit/AutoCompleteZipCode",
		CreateClassified: "ClassifiedSubmit/Create",
		UpdateClassified: "ClassifiedSubmit/Update",
		availableUpsells: "ClassifiedSubmit/GetAvailableUpsells",
		AjaxAddOrderOrLine: "Article/AjaxAddOrderOrLine",
		AjaxDelOrderLine: "Article/AjaxDelOrderLineByPriceId",
		PayBoxModeCheck: "Payment/JsonPayBoxModeCheck",
		PayLineGetPaymentUrl: "Payment/PayLineGetPayment",
		ContactRegister: "Article/ContactRegister",
		DefineTips: "Repository/DefineTips",
		UploadPictures: "ClassifiedSubmit/UploadMulti",
		UploadPicture: "ClassifiedSubmit/Upload",
		RemovePicture: "ClassifiedSubmit/DeletePicture",
		ProfessionalPrice: "Repository/GetPriceProfessional",
		CalculateMandatoryUpsells: "ClassifiedSubmit/CalculateMandatoryUpsells",
		EmptyOrder: "Article/AjaxDelClassifiedOrder",
		LoginParty: "ClassifiedSubmit/LoginParty"
	};
	this.partyCreateUrls = { "part": "/ClassifiedSubmit/CreatePartyParticulier", "pro": "/ClassifiedSubmit/CreatePartyProfessional" };
}

WebApi.prototype.showSubUnivers = function (id) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ShowSubUnivers,
		data: { "universId": id },
		ResponseText: "json"
	});
};

WebApi.prototype.showSections = function (id) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ShowSections,
		data: { "subUniversId": id },
		ResponseText: "json"
	});
};

WebApi.prototype.showAttributes = function (universId, subUniversId, sectionId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ShowAttributes,
		data: { "catId": universId, "suId": subUniversId, "secId": sectionId },
		ResponseText: "json"
	});
};

WebApi.prototype.showChildrenAttributes = function (parentAttributeId, attributeValue) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ShowChildrenAttributes,
		data: { "parentAttributeId": parentAttributeId, "attributeValue": attributeValue },
		ResponseText: "json"
	});
};

WebApi.prototype.createParty = function (partyType, partyData, successCallback, errorCallback) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.partyCreateUrls[partyType],
		data: partyData,
		ResponseText: "json",
		error: function (reason) {
			errorCallback(reason);
		},
		success: function () {
			successCallback();
		}
	});
};

WebApi.prototype.loginParty = function (email, password, classifiedId, successCallback, errorCallback) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.LoginParty,
		data: {
			"email": email,
			"password": password,
			"classifiedId": classifiedId
		},
		ResponseText: "json",
		error: function (reason) {
			errorCallback(reason);
		},
		success: function (result) {
			successCallback(result);
		}
	});
};


WebApi.prototype.getPartyByEmailAndName = function (email, name) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.GetPartyByEmailAndName,
		data: {
			"email": email,
			"name": name
		},
		ResponseText: "json"
	});
};

WebApi.prototype.getZipCode = function (word) {
	return $.ajax({
		type: "GET",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.AutoCompleteZipCode + "?word=" + word + "&limit=30&timestamp=1430211623520",
		ResponseText: "json"
	});
};

WebApi.prototype.uploadImages = function (picturesFileList, guid) {
	return $.ajax({
		url: this.urls.UploadPictures + '?guid=' + guid,
		type: 'POST',
		data: picturesFileList,
		cache: false,
		dataType: 'json',
		ResponseText: "json",
		processData: false,
		contentType: false
	});
};

WebApi.prototype.uploadImage = function (pictureFile, guid) {
	return $.ajax({
		url: this.urls.UploadPicture + '?guidlogo=' + guid,
		type: 'POST',
		data: pictureFile,
		cache: false,
		dataType: 'json',
		ResponseText: "json",
		processData: false,
		contentType: false
	});
};

WebApi.prototype.removeImage = function (urlPicture, guid) {
	return $.ajax({
		type: 'POST',
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.RemovePicture + '?guid=' + guid,
		data: { "urlPicture": urlPicture },
		cache: false
	});
};

WebApi.prototype.getAvailableUpsells = function (subUniversId, profileType) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.availableUpsells,
		data: { "subUniversId": parseInt(subUniversId), "profileType": profileType },
		ResponseText: "json"
	});
};

WebApi.prototype.createClassified = function (classifiedJson, successCallback, errorCallback) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.CreateClassified,
		data: classifiedJson,
		ResponseText: "json",
		error: function (reason) {
			errorCallback(reason);
		},
		success: function (result) {
			successCallback(result);
		}
	});

};

WebApi.prototype.updateClassified = function (classifiedJson, successCallback, errorCallback) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.UpdateClassified,
		data: classifiedJson,
		ResponseText: "json",
		error: function (reason) {
			errorCallback(reason);
		},
		success: function (result) {
			successCallback(result);
		}
	});

};

WebApi.prototype.defineTips = function (subUniversId, sectionId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.DefineTips,
		data: { "subUniversId": subUniversId, "sectionId": sectionId },
		ResponseText: "json"
	});
};

WebApi.prototype.addOrderOrLine = function (classifiedId, priceId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.AjaxAddOrderOrLine,
		data: { "ClassifiedId": classifiedId, "priceId": priceId }
	});
};

WebApi.prototype.delOrderLine = function (id, classifiedId, isTelephone) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.AjaxDelOrderLine,
		data: { "priceId": id, "ClassifiedId": classifiedId, "isTelephone": isTelephone }
	});
};

WebApi.prototype.getProfessionalPrice = function (subUniversId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ProfessionalPrice,
		data: { "universId": subUniversId }
	});
};

WebApi.prototype.payBoxModeCheck = function (classifiedId, invoiceAddress, invoiceZipCode, invoiceCity, successCallback, errorCallback) {
	$.ajax({
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.PayBoxModeCheck,
		data: {
			"classifiedId": classifiedId,
			"payType": "CB",
			"address": invoiceAddress,
			"zipCode": invoiceZipCode,
			"city": invoiceCity,
			"printId": 0,
			"editionSuppId": 0,
			"IsMobile": false
		},
		error: function (reason) {
			errorCallback(reason);
		},
		success: function (result) {
			successCallback(result);
		}
	});
};

WebApi.prototype.getPaylineUrl = function (classifiedId, invoiceAddress, invoiceZipCode, invoiceCity, successCallback, errorCallback) {
	$.ajax({
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.PayLineGetPaymentUrl,
		type: "POST",
		timeout: 60000,
		data: {
			"classifiedId": classifiedId,
			"address": invoiceAddress,
			"zipCode": invoiceZipCode,
			"city": invoiceCity,
			"printId": 0,
			"editionSuppId": 0,
			"IsMobile": false
		},
		error: function (reason) {
			errorCallback(reason);
		},
		success: function (result) {
			successCallback(result);
		}
	});
};

WebApi.prototype.contactRegister = function (classifiedId, telephone, hiddeNumber) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.ContactRegister,
		data: { "classifiedId": classifiedId, "telephone": telephone, "hiddeNumber": hiddeNumber }
	});
};

WebApi.prototype.makeCalcMandatoryUpsells = function (classifiedId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.CalculateMandatoryUpsells,
		data: { "classifiedId": classifiedId }
	});
};

WebApi.prototype.cleanOrder = function (classifiedId) {
	return $.ajax({
		type: "POST",
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		url: this.urls.EmptyOrder,
		data: { "classifiedId": classifiedId }
	});
};
/******************************************************
*                    Class Uploader
******************************************************/
// Par défaut upload d'une photo
function Uploader(typeUpload) {
	this.carousel = new Carousel();
	this.typeUpload = typeUpload === undefined ? enum_typeUpload.Photos : typeUpload;
};

Uploader.prototype.guidGenerator = function () {
	var S4 = function () {
		return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1);
	};
	return (S4() + S4() + "-" + S4() + "-" + S4() + "-" + S4() + "-" + S4() + S4() + S4()).toUpperCase();
};

Uploader.prototype.prepareUpload = function () {

	var guid = undefined;
	switch (this.typeUpload) {
		case enum_typeUpload.Photos:
			{
				//Set or get the GUID
				guid = $("#PicturesGuid").length > 0 && $("#PicturesGuid").val().length > 0 ? $("#PicturesGuid").val() : this.guidGenerator();
				$("#PicturesGuid").val(guid);
				break;
			}
		case enum_typeUpload.Logo:
			{
				//Set or get the GUID
				guid = $("#LogoGuid").length > 0 && $("#LogoGuid").val().length > 0 ? $("#LogoGuid").val() : this.guidGenerator();
				$("#LogoGuid").val(guid);
				break;
			}
	}
	return guid;
};

Uploader.prototype.uploadSuccess = function (data) {
	switch (this.typeUpload) {
		case enum_typeUpload.Photos:
			{
				var actualPhotoCount = $(".photos .thumbnails-container .thumbnails-carousel li img").length;
				var c = this.carousel;
				$.each(data, function (k, v) {
					c.addPictureByUrl(v);
				});
				this.carousel.drawAllDefaultMiniatureBackground();
				this.carousel.drawAllPicture();
				var navClient = new Browser();
				if (!navClient.isLimitedBrowserVersion()) {
					$("#photoInput").replaceWith($("#photoInput").clone()); //reset... 
					$('#photoInput').on('change', function (event) {
						var upload = new Uploader(enum_typeUpload.Photos);
						upload.doUpload(event.target.files);
					});
				}
				break;
			}
		case enum_typeUpload.Logo:
			{
				console.log("Logo uploaded with success");
				$("#urlPicture").val(data.responseText);
				PartyForm.prototype.adaptLogoDom(data.responseText);
				break;
			}
	}
};

Uploader.prototype.uploadError = function (error) {
	console.log('ERRORS: ' + error);
};

Uploader.prototype.doUpload = function (files) {

	var guid = this.prepareUpload();
	switch (this.typeUpload) {
		case enum_typeUpload.Photos:
			{
				// Create a formdata object and add the files
				var classifiedPicturesData = new FormData();
				var nbPhotos = 0;
				$.each(files, function (key, value) {
					classifiedPicturesData.append(key, value);
					nbPhotos++;
				});
				if (nbPhotos > 0) {
					this.carousel.animateAnnoncePictureUpload(nbPhotos);
					var uploadResponse = commonWebApi.uploadImages(classifiedPicturesData, guid);
					var up = this;
					uploadResponse.success(function (data) {
						up.uploadSuccess(data);
					});
					uploadResponse.error(function (error) {
						up.uploadError(error);
					});
				}
				break;
			}
		case enum_typeUpload.Logo:
			{
				window.URL = window.URL || window.webkitURL;
				var imageType = /image.*/;
				if (!files[0].type.match(imageType)) {
					//todo display error
					return;
				}
				$("#guidlogo").val(Uploader.prototype.guidGenerator());
				var promise = sendFile();
				promise.always(function (data) {
					if (data.responseText !== "KO" && data.responseText !== "KO_TOOBIG") {
						console.log("Logo uploaded with success");
						$("#urlPicture").val(data.responseText);
						PartyForm.prototype.adaptLogoDom(data.responseText);
					}
					else {
						console.log("An error has occured during the upload of logo. " + data.responseText);
					}
				});
				break;
			}
	}
};

Uploader.prototype.doUploadify = function () {
	switch (this.typeUpload) {
		case enum_typeUpload.Photos:
			{
				var photoInputContainer = $('#photos-input-container');
				photoInputContainer.children().remove();
				var d = new Date();
				var n = d.getTime();
				photoInputContainer.append('<input type="file" id="photoInput' + n + '" name="files" multiple>')

				var upload = this;
				var guid = upload.prepareUpload();
				$('#photoInput' + n).uploadify({
					'swf': '/Content/swf/uploadify.swf',
					'uploader': commonWebApi.urls.UploadPictures + '?guid=' + guid,
					'fileType': 'image/*',
					'simUploadLimit': 1,
					'dnd': false,
					'buttonClass': 'btn btn-default btn-info btn-file btn-ta',
					'auto': true,
					"multi": false,
					'fileTypeDesc': 'Images',
					'fileTypeExts': '*.jpg; *.png',
					'removeCompleted': true,
					'buttonText': 'Ajouter une photo',
					'onUploadStart': function (nbPhotos) {
						upload.carousel.animateAnnoncePictureUpload(nbPhotos);
						return true;
					},
					'onUploadSuccess': function (file, data, response) {
						var jsonData = JSON.parse(data);
						upload.uploadSuccess(jsonData);
						return true;
					},
					'onUploaderror': function (file, data, response) {
						upload.uploadError(error);
						return true;
					},
					'onQueueComplete': function (queueData) {
						$('#photoInput' + n).uploadify('destroy');
						upload.doUploadify();
					}
				});
				$(".uploadify-button").css("width", "").css("height", "").css("line-height", "");
				break;
			}
		case enum_typeUpload.Logo:
			{
				var logoInputContainer = $('#logoDiv');
				logoInputContainer.children().remove();
				var d = new Date();
				var n = d.getTime();
				logoInputContainer.append('<input type="file" id="logoInput' + n + '" name="files" multiple >')

				var upload = this;
				var guid = upload.prepareUpload();
				$('#logoInput' + n).uploadify({
					'swf': '/Content/swf/uploadify.swf',
					'uploader': commonWebApi.urls.UploadPicture + '?guidlogo=' + guid,
					'fileType': 'image/*',
					'simUploadLimit': 1,
					'dnd': false,
					'buttonClass': 'btn btn-mini btn-file btn-ta',
					'auto': true,
					"multi": false,
					'fileTypeDesc': 'Images',
					'fileTypeExts': '*.jpg; *.png',
					'removeCompleted': true,
					'buttonText': 'Ajouter un logo',
					'onUploadStart': function (nbPhotos) {

						return true;
					},
					'onUploadSuccess': function (file, data, response) {
						var d = { responseText: data };
						upload.uploadSuccess(d);
						return true;
					},
					'onUploaderror': function (file, data, response) {
						upload.uploadError(error);
						return true;
					},
					'onQueueComplete': function (queueData) {
						$('#logoInput' + n).uploadify('destroy');
						$('#logoInput' + n).remove();
						// upload.doUploadify();
					}
				});
				$(".uploadify-button").css("width", "").css("height", "").css("line-height", "");
				break;
			}
	}
};


/******************************************************
*                    Class PartyForm
******************************************************/
function PartyForm(type, rawPartyForm) {
	if (rawPartyForm === undefined || rawPartyForm === null) {
		console.log("rawPartyForm !== undefined || rawPartyForm !== null");
		return;
	}
	var partyFormJson = rawPartyForm.serializeObject();
	this.partyJsonHonest = null;
	if (type !== undefined || type !== null) {
		var partyJson = {};
		if (type === "pro") {
			partyJson.email = partyFormJson.Email;
			partyJson.name = partyFormJson.Name;
			partyJson.companyName = partyFormJson["InfoPro.CompanyName"];
			partyJson.address = partyFormJson["InfoPro.Address"];
			partyJson.siret = partyFormJson["InfoPro.Siret"];
			partyJson.webSite = partyFormJson["InfoPro.Website"];
			partyJson.guid = partyFormJson["InfoPro.Guid"];
			partyJson.logoPicture = partyFormJson["InfoPro.LogoPicture"];
			partyJson.publicPath = partyJson.logoPicture;
			partyJson.physicalPath = partyJson.logoPicture;
			this.partyJsonHonest = partyJson;
		} else if (type === "part") {
			partyJson.email = partyFormJson.Email;
			partyJson.name = partyFormJson.Name;
			this.partyJsonHonest = partyJson;
		}
		else {
			console.log("type unknown.");
		}
	}
}

PartyForm.prototype.adaptParticularFormToFacebookLoggedDom = function (profilPictureUrl) {
	$("#container-login-ispart").children("#particularPartyForm").css('display', 'none');
	$("#container-login-ispart").children("#labelLoginFacebook").css('display', 'none');
	$(".facebook").css("display", "none");
	$("#container-login-ispart").append(HtmlConstructor.prototype.buildFacebookInformationsBlock());
	HtmlConstructor.prototype.appendFacebookProfilPicture(profilPictureUrl);
	$("#container-login-ispart").find("#Name").val(global.facebookUser.name);
	$("#container-login-ispart").find("#Email").val(global.facebookUser.email);
	$("#profilInformations").append(global.facebookUser.name);

};

PartyForm.prototype.adaptParticularFormToFacebookLoggedOutDom = function (profilPictureUrl) {
	//$("#profilInformations").css("display", "none");
	//$("#facebookProfilPicture").css("display", "none");
	$("#facebookLogout").remove();
	$("#profilInformations").remove();
	$("#facebookProfilPicture").remove();
	$("#container-login-ispart").children("#particularPartyForm").css('display', 'block');
	$("#container-login-ispart").children("#labelLoginFacebook").css('display', 'block');
	$(".facebook").css("display", "block");
	$(".facebook").removeClass("disabled");
	$("#container-login-ispart").find("#Name").val("");
	$("#container-login-ispart").find("#Email").val("");
};

//PartyForm.prototype.handleLogo = function (file) {

//};

PartyForm.prototype.adaptLogoDom = function (logoUrl) {
	$("#logoDiv").append('<span id="logoSpan"></span>');
	var logoSpan = $("#logoSpan");
	logoSpan.append('<img id="logoImg" class="cleanableImg logo-obj img-thumbnail"/>');

	var img = $("#logoImg");
	img.attr("src", global.ENV.dev ? window.URL.createObjectURL($("#logoInput")[0].files[0]) : logoUrl);
	img.on("load", function (e) {
		if (global.ENV.dev) {
			window.URL.revokeObjectURL($(this).attr("src"));
		}
	});

	logoSpan.append('<span id="deleteLogo" class="icon-croix clearable"></span>');
	$("#logoSpanButton").css("display", "none");

	/******************************************************
    *               Delete image event
    ******************************************************/
	$("#deleteLogo").on("click", function () {
		var promise = deleteLogo();
		promise.always(function (result) {
			if (result === "OK") {
				$("#logoSpan").remove();
				$("#logoDiv").empty();
				if ($("#logoDiv").children('#logoSpanButton').length > 0) {
					$("#logoSpanButton").css("display", "initial");
				}
				else {
					$("#logoDiv").html('<span id="logoSpanButton" class="btn btn-mini btn-file btn-ta">Ajouter un logo<input type="file" id="logoInput" name="logo" accept="image/*"></span>');
				}

				var navClient = new Browser();
				var uploadLogo = new Uploader(enum_typeUpload.Logo);
				$('#logoInput').on('change', function () {
					if (!navClient.isLimitedBrowserVersion()) {
						uploadLogo.doUpload(this.files);
					}
					else {
						uploadLogo.doUploadify();
					}
				});
				$("#guidlogo").val("");
				$("#urlPicture").val("");
			}
		});
	});
};

function sendFile() {
	if ($("logoInput") === undefined) {
		return false;
	}
	var file = null;
	var guid = $("#guidlogo").val();
	try {
		file = $("#logoInput")[0].files[0];
	}
	catch (e) {
		console.log(e);
	}

	return uploadLogo(file, guid);
}

function uploadLogo(file, guid) {
	data = new FormData();
	data.append("Filedata", file);
	return (new WebApi().uploadImage(data, guid));
}

function deleteLogo() {
	deleteRemoteImage(document.getElementById("logoImg").src, $("#guidlogo").val());
}

function deleteRemoteImage(urlPicture, guid) {
	return (new WebApi().removeImage(urlPicture, guid));
}

function getUrlToDevEnvironment(logoUrl) {
	var logoUrlSize = logoUrl.length;
	var pos = logoUrl.indexOf("/depot/");
	var localPath = "file:///C:/wamp/www";
	var urlDevEnvironment = localPath + logoUrl.substring(pos, logoUrlSize);
	return urlDevEnvironment;
}


/******************************************************
*                    Class Classified
******************************************************/
function ClassifiedServerModel() {
	this.City = null;
	this.Email = null;
	this.Name = null;
	this.IsPro = null;
	this.Sections = null;
	this.SectionsName = null;
	this.SubUnivers = null;
	this.subUniversName = null;
	this.Univers = null;
	this.UniversName = null;
	this.ZipCode = null;
	this.Pictures = null;
	this.Update = null;
	this.Password = null;
	this["InfoClassified.Description"] = null;
	this["InfoClassified.Title"] = null;
	this["InfoClassified.ClassifiedType"] = null;
	this["InfoClassified.Price"] = null;
	this["InfoClassified.Guid"] = null;
}

function Classified() {

}

Classified.prototype.createClassifiedFromClassifiedFormJson = function (objectJson) {
	//Json Classified to Class Classified => TopAnnonces.Designer.cs
	var classified = new ClassifiedServerModel();
	classified.Update = false;
	classified.City = objectJson.City;
	if (partyJson != null) {
		classified.Email = partyJson.email;
		classified.Name = partyJson.name;
	}
	if (Classified.prototype.partyIsPro() && partyJson != null && partyJson.siret !== undefined) {
		classified["InfoPro.Address"] = partyJson.address;
		classified["InfoPro.Guid"] = partyJson.guid;
		classified["InfoPro.Siret"] = partyJson.siret;
		classified["InfoPro.Website"] = partyJson.website;
		classified["InfoPro.CompanyName"] = partyJson.companyName;
		classified.IsPro = true;
	} else {
		classified.IsPro = false;
	}
	classified.Sections = objectJson.Sections;
	classified.SectionsName = objectJson.SectionsName;
	classified.SubUnivers = objectJson.SubUnivers;
	classified.subUniversName = objectJson.subUniversName;
	classified.Univers = objectJson.Univers;
	classified.UniversName = objectJson.UniversName;
	classified.ZipCode = objectJson.ZipCode;
	classified.Pictures = objectJson.Pictures;
	classified["InfoClassified.Guid"] = objectJson["InfoClassified.Guid"];

	$.each(objectJson, function (key, value) {
		if (key.indexOf('attributes-') >= 0) {
			var keyval = key.split('-')[1];
			var finalValue = value;
			if (value.indexOf("|") > -1) {
				finalValue = value.split("|")[1];
			}
			classified["attr-" + keyval] = finalValue;
			classified[key] = finalValue;
		}
	});

	classified["InfoClassified.Description"] = objectJson["InfoClassified.Description"];
	classified["InfoClassified.Title"] = objectJson["InfoClassified.Title"];
	classified["InfoClassified.ClassifiedType"] = objectJson["InfoClassified.ClassifiedType"];
	classified["InfoClassified.Price"] = objectJson["InfoClassified.Price"].replace('.', ',');

	return classified;
};


Classified.prototype.updateClassifiedFromClassifiedFormJson = function (objectJson) {
	//Json Classified to Class Classified => TopAnnonces.Designer.cs
	var classified = new ClassifiedServerModel();
	if ($("input[name='IsPro']").length == 0 || $("input[name='IsPro']").css("display") == "none") {
		classified.Email = $("#Email").val();
		classified.Password = $("#Password").val();
	}
	classified.Update = true;
	classified.City = objectJson.City;
	classified.ZipCode = objectJson.ZipCode;
	classified["InfoClassified.Id"] = objectJson["InfoClassified.Id"];
	classified["InfoClassified.Description"] = objectJson["InfoClassified.Description"];
	classified["InfoClassified.Title"] = objectJson["InfoClassified.Title"];
	classified["InfoClassified.ClassifiedType"] = objectJson["InfoClassified.ClassifiedType"];
	classified["InfoClassified.Price"] = objectJson["InfoClassified.Price"].replace('.', ',');
	classified.Pictures = objectJson.Pictures;
	classified["InfoClassified.Guid"] = objectJson["InfoClassified.Guid"];
	return classified;
}

/**
 * Recherche si le champ sur lequel on veut afficher la tooltip 
 * possède un logo afin de décaler ou non la tooltip
 * @param {HtmlElement} elementToTest 
 * @return {htmlElement}
 */
Classified.prototype.getElementToApplyTooltipError = function (elementToTest) {
	if ($(elementToTest).hasClass('step1')) {
		return $(elementToTest).siblings(".input-group-addon");
	}
	if ($(elementToTest).siblings(".input-group-addon").length > 0) {
		return $(elementToTest).parents(".mandatory");
	}
	else if ($(elementToTest).siblings(".input-group-btn").length > 0) {
		return $(elementToTest).parents(".input-group");
	}
	else if ($(elementToTest).is("li a")) {
		return $(elementToTest).parents(".mandatory").find("");
	}
	else {
		return $(elementToTest);
	}
};

Classified.prototype.filterSubunivers = function (subUnivers) {

	var filteredSubunivers = new Array();
	$.each(subUnivers, function (index, sub) {
		switch (sub.Value) {
			case "398":
			case "400":
			case "402":
			case "406":
				if (Classified.prototype.partyIsPro()) {
					filteredSubunivers.push(sub);
				}
				break;
			default:
				filteredSubunivers.push(sub);
		}
	});
	return filteredSubunivers;
};

Classified.prototype.getSubUnivers = function (id) {
	var request = commonWebApi.showSubUnivers(id);
	request.success(function (subUnivers) {
		Classified.prototype.adaptSubUniversDom(Classified.prototype.filterSubunivers(subUnivers));
		Listener.prototype.bindFieldsValidationListenerOn(".mandatory input, .mandatory textarea", "focusout");
		HtmlConstructor.prototype.addPlaceholder();
	});
	request.error(function (subUnivers) {
		console.warn("Request pass to .error(). Maybe because subUnivers is empty ? subUnivers === null || subUnivers === undefined : " + (subUnivers === undefined || subUnivers === null));
	});
};

Classified.prototype.getSections = function (id) {
	var request = commonWebApi.showSections(id);
	request.success(function (sections) {
		global.sections = sections;
		if (global.sections[0] !== undefined) {
			fillTipsBySubUniversIdAndSectionsId(id, sections[0].Value);
		}
		else {
			fillTipsBySubUniversIdAndSectionsId(id, null);
		}
		Classified.prototype.adaptSectionsDom(sections);
		Listener.prototype.bindFieldsValidationListenerOn(".mandatory input, .mandatory textarea", "focusout");
		$(".dropdown-menu li a").on("click", function () {
			var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
			var fieldValidator = new FieldValidator(inputAssociated);
			fieldValidator.isValidField();
		});
	});
};

Classified.prototype.getUpsells = function (subUniversId, profilType, showUpsellsPanel) {
	var request = commonWebApi.getAvailableUpsells(subUniversId, profilType);
	request.success(function (upsells) {
		$(".upsells-container").children().remove();
		global.upsellsLoaded = true;
		$(upsells).each(function (index) {
			if (this.Id !== global.phoneUpsellId) {
				$(".upsells-container").append(Classified.prototype.makeUpsell(this));
				Classified.prototype.bindListenerUpsellsPopupClick(this);
			}
		});

		if ($(".upsells-container").length > 0) {
			if (showUpsellsPanel) {
				$("#etape3").slideDown("slow");
				Classified.prototype.bindListenerUpsellsOptionClick();
			}
		} else {
			$("#etape3").slideUp("slow");
		}
		if (profilType === 2) Classified.prototype.getAndAutoAddProfessionalUpsell(subUniversId);
	});
	request.error(function (sections) {
		console.warn("Request pass to .error(). Maybe because sections is empty ? sections === null || sections === undefined : " + (sections === undefined || sections === null));
	});
};


Classified.prototype.getAndAutoAddProfessionalUpsell = function (subUniversId) {

	var request = commonWebApi.getProfessionalPrice(subUniversId);
	request.success(function (price) {
		$("#bill-line-" + global.proUpsellId).remove();
		$(".recap-annonce table tbody").append(Classified.prototype.makeBillingLine(global.proUpsellId, "Dépot professionnel", "Diffusion pendant 4 semaines", price + "&nbsp;&euro;", false));
		Classified.prototype.setTotalUpSells();
		$(".recap-annonce").slideDown("slow");
		$(".billing-off").slideDown("slow");
	});
};


Classified.prototype.getAttributes = function (universId, SubUniversId, sectionId, attrValues) {
	var request = commonWebApi.showAttributes(universId, SubUniversId, sectionId, attrValues);
	request.success(function (attr) {
		Classified.prototype.adaptAttributesSectionsDom(attr, $(".contentAttributes"));
		Listener.prototype.bindAttributesShowChildrenListenerOnClick();
		Listener.prototype.bindFieldsValidationListenerOn(".mandatory input, .mandatory textarea", "focusout");
		$(".dropdown-menu li a").on("click", function () {
			var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
			var fieldValidator = new FieldValidator(inputAssociated);
			fieldValidator.isValidField();
		});
		HtmlConstructor.prototype.addPlaceholder();
		HtmlConstructor.prototype.addConstraintNumberOnly(new Array('#Surface', '#Kilometrage', '#Anneedumodele', '#Cylindree'), false);

		$('#selectBienencopropriete').trigger('click');
		$('#selectSoumisauDPE').trigger('click');
		$('#selectTypedusage').trigger('click');
		$('#selectAfficherenvaleur').trigger('click');

	});
	request.error(function (attr) {
		console.warn("Request pass to .error(). Maybe because attr is empty ? attr === null || attr === undefined : " + (attr === undefined || attr === null));
	});
};

/******************************************************
*              Class Classified - Modif DOM
******************************************************/
Classified.prototype.adaptSubUniversDom = function (subUnivers) {
	if (null !== subUnivers && subUnivers !== "") {
		$("#SubUniversPart").removeClass('hidden');
		for (var i = 0; i < subUnivers.length; i++) {
			$("#selectSubUnivers").append('<li><a href="#" role="menuitem" data-id="' + subUnivers[i].Value + '">' + subUnivers[i].Text + '</a></li>');
		}
		var autocompleteList = new ListFilter();
		autocompleteList.useUlElementsCollection($("#selectSubUnivers")[0]);
		$('#SubUniversName.listInputSearch').keyup(function () {
			$(autocompleteList.htmlListToUse).parent().addClass("open");
			$(autocompleteList.htmlListToUse).siblings(".dropdown-toggle").attr("aria-expanded", "true");
			var searchKey = $(this).val();
			autocompleteList.filterList(searchKey);
		});
		//Oblige l'utilisateur à cliquer sur une valeur de la liste pour remplir champs
		$('#SubUniversName.listInputSearch').blur(function () {
			var self = this;
			if ($('#SubUnivers').val() === undefined || $('#SubUnivers').val() === "") {
				$(self).val("");
				setTimeout(function () {

					//Rétablie les valeurs par défault
					autocompleteList.filterList("");
				}, 100);
			}
		});
		Classified.prototype.bindListenerOnDropdownLinksClick();
		Classified.prototype.bindListenerOnDropdownSubUniversLinksClick();
	}
};

Classified.prototype.adaptSectionsDom = function (sections) {
	if (null !== sections && sections !== "") {
		$("#SectionsPart").removeClass('hidden');
		for (var i = 0; i < sections.length; i++) {
			$("#selectSections").append('<li><a href="#" role="menuitem" data-id="' + sections[i].Value + '">' + sections[i].Text + '</a></li>');
		}
		var autocompleteList = new ListFilter();
		autocompleteList.useUlElementsCollection($("#selectSections")[0]);
		$('#SectionsName.listInputSearch').keyup(function () {
			$(autocompleteList.htmlListToUse).parent().addClass("open");
			$(autocompleteList.htmlListToUse).siblings(".dropdown-toggle").attr("aria-expanded", "true");
			var searchKey = $(this).val();
			autocompleteList.filterList(searchKey);
		});
		//Oblige l'utilisateur à cliquer sur une valeur de la liste pour remplir champs
		$('#SectionsName.listInputSearch').blur(function () {
			var self = this;
			if ($('#Sections').val() === undefined || $('#Sections').val() === "") {
				$(self).val("");
				setTimeout(function () {

					//Rétablie les valeurs par défault
					autocompleteList.filterList("");
				}, 150);
			}
		})
		Classified.prototype.bindListenerOnDropdownLinksClick();
		Classified.prototype.bindListenerOnDropdownSectionsLinksClick();
	}
};

Classified.prototype.adaptAttributesSectionsDom = function (attr, containerSelector) {
	containerSelector.removeClass('hidden');
	var html = null;
	var occultedAttr = false;
	for (var i = 0; i < attr.length; i++) {

		if (attr[i].Name.toLowerCase() == "chauffage" && $('#Univers').val() == "10") {
			occultedAttr = true;
			containerSelector.append("<div id='occultediv' class='text-primary'><div id='occulte-plus-moins'>+</div><div id='occulteAttr'>Je souhaite donner plus de details</div></div>");
		}

		html = Classified.prototype.makeContentAttributesDiv(attr[i], i, occultedAttr);
		containerSelector.append(html);
		if (attr[i].DropDownSelectList !== null && attr[i].DropDownSelectList.length > 0) {
			fillDropDownListOf(attr[i]);
		}
		$('#energyRep').tooltip({
			animation: true,
			html: true,
			placement: 'right',
		});
		$('#infoProc').tooltip({
			animation: true,
			html: true,
			placement: 'right',
		});

	}
	if (occultedAttr) {
		$('#occulteAttr').trigger('click');
		containerSelector.append("<hr>");
	}

	function fillDropDownListOf(element) {
		if (element === undefined || element === null)
			throw new Error("Invalid arguments");
		var elementName = element.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "");
		var htmlSelector = "#select" + elementName;

		if (elementName === "Etage") {
			element.DropDownSelectList.sort(function (a, b) {
				var regA = parseInt(a.Text.match(/([0-9]*)/i)[0]);
				var regB = parseInt(b.Text.match(/([0-9]*)/i)[0]);
				if (isNaN(regA)) regA = 0;
				if (isNaN(regB)) regB = 0;
				if (regA > regB)
					return 1;
				if (regA < regB)
					return -1;
				// a doit être égale à b
				return 0;
			});
		}
		for (var i = 0; i < element.DropDownSelectList.length; i++) {
			$(htmlSelector).append('<li><a href="#" role="menuitem" data-id="' + element.DropDownSelectList[i].Value + '">' + element.DropDownSelectList[i].Text + '</a></li>');
		}
		var autocompleteList = new ListFilter();
		autocompleteList.useUlElementsCollection($(htmlSelector)[0]);
		var inputAssociatedId = $(htmlSelector).parent().siblings("input").attr("id");
		$("#" + inputAssociatedId).keyup(function () {
			$(autocompleteList.htmlListToUse).parent().addClass("open");
			$(autocompleteList.htmlListToUse).siblings(".dropdown-toggle").attr("aria-expanded", "true");
			var searchKey = $(this).val();
			autocompleteList.filterList(searchKey);
		});
		//Oblige l'utilisateur à cliquer sur une valeur de la liste pour remplir champs
		$("#" + inputAssociatedId).focusout(function () {
			var self = this;
			var cleanElementName = element.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "");
			if ($('#attributes-' + cleanElementName).val() === undefined || $('#attributes-' + cleanElementName).val() === "") {
				$(self).val("");
				setTimeout(function () {
					//Rétablie les valeurs par défault
					autocompleteList.filterList("");
				}, 150);
			}
		})
		Classified.prototype.bindListenerOnDropdownLinksClick();
	}
};

Classified.prototype.makeContentAttributesDiv = function (attr, id, occult) {

	var html = '<div class="form-group ' + (attr.IsRequired ? "mandatory" : "") + (attr.HasChild ? " has-child" : "") + (occult ? "occulted" : "") + '">';
	if ((attr.Name.indexOf('DPE') > -1 || attr.Name.indexOf('GES') > -1) && $('#Univers').val() == "10") {
		html += "<div id='energyinfo' title='En savoir plus'>?</div>";
	}
	else if (attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") == "RepresentantLegal") {
		html += "<div id='energyRep' title = 'Mandataire Ad Hoc ou Administrateur provisoire'>?</div>";
	}
	else if (attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") == "Evolutionprocedure") {
		html += "<div id='infoProc' title = 'Statut actuel de la copropriété'>?</div>";
	}

	var lab = attr.Name.replace(/\s\?/g, '&nbsp;?');
	var reg = /\([a-zA-Z$€%\s]*\)/.exec(lab);
	var bloc = "";

	if (reg != null) {
		bloc = reg[0];
	}
	html += '<label for="' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + 'Name" class="text-primary control-label col-md-4">' + lab.replace(bloc, bloc.replace(/\s/, '&nbsp;')) + '&nbsp;:</label>';

	html += '<div class="col-md-7">';

	if (attr.DropDownSelectList !== null && attr.DropDownSelectList.length > 0) {
		html += Classified.prototype.makeContentAttributesForDropDownList(attr, id);
	}
	else {
		html += Classified.prototype.makeContentAttributesForInput(attr, id);
	}
	html += '</div>';
	html += '</div>';

	return html;
};

Classified.prototype.makeContentAttributesForDropDownList = function (attr, id) {
	var html = '<input id="attributes-' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + '" type="hidden" value="" name="attributes-' + attr.Id + '" class="attribute-real-id">';
	html += '<div class="input-group">';
	html += '<input id="' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + 'Name" type="text" class="form-control listInputSearch" placeholder="' + attr.Name + (attr.IsRequired ? ' *' : '') + '" name="' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + '">';
	html += '<div class="input-group-btn">';
	html += '<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
	html += '<span class="caret"></span>';
	html += '</button>';
	html += '<ul id="select' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + '" class="dropdown-menu dropdown-menu-right scrollable-list" role="menu">';
	html += '</ul>';
	html += '</div>';
	html += '</div>';
	return html;
};

Classified.prototype.makeContentAttributesForInput = function (attr, id) {
	var htmlAttribute = '';
	htmlAttribute = 'min=' + attr.MinValue + ' ';

	if (attr.Name === "Année du modèle") {
		htmlAttribute += 'max=' + new Date().getFullYear() + ' ';
	} else if (attr.MaxValue !== 0) {
		htmlAttribute += 'max=' + attr.MaxValue + ' ';
	}

	if (attr.MaxLength !== 0) {
		htmlAttribute += 'maxlength=' + attr.MaxLength + ' ';
	}
	if (attr.MinLength !== 0) {
		htmlAttribute += 'minlength=' + attr.MinLength + ' ';
	}
	var inputType = 'text';
	if (attr.DataType === 1) {
		inputType = 'number';
	}
	return '<input id="' + attr.Name.replace(/ /g, '').removeDiatrics().replace(/[^A-Za-z0-9]/g, "") + '" name="attributes-' + attr.Id + '" placeholder="' + attr.Name + (attr.IsRequired ? ' *' : '') + '" type="' + inputType + '" class="form-control" ' + htmlAttribute + '>';
};

Classified.prototype.makeUpsell = function (upsell) {

	var subtitle = $.parseHTML(upsell.Subtitle); //Hugly but keep mobile ISO

	var vHtml = '<div class="row upsell-container">';
	vHtml += '  <div class="col-md-2 col-xs-2">';
	if (upsell.PathLogo !== null) {
		vHtml += '      <img src="/' + upsell.PathLogo.replace(".gif", ".png") + '" class="img-responsive">';
	}
	vHtml += '  </div>';
	vHtml += '  <div class="col-md-6 col-xs-6 upsells-description">';
	vHtml += '      <div class="row text-primary"><strong>' + upsell.Title;
	var subtitleText = "";
	if (upsell.Subtitle !== null) {
		subtitleText = $(subtitle[0]).text();
		if (subtitle[0].className !== undefined && subtitle[0].className === "nbre-acheteur") {
			vHtml += ', <span class="text-secondary">soit ' + subtitleText + '</span>';
			subtitleText = subtitle[2].data;
		}
	}
	vHtml += '</strong></div>';
	vHtml += '      <div class="row text-black">' + subtitleText + '</div>';
	vHtml += '  </div>';
	vHtml += '  <div class="col-md-4 col-xs-4">';
	vHtml += '      <div class="row">';
	vHtml += '          <div class="col-md-offset-1 col-md-6 col-xs-offset-1 col-xs-11"><strong>' + upsell.LabelMinPrice + '</strong></div>';
	vHtml += '          <div class="col-md-5 col-xs-offset-1 col-xs-11"><strong><a id="upsell-know-more-' + upsell.Id + '" href="#" class="text-secondary know-more-link">En savoir plus</a></strong></div>';
	vHtml += '      </div>';
	vHtml += '      <div class="row">';
	vHtml += '          <div class="col-md-offset-1 col-md-2 col-xs-offset-1 col-xs-2">';
	vHtml += '              <div class="rounded-checkbox">';
	vHtml += '                  <input type="checkbox" value="None" id="upsell-' + upsell.Id + '" name="upsell-' + upsell.Id + '" class="upsell">';
	vHtml += '                  <label for="upsell-' + upsell.Id + '"></label>';
	vHtml += '               </div>';
	vHtml += '          </div>';
	vHtml += '          <div class="col-md-9 col-xs-9 text-left rounded-label text-black">';
	vHtml += '               <label for="upsell-' + upsell.Id + '"><strong>Ajouter à mon annonce</strong></label>';
	vHtml += '          </div>';
	vHtml += '      </div>';
	vHtml += '      <div id="upsell-options-' + upsell.Id + '" class="opt-view">';
	vHtml += '              <div class="col-md-12 col-xs-12 text-primary text-center"><strong>Choisissez une option</strong></div>';

	$(upsell.ListPrices).each(function () {
		vHtml += '              <div class="col-md-12 col-xs-12">';
		vHtml += '                  <label for="upsell-options-' + upsell.Id + '-' + this.PriceId + '" class="text-black">';
		vHtml += '                      <input id="upsell-options-' + upsell.Id + '-' + this.PriceId + '" name="upsell-options-' + upsell.Id + '" type="radio" value="' + this.PriceId + '" class="upsell-options">';
		vHtml += '                      <small>' + this.Label + ' : ' + this.Value + '&nbsp;&euro;</small>';
		vHtml += '                  </label>';
		vHtml += '          </div>';
	});


	vHtml += '      </div>';
	vHtml += '  </div>';
	vHtml += '</div>';
	vHtml += '<hr>';
	return vHtml;
};

Classified.prototype.makeUpsellPopup = function (upsell) {

	var subtitle = $.parseHTML(upsell.Subtitle); //Hugly but keep mobile ISO

	var upsellsLongText = {
		"html-upsell-1": "<p>Afin de mettre en valeur votre annonce et la démarquer des autres, vous avez la possibilité que celle-ci apparaisse<strong> sur fond bleu avec une ombre portée, accentuant sa visibilité dans les pages de résultats d'annonces.</strong> Vous pouvez choisir cette option pour une durée d’une semaine (la première semaine de parution de votre annonce) ou huit semaines (toute la durée de parution de votre annonce).</p>",
		"html-upsell-2": "<p>Au bout de votre premi&egrave;re semaine de parution ou chaque semaine, votre annonce remonte en haut de la page de r&eacute;sultat d\'annonce.</p><p><strong>Votre annonce est ainsi plus visible, comme si elle venait d\'&ecirc;tre diffus&eacute;e.</strong></p>",
		"html-upsell-5": "<strong>Comment ça marche ?</strong><p>En fonction des critères choisis lors d'une recherche sur le site (rubrique, région.) votre annonce apparaîtra aléatoirement dans l'emplacement &laquo;Annonces à la Une&raquo; sur toutes les listes d'annonces correspondantes.</p><p><small>Ex : si vous recherchez une maison à Lyon, des annonces de «maison» à &laquo;Lyon&raquo; s'afficheront dans l'emplacement &laquo;Annonces à la Une&raquo;.</small></p><strong>Comment prendre cette option ?</strong><p>Lors de votre dépôt d'annonce, choisissez l'option &laquo;Annonces à la une&raquo; parmi nos différentes options de diffusion. L'ajout d'une photo à votre annonce est fortement conseillé pour cette option.</p><p>L'option Annonce à la une vous sera facturée 8 € TTC pour une durée d'une semaine ou 30 € TTC pour toute la durée de parution de votre annonce (soit 34 € d'économie).</p><p>Professionnels, cette option vous sera facturée 10 € HT pour une durée d'une semaine ou 30 € HT pour toute la durée de parution de votre annonce.</p>"
	};

	var subtitleText = "";
	var tooltipText = null;
	if (upsell.Subtitle !== null) {
		subtitleText = subtitle[0].textContent;
		if (subtitle[0].className !== undefined && subtitle[0].className === "nbre-acheteur") {
			tooltipText = subtitleText;
		}
	}

	var vHtml = '<div class="popup row" id="popup-upsell-' + upsell.Id + '" >';
	vHtml += '       <div class="col-md-12">';
	vHtml += '           <div class="popup-full-title row">';
	vHtml += '               <div class="col-md-offset-1 col-md-2"><img src="/' + upsell.PathLogo.replace(".gif", ".png") + '" class="img-responsive"/></div>';
	vHtml += '               <div class="col-md-9 text-black">';
	vHtml += '                   <div class="row">' + upsell.Title + '</div>';
	vHtml += '                   <div class="row">' + upsell.LabelMinPrice + '</div>';
	vHtml += '               </div>';
	vHtml += '           </div>';
	vHtml += '           <div class="row popup-advantage"';

	if (tooltipText !== null) vHtml += ' data-toggle="tooltip" data-placement="bottom" title="' + tooltipText + '"';

	vHtml += '>';
	vHtml += '               <div class="col-md-12">' + upsellsLongText['html-upsell-' + upsell.Id] + '</div>';
	vHtml += '           </div>';
	vHtml += '           <div class="popup-exemple row"><div class="col-md-12">Voici un exemple :</div></div>';
	vHtml += '           <div class="row"><div class="col-md-offset-3 col-md-6"><img src="/' + upsell.PathLogo.replace(".gif", ".png").replace("picto-", "demo-") + '" class="img-responsive"/></div></div>';
	vHtml += '       </div>';
	vHtml += '</div>';
	return vHtml;
};

Classified.prototype.makeBillingLine = function (id, offre, type, prix, allowRemove) {
	var vHtml = '<tr id="bill-line-' + id + '" class="bill-line">';
	vHtml += '<td class="offer">' + offre + '</td>';
	vHtml += '<td class="type">' + type + '</td>';
	vHtml += '<td class="price text-right"><span class="priceasnumber">' + prix + "</span>" + (Classified.prototype.partyIsPro() ? " H.T" : " T.T.C") + '</td>';
	vHtml += '<td>';
	if (allowRemove) {
		vHtml += '<button class="btn btn-link btn-remove col-xs-12 text-secondary btn-remove-bill-line">';
		vHtml += '<span class="icon-croix"></span>&nbsp;Supprimer';
	} else {
		vHtml += '&nbsp;';
	}
	vHtml += '</button>';
	vHtml += '</td>';
	vHtml += '</tr>';
	return vHtml;
};

Classified.prototype.makePaymentForm = function (orderNumber) {
	var vHtml = '<form method="POST" name="formPayment" id="formPaymentCARTE" action="/paybox/modulev3.exe">';
	vHtml += '<input type="hidden" value="13" name="PBX_MODE">';
	vHtml += '<input type="hidden" value="C:\\TopAnnonces\\Temp\\' + orderNumber + '.ini" name="PBX_OPT">';
	vHtml += '<input type="hidden" value="CARTE" name="PBX_TYPEPAIEMENT">';
	vHtml += '<input type="hidden" value="CB" name="PBX_TYPECARTE">';
	vHtml += '</form>';
	return vHtml;
};

Classified.prototype.bindListenerUpsellsPopupClick = function (upsell) {
	$("#etape3 #upsell-know-more-" + upsell.Id).on('click', function (event) {
		event.preventDefault();
		if ($(".popup").length > 0)
			$(".popup").remove();

		$(document.body).append("<div class=\"wrapper\">&nbsp;</div>");
		var wrapper = $(document.body).children(".wrapper");
		wrapper.height($(document.body).height());
		$(document.body).append(Classified.prototype.makeUpsellPopup(upsell));
		$("#popup-upsell-" + upsell.Id).center();
		$("#popup-upsell-" + upsell.Id).slideDown("slow");

		wrapper.on("click", function (event) {
			$("#popup-upsell-" + upsell.Id).slideUp("slow", function () { wrapper.remove(); $(this).remove(); });
		});
		$("#popup-upsell-" + upsell.Id).on("click", function (event) {
			$("#popup-upsell-" + upsell.Id).slideUp("slow", function () { wrapper.remove(); $(this).remove(); });
		});

		$(".popup-advantage").tooltip({ trigger: 'manual' }).tooltip('show');

	});
};

Classified.prototype.bindListenerUpsellsOptionClick = function () {

	$("#etape3 .upsell").on('click', function () {
		var showOptions = $(this).prop("checked");
		var currentUpsell = $(this).parents(".upsell-container");
		var currentUpsellOption = currentUpsell.find(".opt-view");
		if (showOptions)
			$(currentUpsellOption).slideDown("slow", function () { $(currentUpsellOption).css('display', 'inline-block'); });
		else {
			$(currentUpsellOption).slideUp("slow");
			currentUpsellOption.find("input:checked").each(function () {
				$(this).prop('checked', false);
			});
			var billLineId = currentUpsellOption.attr("id").replace("upsell-options-", "");
			$(".recap-annonce #bill-line-" + billLineId).remove();
			if ($(".recap-annonce table tbody tr").length === 0) {
				$(".billing-off").slideUp("slow");
				$(".recap-annonce").slideUp("slow");
			}
		}
	});

	$("#etape3 .upsell-options").on('change', function () {
		$(".upsell-options").attr('disabled', true);
		var classified = new Classified();
		var currentUpsell = $(this).parents(".upsell-container");
		var rawUpsellTitle = currentUpsell.find(".upsells-description .text-primary").text();
		var offre = $.trim(rawUpsellTitle.split(",")[0]);
		var rawType = $(this).parent().text();
		var rawTypeTab = rawType.split(":");
		var type = $.trim(rawTypeTab[0]);
		var prix = $.trim(rawTypeTab[1]);
		var id = $(this).attr("name").replace("upsell-options-", "");
		var priceId = $(this).attr("value");

		var existingOffer = $(".recap-annonce #bill-line-" + id);
		if (existingOffer.length > 0) {
			$("input[name='" + $(this).attr("name") + "']:not(:checked)").each(function () {
				var opt = this;
				var promiseDelUncheckedUpsellOptions = commonWebApi.delOrderLine($(this).attr("value"), global.submittedClassifiedId, false);
			});
		}
		var promiseAddOrderOrLine = commonWebApi.addOrderOrLine(global.submittedClassifiedId, priceId);
		promiseAddOrderOrLine.success(function (data) {
			existingOffer.remove();
			$(".recap-annonce table tbody").append(classified.makeBillingLine(id, offre, type, prix, true));
			classified.bindListenerOnRemoveBillLineButtonClick(id, priceId);
			Classified.prototype.setTotalUpSells();
			$(".recap-annonce").slideDown("slow");
			$(".billing-off").slideDown("slow");
			$(".upsell-options").attr('disabled', false);
		});

	});
};

Classified.prototype.bindListenerOnRemoveBillLineButtonClick = function (billLineId, priceId) {
	$("#bill-line-" + billLineId + " .btn-remove-bill-line").on('click', function () {

		var promiseDelUncheckedUpsellOptions = commonWebApi.delOrderLine(priceId, global.submittedClassifiedId, false);
		promiseDelUncheckedUpsellOptions.success(function (data) {
			var upsellsSelector = $("#upsell-options-" + billLineId);
			upsellsSelector.slideUp("slow");
			upsellsSelector.parent().find("input:checked").each(function () {
				$(this).prop('checked', false);
			});
			$("#bill-line-" + billLineId).remove();
			if ($(".recap-annonce table tbody tr").length === 0) {
				$(".recap-annonce").slideUp("slow");
				$(".billing-off").slideUp("slow");
			} else {
				Classified.prototype.setTotalUpSells();
			}

		});
	});
};

Classified.prototype.bindListenerOnDropdownSubUniversLinksClick = function () {
	$("#selectSubUnivers li a").on('click', function () {
		//AdaptDom
		resetSectionsAndChildrenDynamicFields();
		hideSectionsAndChildrenDynamicFields();
		var universId = $("#selectUnivers").parents(".input-group").parent().children("input:hidden").val();
		var subUniversId = $("#SubUniversName").parents(".input-group").parent().children("input:hidden").val();
		Classified.prototype.getAttributes(universId, subUniversId);
		Classified.prototype.getSections($(this).data("id"));
		//Validation form
		var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
		var fieldValidator = new FieldValidator(inputAssociated);
		fieldValidator.isValidField();
		//Upsells
		var profileType = $("#part").is(':checked') ? 1 : 2;
		if (global.submittedClassifiedId !== null && global.submittedClassifiedId > 0) {

			var request = commonWebApi.cleanOrder(global.submittedClassifiedId);
			request.success(function (data) {
				$(".bill-line").remove();
				$(".recap-annonce").slideUp("slow");
				$(".billing-off").slideUp("slow");
				Classified.prototype.getUpsells(subUniversId, profileType, true);
			});
		} else {
			Classified.prototype.getUpsells(subUniversId, profileType, true);
		}

		//Tips
		fillTipsBySubUniversId(subUniversId);

		//Specifics treatement on subuniverse
		var priceLabel = $("#lblInfoClassified_Price");
		var priceInput = $("#InfoClassified_Price");
		switch (subUniversId) {
			case "340":
				priceLabel.html("Loyer CC :");
				priceInput.attr("placeholder", "Loyer charges comprises *")
				break;
			case "342":
			case "343":
				priceLabel.html("Loyer :");
				priceInput.attr("placeholder", "Loyer *")
				break;
			case "406":
				priceLabel.html("Salaire :");
				priceInput.attr("placeholder", "Salaire *")
				break;
			case "344":
			case "345":
				$("#dogcatalert").modal({
					backdrop: 'static',
					keyboard: false
				});
			default:
				priceLabel.html("Prix (en €) :");
				priceInput.attr("placeholder", "Prix *")
		}
	});
};

Classified.prototype.bindListenerOnDropdownSectionsLinksClick = function () {
	$("#selectSections li a").on('click', function () {
		resetAttributesAndChildrenDynamicFields();
		hideAttributesAndChildrenDynamicFields();
		var universId = $("#selectUnivers").parents(".input-group").parent().children("input:hidden").val();
		var subUniversId = $("#SubUniversName").parents(".input-group").parent().children("input:hidden").val();
		var sectionId = $(this).data("id");
		var attrValues = $("#AttributeValues").val();
		Classified.prototype.getAttributes(universId, subUniversId, sectionId, attrValues);
		var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
		var fieldValidator = new FieldValidator(inputAssociated);
		fieldValidator.isValidField();
		fillTipsBySubUniversIdAndSectionsId(subUniversId, sectionId);
	});
};

Classified.prototype.bindListenerOnDropdownAttributesLinksClick = function () {
	$(".contentAttributes .selectAttribues li a").on('click', function () {
		resetAttributesAndChildrenDynamicFields();
		hideAttributesAndChildrenDynamicFields();
		var universId = $("#selectUnivers").parents(".input-group").parent().children("input:hidden").val();
		var subUniversId = $("#SubUniversName").parents(".input-group").parent().children("input:hidden").val();
		var sectionId = $(this).data("id");
		var attrValues = $("#AttributeValues").val();
		Classified.prototype.getAttributes(universId, subUniversId, sectionId, attrValues);
		var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
		var fieldValidator = new FieldValidator(inputAssociated);
		fieldValidator.isValidField();
		fillTipsBySubUniversIdAndSectionsId(subUniversId, sectionId);
	});
};


Classified.prototype.bindListenerOnDropdownLinksClick = function () {
	$(".dropdown-menu a").each(function (index, link) {
		$(link).on("click", function (event) {
			var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
			event.preventDefault();
			fakeComboSelect($(this));
			var fieldValidator = new FieldValidator(inputAssociated);
			fieldValidator.isValidField();
		});
	});
};

Classified.prototype.hideAllErrorInputOfelement = function (htmlElement) {
	$(htmlElement).find(".mandatory").removeClass("has-error");
	$(htmlElement).find("input, textarea").each(function (index, element) {
		Classified.prototype.getElementToApplyTooltipError($(element)).tooltip('hide');
	});
};

/******************************************************
*              Class Classified - Submit
******************************************************/
Classified.prototype.submitClassified = function () {
	var partyFields = {};
	if ($("#part").is(':checked')) {
		partyFields = $('form#submitClassifiedForm #container-login-ispart :input').serializeArray();
		partyFields.IsPro = false;
	} else {
		partyFields = $('form#submitClassifiedForm #container-login-ispro :input').serializeArray();
		partyFields.IsPro = true;
	}
	Classified.prototype.makeSubmitClassified(partyFields);
};

Classified.prototype.makeSubmitClassified = function (party) {
	var classifiedSubmit = {};
	if (party.IsPro) {
		classifiedSubmit.InfoPro = {};
		jQuery.each(party, function (i, attribute) {
			classifiedSubmit.InfoPro[attribute.name.substr(attribute.name.indexOf(".") + 1)] = attribute.value;
		});
	}
	else {
		if (party.IsPro) {
			classifiedSubmit.InfoPro = {};
			jQuery.each(party, function (i, attribute) {
				classifiedSubmit.InfoPro[attribute.name.substr(attribute.name.indexOf(".") + 1)] = attribute.value;
			});
		}
	}
};

Classified.prototype.partyIsPro = function () {
	return $("input#pro").is(':checked');
};

Classified.prototype.setTotalUpSells = function () {
	var total = Classified.prototype.getTotalUpSells();
	var prixHT, tva, prixTTC;
	if (Classified.prototype.partyIsPro()) {
		prixHT = total;
		tva = Math.round((prixHT * global.tauxTVA / 100) * 10) / 10;
		prixTTC = prixHT + tva;
	} else {
		prixTTC = total;
		tva = Math.round((prixTTC - (prixTTC / (1 + (global.tauxTVA / 100)))) * 100) / 100;
		prixHT = prixTTC - tva;
	}
	$("#billing-total-ht .val").text(prixHT.toFixed(2));
	$("#billing-total-tva .val").text(tva.toFixed(2));
	$("#billing-total-ttc .val").text(prixTTC.toFixed(2));

};

Classified.prototype.getTotalUpSells = function () {
	var total = 0;
	$(".recap-annonce table tbody tr td:nth-child(3) .priceasnumber").each(function () {
		total += parseInt($(this).text().replace(/[^\d.-]/g, ''));
	});
	return total;
};

/******************************************************
*                 Internal functions
******************************************************/
function fakeComboSelect(link) {
	link.parents(".input-group").children("input:text").val(link.text());
	link.parents(".input-group").parent().children("input:hidden").val(link.data("id"));
}

function setFieldsMasks() {
	$("#telephone").mask("09 99 99 99 99");
	//$("#Siret").mask("99999999999999");
}

function resetSubUniversAndChildrenDynamicFields() {
	$('#SubUniversName').val("");
	$('#selectSubUnivers li').empty();

	resetSectionsAndChildrenDynamicFields();
	resetAttributesAndChildrenDynamicFields();
}

function resetSectionsAndChildrenDynamicFields() {
	$('#SectionsName').val("");
	$("#selectSections li").empty();

	resetAttributesAndChildrenDynamicFields();
}

function resetAttributesAndChildrenDynamicFields() {
	$('.contentAttributes').empty();
	resetChildrensAttributesDynamicFields();
}

function resetChildrensAttributesDynamicFields() {
	$('.contentSubAttributes').remove();
}

function hideSubUniversAndChildrenDynamicFields() {
	$('#SubUniversPart').addClass('hidden');
	$('#SectionsPart').addClass('hidden');
	$('.contentAttributes').addClass('hidden');
}

function hideSectionsAndChildrenDynamicFields() {
	$('#SectionsPart').addClass('hidden');
	$('.contentAttributes').addClass('hidden');
}

function hideAttributesAndChildrenDynamicFields() {
	$('.contentAttributes').addClass('hidden');
}

function thisAttrExists(domElement, attr) {
	if ($(domElement).attr(attr) === undefined) {
		return false;
	}
	return true;
}

function isHiddenFields(domElement) {
	if ($(domElement).attr("type") === "hidden")
		return true;
	if ($(domElement).parents(".form-group.mandatory, .input-group.mandatory").hasClass("hidden"))
		return true;
	return false;
}

function fillTipsBySubUniversId(subuniversId) {
	var sectionId = null;
	if (global.sections !== null && global.sections !== "") {
		sectionId = global.sections[0].Value;
	}
	var promise = commonWebApi.defineTips(subuniversId, sectionId);
	promise.success(function (data) {
		if (data.TitleHelper !== undefined)
			global.tips.TitleHelper = data.TitleHelper;
		else
			global.tips.TitleHelper = null;
		if (data.DescriptionHelper !== undefined)
			global.tips.DescriptionHelper = data.DescriptionHelper;
		else
			global.tips.DescriptionHelper = null;
	});
	promise.error(function () {
		global.tips.TitleHelper = null;
		global.tips.DescriptionHelper = null;
	});
}

function fillTipsBySubUniversIdAndSectionsId(subuniversId, sectionsId) {
	var promise = commonWebApi.defineTips(subuniversId, sectionsId);
	promise.success(function (data) {
		if (data.TitleHelper !== undefined)
			global.tips.TitleHelper = data.TitleHelper;
		else
			global.tips.TitleHelper = null;
		if (data.DescriptionHelper !== undefined)
			global.tips.DescriptionHelper = data.DescriptionHelper;
		else
			global.tips.DescriptionHelper = null;
	});
	promise.error(function () {
		global.tips.TitleHelper = null;
		global.tips.DescriptionHelper = null;
	});
}


/******************************************************
*                 Class FormValidator
******************************************************/
function FormValidator(form) {
	this.form = form;
	this.scrollToAnchorIfNotValid = false;
	this.anchorToScrollIfNotValid = null;
}

FormValidator.prototype.isValid = function () {
	var hasEmpty = this.formContainsEmptyMandatoryFields();
	var hasInvalid = this.formContainsInvalidFieldValues();
	return !hasEmpty && !hasInvalid;
};

FormValidator.prototype.scrollToIfNotValid = function (anchor) {
	if (anchor !== undefined && anchor !== null && anchor.length > 0) {
		this.anchorToScrollIfNotValid = anchor;
		this.scrollToAnchorIfNotValid = true;
	}
	else {
		this.scrollToAnchorIfNotValid = false;
	}
};

FormValidator.prototype.formContainsEmptyMandatoryFields = function () {
	var emptyFields = this.form.find(".mandatory:not(.hidden) input, .mandatory:not(.hidden) textarea").filter(function () { return ($.trim($(this).val()) === "" && !isHiddenFields(this)); });
	var validator = this;
	if (emptyFields.length > 0) {
		if (this.scrollToAnchorIfNotValid)
			Tools.prototype.scrollTo(this.anchorToScrollIfNotValid);
	}
	emptyFields.each(function (index, field) {
		var fieldValdidator = new FieldValidator(field);
		fieldValdidator.isValidField();
	});
	return emptyFields.length > 0;
};

FormValidator.prototype.formContainsInvalidFieldValues = function () {
	var invalidFields = this.form.find("input, textarea").filter(function () { return $.trim($(this).val()) !== "" && new FieldValidator($(this)[0]).isValidField() === false; });
	var invalidFieldsValid = new Array();

	invalidFields.each(function () {
		if ($(this).parents('.form-group')[0].className.indexOf('hidden') < 0) {
			invalidFieldsValid.push($(this));
		}
	});
	var validator = this;
	if (invalidFieldsValid.length > 0) {
		if (this.scrollToAnchorIfNotValid)
			new Tools().scrollTo(this.anchorToScrollIfNotValid);
	}
	$(invalidFieldsValid).each(function (index, field) {
		var fieldValdidator = new FieldValidator(field);
		fieldValdidator.isValidField();
	});
	return invalidFieldsValid.length > 0;
};

/******************************************************
*                 Class FieldValidator
******************************************************/
function FieldValidator(inputField) {
	this.fieldToValidate = inputField;
}

FieldValidator.prototype.isValidField = function () {
	inputToValidate = (this.fieldToValidate[0] === undefined ? this.fieldToValidate : this.fieldToValidate[0]);

	if (!($(inputToValidate).prop("readonly")) || ($(inputToValidate).hasClass("readonly"))) {
		var inputValue = "";
		if ($(inputToValidate).attr("id") === "ZipCode") {
			inputValue = $.trim($(inputToValidate).val().replace(/_/g, '').replace("+", ""));
		} else {
			inputValue = $.trim($(inputToValidate).val().replace(/_/g, ''));
		}
		return this.validField(inputValue);
	}
};

FieldValidator.prototype.validField = function (inputValue) {
	var inputToValidate = (this.fieldToValidate[0] === undefined ? this.fieldToValidate : this.fieldToValidate[0]);
	if (inputValue === "" || inputValue === $(inputToValidate).attr("placeholder")) {
		this.displayErrorOn(inputToValidate, properties_fr.CommonMandatoryField);
		return false;
	} else {
		var inputIsValid = false;
		var placeholder = $(inputToValidate).attr("placeholder");
		inputValue = inputValue === placeholder ? '' : inputValue;
		var msg = null;
		if (inputToValidate.tagName === "INPUT") {
			switch (inputToValidate.getAttribute('type')) {
				case "email": {
					inputIsValid = this.isValidEmail(inputValue);
					break;
				}
				case "text": {
					if (inputToValidate.id === "telephone") inputValue = inputValue.replace(/ /g, '');
					inputIsValid = this.isValidText(inputValue);
					break;
				}
				case "url": {
					inputIsValid = this.isValidUrl(inputValue);
					break;
				}
				case "siret": {
					inputIsValid = this.isValidSIRET(inputValue);
					break;
				}
				case "number": {
					inputIsValid = this.isValidNumber(inputValue);
					break;
				}
				case "radio":
				case "checkbox":
				default: {
					inputIsValid = true;
					break;
				}
			}
		}
		else if (inputToValidate.tagName === "TEXTAREA") {
			inputIsValid = true;
		}
		else {
			inputIsValid = false;
		}
		var inputName = inputToValidate.getAttribute('name');
		if (inputName == "Name" || inputName == "InfoPro.CompanyName" || inputName == "InfoPro.Address") {
			var regex = /@/;
			inputIsValid = !regex.test(inputValue);
		}
		else if (inputName == "InfoClassified.Description" || inputName == "InfoClassified.Title") {
			var regex = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-z\-0-9]+\.)+[a-z]{2,}))/;
			inputIsValid = !regex.test(inputValue);
		};
		if (!inputIsValid || this.isTooShort(inputValue) || this.isTooLong(inputValue)) {
			msg = this.getErrorMsg();
			this.displayErrorOn(inputToValidate, msg);
			return false;
		} else if (thisAttrExists(inputToValidate, "unknown")) { //ZipCode have this attribute if it's not finded
			msg = this.getErrorMsg();
			this.displayErrorOn(inputToValidate, msg);
			return false;
		} else {
			$(inputToValidate).parents(".mandatory").removeClass("has-error");
			Classified.prototype.getElementToApplyTooltipError($(inputToValidate)).tooltip('hide');
			return true;
		}
	}
};

FieldValidator.prototype.isValidEmail = function (inputValue) {
	var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-z\-0-9]+\.)+[a-z]{2,}))$/i;
	return regex.test(inputValue);
};

FieldValidator.prototype.isValidText = function (inputValue) {
	var regex = /^.+$/i;
	return regex.test(inputValue);
};

FieldValidator.prototype.isValidUrl = function (inputValue) {
	var regex = /^(https?:\/\/)?(www\.)?([a-z0-9@:%._\+~#=\-]{2,256}\.)*[a-z]{2,6}\b([a-z0-9@:%_\+.~#?&\-//=]*)$/i;
	return regex.test(inputValue);
};

FieldValidator.prototype.isValidNumber = function (inputValue) {
	var regex = /^[0-9]*[,\.]{0,1}[0-9]{0,2}$/i;
	var validMin = false, validMax = false;
	var inputToValidate = (this.fieldToValidate[0] === undefined ? this.fieldToValidate : this.fieldToValidate[0]);
	if (regex.test(inputValue)) {
		var min = $(inputToValidate).attr("min");
		if (min !== undefined && min !== null && min !== "") {
			validMin = parseFloat(inputValue) >= parseFloat(min) ? true : false;
		} else {
			validMin = true;
		}
		var max = $(inputToValidate).attr("max");
		if (max !== undefined && max !== null && max !== "") {
			validMax = parseFloat(inputValue) <= parseFloat(max) ? true : false;
		} else {
			validMax = true;
		}
	}
	else {
		return false;
	}
	return (validMin && validMax);
};

FieldValidator.prototype.isValidSIRET = function (inputValue) {
	var isValid = false;
	if ((inputValue.length != 14) || (isNaN(inputValue)))
		isValid = false;
	else {
		// Donc le SIRET est un numérique à 14 chiffres
		// Les 9 premiers chiffres sont ceux du SIREN (ou RCS), les 4 suivants
		// correspondent au numéro d'établissement
		// et enfin le dernier chiffre est une clef de LUHN. 
		var sum = 0;
		var tmp;
		for (var cpt = 0; cpt < inputValue.length; cpt++) {
			if ((cpt % 2) === 0) { // Les positions impaires : 1er, 3è, 5è, etc... 
				tmp = inputValue.charAt(cpt) * 2; // On le multiplie par 2
				if (tmp > 9)
					tmp -= 9; // Si le résultat est supérieur à 9, on lui soustrait 9
			}
			else
				tmp = inputValue.charAt(cpt);
			sum += parseInt(tmp);
		}
		if ((sum % 10) === 0)
			isValid = true; // Si la somme est un multiple de 10 alors le SIRET est valide 
		else
			isValid = false;
	}
	return isValid;
};

FieldValidator.prototype.isTooShort = function (inputValue) {
	var inputToValidate = (this.fieldToValidate[0] === undefined ? this.fieldToValidate : this.fieldToValidate[0]);
	var minlength = $(inputToValidate).attr("minlength");
	if (minlength === undefined || minlength === null || minlength === "") {
		return false;
	}
	if (inputValue.length < minlength) {
		return true;
	}
	return false;
};

FieldValidator.prototype.isTooLong = function (inputValue) {
	var inputToValidate = (this.fieldToValidate[0] === undefined ? this.fieldToValidate : this.fieldToValidate[0]);
	var maxlength = $(inputToValidate).attr("maxlength");
	if (maxlength === undefined || maxlength === null || maxlength === "") {
		return false;
	}
	if (inputValue.length > maxlength) {
		return true;
	}
	return false;
};

FieldValidator.prototype.getErrorMsg = function () {
	var placeHolder = $(this.fieldToValidate).attr('placeholder');
	var placeHolderUsableValue = "";
	if (placeHolder !== undefined)
		placeHolderUsableValue = $.trim(placeHolder.replace("*", ""));
	var msg = properties_fr.CommonInvalidField;
	if (placeHolderUsableValue !== '')
		msg = properties_fr.InvalidField.f(placeHolderUsableValue);

	var inputName = this.fieldToValidate.name;
	if (inputName == "Name" || inputName == "InfoPro.CompanyName" || inputName == "InfoPro.Address") {
		var regex = /@/;
		if (regex.test(this.fieldToValidate.value))
			msg = properties_fr.NoAtAllowed;
	}
	else if (inputName == "InfoClassified.Description" || inputName == "InfoClassified.Title") {
		var regex = /(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-z\-0-9]+\.)+[a-z]{2,}))/;
		if (regex.test(this.fieldToValidate.value))
			msg = properties_fr.NoMailAddress;
	};

	if ($(this.fieldToValidate).attr("unknown") !== undefined)
		msg = properties_fr.UnknownConstraint.f(placeHolderUsableValue, $(this.fieldToValidate).attr("unknown"));
	if ($(this.fieldToValidate).attr("minlength") !== undefined && this.isTooShort($(this.fieldToValidate).val())) {
		msg += " " + properties_fr.MinLengthConstraint.f($(this.fieldToValidate).attr("minlength"));
	} else if ($(this.fieldToValidate).attr("maxlength") !== undefined && this.isTooLong($(this.fieldToValidate).val())) {
		msg += " " + properties_fr.MaxLengthConstraint.f($(this.fieldToValidate).attr("maxlength"));
	}
	else if ($(this.fieldToValidate).attr("unknown") !== undefined) {
		if (placeHolder.replace("*", "").trim() !== '')
			msg = properties_fr.UnknownConstraint.f(placeHolder.replace("*", "").trim(), $(this.fieldToValidate).attr("unknown"));
	}
	return msg;
};

/******************************************************
*              Class FieldValidator - Modif DOM
******************************************************/
FieldValidator.prototype.displayErrorOn = function (inputField, errorMsg) {
	if (isHiddenFields(inputField)) {
		return;
	}
	$(inputField).parents(".mandatory").addClass("has-error");
	var template = '<div class="tooltip" role="tooltip"><div class="tooltip-arrow error"></div><div class="tooltip-inner error"></div></div>';
	var t = new TooltipElement();
	t.attachElement(Classified.prototype.getElementToApplyTooltipError($(inputField)));
	t.destroy();
	setTimeout(function () {
		t.applyTemplate(template);
		t.setTitle(errorMsg);
		t.show();
	}, 200);
};

/******************************************************
*                 Class Tooltip
******************************************************/
function TooltipElement(bindedElement) {
	this.trigger = "manual";
	this.placement = "right";
	if (bindedElement === undefined || bindedElement === null)
		this.bindedElement = null;
	else {
		this.bindedElement = bindedElement;
		$(this.bindedElement).tooltip({ placement: this.placement, trigger: this.trigger });
	}
}

TooltipElement.prototype.bindToThisElement = function (element) {
	if (element === undefined || element === null)
		throw new Error("Invalid arguments");
	this.bindedElement = element;
	$(this.bindedElement).tooltip("destroy");
	setTimeout(function () {
		$(this.bindedElement).tooltip({ placement: this.placement, trigger: this.trigger });
	}, 200);
};

TooltipElement.prototype.setTitle = function (title) {
	if (title === undefined || title === null)
		throw new Error("Invalid arguments");
	if (this.bindedElement === undefined || this.bindedElement === null)
		throw new Error("The binded element of tooltip is undefined or null.");
	$(this.bindedElement).attr("data-original-title", title);
};

TooltipElement.prototype.applyTemplate = function (template) {
	$(this.bindedElement).tooltip({
		placement:function (tooltip, trigger) {
			window.setTimeout(function () {
				$(tooltip)
					.addClass('right')
					.css({top: 0})
					.find('.tooltip-arrow').css({left: '64%'});

				$(tooltip).addClass('in');
			}, 0);
		}
		, trigger: this.trigger, template: template
	});
};

TooltipElement.prototype.show = function () {
	$(this.bindedElement).tooltip("show");
};

TooltipElement.prototype.hide = function () {
	$(this.bindedElement).tooltip("hide");
};

TooltipElement.prototype.destroy = function () {
	$(this.bindedElement).tooltip("destroy");
};

TooltipElement.prototype.attachElement = function (element) {
	if (element === undefined || element === null)
		this.bindedElement = null;
	else {
		this.bindedElement = element;
	}
};

/**********************************************************************
*       SURCHARGE JAVASCRIPT / JQUERY FUNCTION
**********************************************************************/
String.prototype.format = String.prototype.f = function () {
	var s = this,
        i = arguments.length;

	while (i--) {
		s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
	}
	return s;
};

$.fn.serializeObject = function () {
	var o = {};
	var a = this.serializeArray();
	$.each(a, function () {
		if (o[this.name]) {
			if (!o[this.name].push) {
				o[this.name] = [o[this.name]];
			}
			o[this.name].push(this.value || '');
		} else {
			o[this.name] = this.value || '';
		}
	});
	return o;
};

$.fn.sanitizeJson = function () {
	$(document.body).append('<div id="htmlparser" style="display:none"></div>');
	var htmlparser = $("div#htmlparser");
	var a = this[0];
	var sanitizedJson = {};
	$.each(a, function (key, value) {
		sanitizedJson[key] = htmlparser.text(value).html();
	});
	htmlparser.remove();
	return sanitizedJson;

};

String.prototype.removeDiatrics = function () {
	var my_string = this;
	var new_string = "";
	var pattern_accent = new Array("é", "è", "ê", "ë", "ç", "à", "â", "ä", "î", "ï", "ù", "ô", "ó", "ö");
	var pattern_replace_accent = new Array("e", "e", "e", "e", "c", "a", "a", "a", "i", "i", "u", "o", "o", "o");
	if (my_string && my_string !== "") {
		new_string = Tools.prototype.preg_replace(pattern_accent, pattern_replace_accent, my_string);
	}
	return new_string;
};

$.fn.center = function () {
	this.css("position", "absolute");
	this.css("top", ((($(window).height() - this.height()) / 2) + $(window).scrollTop()) + "px");
	this.css("left", ((($(window).width() - this.width()) / 2) + $(window).scrollLeft()) + "px");
	return this;
};

/******************************************************
*                 Class Tools
******************************************************/
function Tools() {

}

Tools.prototype.serializeComplexeObject = function (object) {
	var elementFirstLevel = [];
	jQuery.each(object, function (name, value) {
		if (name.indexOf(".") !== -1) {
			var delimiterPos = name.indexOf(".");
			var currentElement = name.slice(0, delimiterPos);
			if (elementFirstLevel.indexOf(currentElement) !== -1) {
				elementFirstLevel.push(currentElement);
			}
		}
	});
};

Tools.prototype.preg_replace = function (array_pattern, array_pattern_replace, my_string) {
	var new_string = String(my_string);
	for (i = 0; i < array_pattern.length; i++) {
		var reg_exp = RegExp(array_pattern[i], "gi");
		var val_to_replace = array_pattern_replace[i];
		new_string = new_string.replace(reg_exp, val_to_replace);
	}
	return new_string;
};

Tools.prototype.scrollTo = function (anchor) {
	$(document).scrollTop($(anchor).offset().top);
};

Tools.prototype.scrollSlowlyTo = function (anchor) {
	$('html, body').animate({
		scrollTop: $(anchor).offset().top
	}, 500);
};

Tools.prototype.isValidNumber = function (event, isFloat) {
	var key = event.charCode || event.keyCode || 0;
	if (isFloat === true)
		return (
            key == 8 ||
            key == 9 ||
            key == 13 ||
            key == 46 ||
            key == 44 ||
            (key >= 48 && key <= 57));
	else
		return (
            key == 8 ||
            key == 9 ||
            key == 13 ||
            (key >= 48 && key <= 57));
};

/******************************************************
*                 Class Listener
******************************************************/
function Listener() {
}

Listener.prototype.bindFieldsValidationListenerOn = function (elementToListen, evt) {
	$(elementToListen).on(evt, function () {
		var inputToValidate = ($(this)[0] === undefined ? $(this) : $(this)[0]);
		if ($(inputToValidate).val().length === 0) {
			return;
		}
		if ($(inputToValidate).attr("id") === "telephone") {
			if ($.trim($(inputToValidate).val().replace(/_/g, '')).length === 0) {
				return;
			}
		}
		var formValidator = new FormValidator();
		var fieldValidator = new FieldValidator(this);
		if (!fieldValidator.isValidField()) {
			if ($(inputToValidate).attr("id") === "ZipCode") {
				$(inputToValidate).parents(".input-group").find("#zipCodeInformation").attr("hidden", "hidden");
			}
		}
	});
};


Listener.prototype.bindAttributesShowChildrenListenerOnClick = function (evt) {
	$(".contentAttributes .has-child .dropdown-menu a").on("click", function (event) {

		resetChildrensAttributesDynamicFields();
		var res = $(this).data("id").split("|");
		var currentObj = $(this).parents("div.has-child");
		var realValueInput = currentObj.find(".attribute-real-id");
		var parentAttributeId = realValueInput.attr("name").replace("attributes-", "");
		var select = $(this);
		var promise = commonWebApi.showChildrenAttributes(parentAttributeId, res[0]);
		promise.success(function (data) {
			var id = select.parents(".dropdown-menu").attr("id") + "SubAttributes";
			currentObj.after('<div id="' + id + '" class="contentSubAttributes"></div>');
			Classified.prototype.adaptAttributesSectionsDom(data, $("#" + id));
			Listener.prototype.bindFieldsValidationListenerOn(".mandatory input, .mandatory textarea", "focusout");
		});


	});
};

Listener.prototype.bindListenerEvent = function (elementToListen, event, handler) {
	$(elementToListen).on(event, handler);
};

/******************************************************
*                 Class Autcomplete
******************************************************/
function AutoComplete() {
	this.data = null;
	this.inputAutoCompleted = null;
}

AutoComplete.prototype.attachInputElement = function (input) {
	this.inputAutoCompleted = input;
};

AutoComplete.prototype.bindData = function (data) {
	this.data = data;
};

AutoComplete.prototype.displayDataOn = function () {
	if (!$(this.inputAutoCompleted).parents(".autocomplete-ul-container").hasClass("open")) {
		$(this.inputAutoCompleted).parents(".autocomplete-ul-container").addClass("open");
	}
	global.zipCodeSelected = false;
};

AutoComplete.prototype.displayDataOff = function () {
	$(this.inputAutoCompleted).parent().closest('div').removeClass("open");
	$(".dropdown-menu a").each(function (index, link) {
		$(link).off("mousedown");
	});
};

AutoComplete.prototype._callbackDisplayDataOff = function (element) {
	var updateClassifiedId = $("#InfoClassified_Id").val();
	if (updateClassifiedId != null && updateClassifiedId > 0) AutoComplete.prototype.setGlobalZipCodeSelected();
	if (!global.zipCodeSelected) {
		element.value = "";
		$("#cityName").text("");
		$("#departmentName").text("");
		$("#City").val("");
		$("#zipCodeInformation").attr("hidden", "hidden");
	}
	$(element).parent().closest('div').removeClass("open");
	$(".dropdown-menu a").each(function (index, link) {
		$(link).off("mousedown");
	});
};

AutoComplete.prototype.constructData = function () {
	var i;
	for (i = 0 ; i < $(this.inputAutoCompleted).siblings("ul.dropdown-menu").length; i++) {
		$($(this.inputAutoCompleted).siblings("ul.dropdown-menu")[i]).remove();
	}
	var html = "<ul class='dropdown-menu'>";
	for (i = 0; i < this.data.length; i++) {
		this.data[i].index = i;
		var libelle = this.data[i].ZC + " " + this.data[i].CN;
		html += "<li>";
		html += "<a ZC=\"" + this.data[i].ZC + "\" CN=\"" + this.data[i].CN + "\" DN=\"" + this.data[i].DN + "\">" + libelle + "</a>";
		html += "</li>";
	}
	html += "</ul>";
	$(this.inputAutoCompleted).removeAttr("unknown");
	$(this.inputAutoCompleted).parent().closest('div').append(html);
	$(".dropdown-menu a").each(function (index, link) {
		$(link).on("mousedown", function (event) {
			var inputAssociated = $(this).parents(".mandatory").find("input.form-control");
			event.preventDefault();
			var autocompleteValue = $(inputAssociated).attr("autocomplete");
			if (typeof autocompleteValue !== typeof undefined && autocompleteValue !== false) {
				$(this).parents(".input-group").find("input:text").val($(this).attr("ZC"));
				$(this).parents(".input-group").parent().find("input:hidden").val($(this).text());
				$(this).parents(".autocomplete-ul-container").removeClass("open");
				if ($(this).parent().parent().parent().children("input").attr('id') === "invoiceZC") {
					$('#invoiceCity').val($(this).attr('CN'));
				}
			} else {
				fakeComboSelect($(link));
			}
			$("#zipCodeInformation").removeAttr("hidden");
			$(inputAssociated).removeAttr("unknown");
			$("#cityName").text($(this).attr("CN"));
			$("#departmentName").text($(this).attr("DN"));
			$("#City").val($(this).attr("CN"));
			var fieldValidator = new FieldValidator(inputAssociated);
			if (fieldValidator.isValidField()) {
				global.zipCodeSelected = true;
			} else {
				global.zipCodeSelected = false;
			}
		});
	});
};

AutoComplete.prototype.setGlobalZipCodeSelected = function () {
	var inputAssociated = $("#ZipCode");
	var cityHiddenInput = $("#City").val();
	var fieldValidator = new FieldValidator(inputAssociated);
	if (fieldValidator.isValidField() && cityHiddenInput != null && cityHiddenInput != "") {
		global.zipCodeSelected = true;
	} else {
		global.zipCodeSelected = false;
	}
};

AutoComplete.prototype.constructUnfindedErrorData = function () {
	for (var i = 0 ; i < $(this.inputAutoCompleted).siblings("ul.dropdown-menu").length; i++) {
		$($(this.inputAutoCompleted).siblings("ul.dropdown-menu")[i]).remove();
	}
	var html = "<ul class='dropdown-menu'>";
	html += "<li>";
	html += "<a onclick='return false;' style='pointer-events:none;'>" + properties_fr.UnknownZipCode + "</a>";
	html += "</li>";
	html += "</ul>";
	$(this.inputAutoCompleted).parent().closest('div').append(html);
	$(this.inputAutoCompleted).attr("unknown", "introuvable");
};

/******************************************************
*                 Class Logger
******************************************************/
function Logger() {

}

Logger.prototype.logError = function (sender, reason) {
	if (reason !== undefined) {
		console.error("Error from " + sender + " :" + JSON.stringify(reason));
	}
};

/******************************************************
*              Authentification Facebook
******************************************************/
function FBApi() {
	this.appId = '250899118373140';
	this.xfbml = true;
	this.version = 'v2.5';
}

FBApi.prototype.getUserData = function (successCallback) {
    FB.api('/me', { fields: 'name, email' }, function (response) {
		global.facebookUser = response;
		FBApi.prototype.getPhoto(successCallback);
	});
};

FBApi.prototype.getPhoto = function (successCallback) {
	FB.api('/me/picture?type=normal', function (response) {
		successCallback(response.data.url);
	});
};

FBApi.prototype.logout = function () {
	FB.logout(function () { global.facebookUser = null; document.location.reload(); });
	PartyForm.prototype.adaptParticularFormToFacebookLoggedOutDom();
};

FBApi.prototype.successCallbackPhoto = function (profilePictureUrl) {
	PartyForm.prototype.adaptParticularFormToFacebookLoggedDom(profilePictureUrl);
};

window.fbAsyncInit = function () {
	var fbApi = new FBApi();
	//SDK loaded, initialize it
	FB.init({
		appId: fbApi.appId,
		xfbml: fbApi.xfbml,
		version: fbApi.version
	});

	//check user session and refresh it
	FB.getLoginStatus(function (response) {
	    console.log("Statut Reponse : " + response.status);
	    console.log("Response :" + response);
		if (response.status === 'connected') {
			//SUCCESS
			$(".facebook").css("display", "none");
			fbApi.getUserData(response);
		}
		else if (response.status === 'not_authorized') {
			//FAILED
			global.facebookUser = null;
		} else {
			//UNKNOWN ERROR
			global.facebookUser = null;
		}
	});
};

//load the JavaScript SDK
(function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) { return; }
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

FBApi.prototype.formatUsername = function (name) {
    var usernameServerFormat = "{0} {1}.";
    console.log(global.facebookUser);
	return usernameServerFormat.f(global.facebookUser.first_name, global.facebookUser.last_name);
};

/******************************************************
*              HTML Constructor
******************************************************/
function HtmlConstructor() {
}

HtmlConstructor.prototype.buildLogoutFacebook = function () {
	var html = '<div id="facebookLogout" class="row">';
	html += '<div class="col-md-12 col-sm-12">';
	html += '<a onclick="FBApi.prototype.logout();" id="logoutFacebook" class="pointer-cursor">Déconnexion</a>';
	html += '</div>';
	html += '</div>';
	return html;
};

HtmlConstructor.prototype.buildFacebookInformationsBlock = function () {
	var html = '<div id="facebookProfil" class="facebook-profil text-center col-md-12 col-sm-12 text-center">';
	html += '<div class="row">';
	html += '<div id="facebookProfilPicture" class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">';
	html += '</div>';
	html += '</div>';
	html += '<div class="row">';
	html += '<div id="profilInformations" class="col-md-12 col-sm-12">';
	html += '</div>';
	html += '</div>';
	html += HtmlConstructor.prototype.buildLogoutFacebook();
	html += '</div>';
	return html;
};

HtmlConstructor.prototype.appendFacebookProfilPicture = function (profilPictureUrl) {
	var profilePictureHtml = '<span class="image-connected-facebook"><i class="icon-facebook" title="Connecté via Facebook"></i></span>';
	profilePictureHtml += '<img src="' + profilPictureUrl + '" class="img-thumbnail"/>';
	$("#facebookProfilPicture").append(profilePictureHtml);
};

HtmlConstructor.prototype.addPlaceholder = function () {
	// Si le navigateur ne prend pas en charge le placeholder
	if (document.createElement('input').placeholder === undefined) {

		// Champ avec un attribut HTML5 placeholder
		$('[placeholder]')
            // Au focus on clean si sa valeur équivaut à celle du placeholder
            .focus(function () {
            	if ($(this).val() === $(this).attr('placeholder')) {
            		$(this).val('');
            	}
            })
            // Au blur on remet le placeholder si le champ est laissé vide
            .blur(function () {
            	if ($(this).val() === '') {
            		$(this).val($(this).attr('placeholder'));
            	}
            })
            // On déclenche un blur afin d'initialiser le champ
            .blur()
            // Au submit on clean pour éviter d'envoyer la valeur du placeholder
            .parents('form').submit(function () {
            	$(this).find('[placeholder]').each(function () {
            		if ($(this).val() == $(this).attr('placeholder')) {
            			$(this).val('');
            		}
            	});
            });
	}
};

HtmlConstructor.prototype.addConstraintNumberOnly = function (elementArray, withSeparator) {
	$.each(elementArray, function (index, value) {
		var isFloat = withSeparator === undefined ? true : withSeparator;
		$(value).keypress(function (e) {
			return Tools.prototype.isValidNumber(e, isFloat);
		});
	});
};

/******************************************************
*                   Carousel class
******************************************************/
function Carousel() {
	this.carouselMiniatureLi = $(".thumbnails-carousel").children();
	this.carouselMainPictureContainer = $("#mainPicture").children();
	this.miniatureMainPictureLi = $(".miniatureMainPicture");
}

Carousel.prototype.drawAllDefaultMiniatureBackground = function () {
	this.carouselMiniatureLi.children().remove();
	this.carouselMiniatureLi.append('<span class="thumbnail picturesSpan"></span>');
	this.drawDefaultMainPicture();
	$("#Pictures").val("");
};

Carousel.prototype.drawAllPicture = function () {
	for (var i = 0; i < global.pictures.length; i++) {
		if ($(this.carouselMiniatureLi[i]).attr("id") === "miniatureMainPicture") {

			this.drawMainPicture();
		}
		var deleteButton = '<div class="icon-croix clearablePictures deletePictures"></div>';
		var spanContainer = $(this.carouselMiniatureLi[i]).children("span");
		$(spanContainer).append(global.pictures[i]);
		$(spanContainer).append(deleteButton);
		$(spanContainer).addClass("hasPhotoInside");
		var url = global.pictures[i].attr("src");
		if (!this.isLastPicture(i))
			$("#Pictures").val($("#Pictures").val() + url + ",");
		else {
			$("#Pictures").val($("#Pictures").val() + url);
		}
	}
	this.bindDeleteButtonClickListner();
};

Carousel.prototype.isLastPicture = function (index) {
	return (global.pictures.length - 1) === index;
};

Carousel.prototype.drawDefaultMainPicture = function () {
	$("#mainPicture").removeClass("hasPhotoInside");
	$("#mainPicture").removeClass("active");
	$("#mainPicture").children().remove();
	$("#mainPicture").append('<div id="mainPictureLinkAsText" class="text-primary"><strong>Ajouter une photo</strong></div>');
};

Carousel.prototype.drawMainPicture = function () {
	$("#mainPicture").addClass("hasPhotoInside");
	$("#mainPicture").children().remove();
	$("#mainPicture").append($(global.pictures[0]).clone());
	$("#mainPicture").removeClass("has-spinner");
	$("#mainPicture").removeClass("active");
};

Carousel.prototype.addPictureByUrl = function (pictureUrl) {
	if (global.pictures.length === global.nbPicturesMax) {
		return false;
	}
	var img = $('<img src="' + pictureUrl + '" class="cleanableImg">');
	global.pictures.push(img);
	return true;
};

Carousel.prototype.deleteByPictureUrl = function (pictureUrl) {
	for (var i = 0; i < global.pictures.length; i++) {
		if (global.pictures[i].attr("src") === pictureUrl) {
			var nbElementToDelete = 1;
			global.pictures.splice(i, nbElementToDelete);
			if (global.pictures.length === 0) {
				$("#PicturesGuid").val("");
			}
			return true;
		}
	}
	return false;
};
Carousel.prototype.bindDeleteButtonClickListner = function () {
	$(".deletePictures").on("click", function () {
		var carousel = new Carousel();
		var imgElementToDelete = $(this).siblings('img.cleanableImg')[0];
		var pictureUrl = $(this).siblings('img.cleanableImg')[0].src;
		var guid = $("#PicturesGuid").val();
		var promise = deleteRemoteImage(pictureUrl, guid);
		var self = this;
		promise.always(function (result) {
			if (result === "OK") {
				carousel.deleteByPictureUrl(pictureUrl);
				carousel.drawAllDefaultMiniatureBackground();
				carousel.drawAllPicture();
			}
		});
	});
};

Carousel.prototype.animateAnnoncePictureUpload = function (nbPhotos) {

	var mainWithoutPhoto = $("#mainPicture").not(".hasPhotoInside");
	var thumbsWithoutPhoto = $(".thumbnails-container .thumbnail").not(".hasPhotoInside");
	mainWithoutPhoto.not(".hasPhotoPicture").children().remove();
	mainWithoutPhoto.append("<span class=\"spinner\"><i class=\"icon-spin icon-spinner\"></i></span>");
	mainWithoutPhoto.toggleClass("has-spinner");
	mainWithoutPhoto.toggleClass("active");
	var i = 0;
	for (i = 0; i < nbPhotos && i < thumbsWithoutPhoto.length  ; i++) {
		$(thumbsWithoutPhoto[i]).children().remove();
		$(thumbsWithoutPhoto[i]).append("<span class=\"spinner\"><i class=\"icon-spin icon-spinner\"></i></span>");
		$(thumbsWithoutPhoto[i]).toggleClass("has-spinner");
		$(thumbsWithoutPhoto[i]).toggleClass("active");
	}
};

/******************************************************
*                   ListFilter class
******************************************************/

function ListFilter() {
	this.htmlListToUse = [];
}

ListFilter.prototype.useUlElementsCollection = function (ulToUse) {
	this.htmlListToUse = ulToUse;
};

ListFilter.prototype.filterList = function (filter) {
	var liCollectionNotMatch = $(this.htmlListToUse).find("li>a:not(:contains(" + filter + "))").parent();
	var liCollectionMatched = $(this.htmlListToUse).find("li>a:contains(" + filter + ")").parent();
	for (var i = 0; i < liCollectionNotMatch.length; i++) {
		$(liCollectionNotMatch[i]).hide();
	}
	for (var i = 0; i < liCollectionMatched.length; i++) {
		$(liCollectionMatched[i]).show();//css("display", "initial");
	}
};


/******************************************************
*                   Browser class
******************************************************/

function Browser() {
};

Browser.prototype.getInternetExplorerVersion = function () {
	var rv = -1;
	if (navigator.appName == 'Microsoft Internet Explorer') {
		var ua = navigator.userAgent;
		var re = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
		if (re.exec(ua) != null)
			rv = parseFloat(RegExp.$1);
	}
	return rv;
};

Browser.prototype.isLimitedBrowserVersion = function () {
	var ver = this.getInternetExplorerVersion();
	if (ver > -1) {
		return !(ver > 9.0)
	} else
		return false;

};

Browser.prototype.hasFlash = function () {
	try {
		var fo = new ActiveXObject('ShockwaveFlash.ShockwaveFlash');
		if (fo) {
			return true;
		}
	} catch (e) {
		if (navigator.mimeTypes
              && navigator.mimeTypes['application/x-shockwave-flash'] != undefined
              && navigator.mimeTypes['application/x-shockwave-flash'].enabledPlugin) {
			return true;
		}
	}
	return false;
};

$(document).ready(function () {
	$("#submitForgetButton").click(function () {
		var Email = $("#EmailR").val();

		// Call Edit action method
		$.post('/Account/ForgetPassword',
            { "Email": Email },
            function (data) {
            	$('#id-popup-confirm').modal('show');
            	$('#id-popup').modal('hide');
            	$('#returnmessage').html(data)
            });
	});
});