common = {
	passwortAnzeigen: function()
	{
		var element = jQuery("input[name='passwort']");
		if(element.length > 0)
		{
			element = element[0];

			if(element.type === 'password')
			{
				element.type = 'text';
			}
			else
			{
				element.type = 'password';
			}
		}
	}
};

// Bootstrap
document.addEventListener('DOMContentLoaded', () => {
	$(() =>
	{
		$('.js-passwort_anzeigen').on('click', function(event)
		{
			common.passwortAnzeigen(event);
		});
	})
	let toggle = jQuery('.toggle-theme');
	if (toggle !== undefined) {
		toggle.on('click', function() {
			var body = $('body');
			body.toggleClass('theme-dark');

			if (body.hasClass('theme-dark')) {
				localStorage.setItem('tablerTheme', 'dark');
				body.attr('data-bs-theme', 'dark');
				$('.js-moon').addClass('d-none');
				$('.js-sun').removeClass('d-none');
			} else {
				localStorage.setItem('tablerTheme', 'light');
				body.attr('data-bs-theme', 'light');
				$('.js-moon').removeClass('d-none');
				$('.js-sun').addClass('d-none');
			}
		});
	}

	if (window.matchMedia) {
		var body = $('body');

		if (localStorage.getItem('tablerTheme') !== null) {
			var theme = localStorage.getItem('tablerTheme');
			body.addClass('theme-' + theme);
			body.attr('data-bs-theme', theme);

			switch (theme) {
				case 'dark':
					$('.js-moon').addClass('d-none');
					$('.js-sun').removeClass('d-none');
					break;
				case 'light':
					$('.js-moon').removeClass('d-none');
					$('.js-sun').addClass('d-none');
					break;
			}
		} else {
			if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
				localStorage.setItem('tablerTheme', 'dark');
				body.attr('data-bs-theme', 'dark');
				$('.js-sun').addClass('d-none');
			}

			if (window.matchMedia('(prefers-color-scheme: light)').matches) {
				localStorage.setItem('tablerTheme', 'light');
				body.attr('data-bs-theme', 'light');
				$('.js-moon').addClass('d-none');
			}
		}
	} else {
		console.error('Browser doesn\'t support window.matchMedia');
	}
});

