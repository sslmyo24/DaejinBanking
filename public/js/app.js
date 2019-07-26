const app = _ => {
	if (!$(`input[type="date"]`).val()) setMinDate();
	setContent();
}

const setContent = _ => {
	$("#main-content > .content").hide();
	const target = $("#tab-list > .content-tab.chk").data('target');
	$("#main-content").find("#"+target).show();
}

const changeContent = function () {
	$("#tab-list > .content-tab").removeClass('chk');
	$(this).addClass('chk');
	setContent();
}

const setMinDate = function () {
	let today = new Date();
	let yyyy = today.getFullYear();
	let mm = today.getMonth() + 1;
	let dd = today.getDate();
	if (mm < 10) mm = '0'+mm;
	if (dd < 10) dd = '0'+dd;
	today = `${yyyy}-${mm}-${dd}`;
	$(`input[type="date"]`).attr('min', today).val(today);
}

const changeDate = function () {
	$(this).parent().find(".end-date").attr('min', $(this).val()).val($(this).val());
}

$(app)
.on("click", "#tab-list > .content-tab", changeContent)
.on("change", ".start-date", changeDate)