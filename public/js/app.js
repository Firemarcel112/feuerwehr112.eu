// Bootstrap
document.addEventListener('DOMContentLoaded', () => {
	let toggle = document.querySelector('.toggle-theme');
	if(typeof toggle != 'undefined')
	{
		toggle.addEventListener('click', () => {
			let body = document.querySelector('body');
			body.classList.toggle('theme-dark');

			if(body.classList.contains('theme-dark'))
			{
				localStorage.setItem('tablerTheme', 'dark');
				body.setAttribute('data-bs-theme', 'dark');
				var icon_moon = jQuery('.js-moon');
				icon_moon.addClass('d-none');
				var icon_sun = jQuery('.js-sun');
				icon_sun.removeClass('d-none');
			}
			else
			{
				localStorage.setItem('tablerTheme', 'light');
				body.setAttribute('data-bs-theme', 'light');
				var icon_moon = jQuery('.js-moon');
				icon_moon.removeClass('d-none');
				var icon_sun = jQuery('.js-sun');
				icon_sun.addClass('d-none');
			}
		});
	}

	if(window.matchMedia)
	{
		let body = document.querySelector('body');
		if(localStorage.getItem('tablerTheme') != null)
		{
			var theme = localStorage.getItem('tablerTheme');
			body.classList.add('theme-' + theme);
			body.setAttribute('data-bs-theme', theme);
			switch(theme)
			{
				case 'dark':
					var icon_moon = jQuery('.js-moon');
					icon_moon.addClass('d-none');
					var icon_sun = jQuery('.js-sun');
					icon_sun.removeClass('d-none');
					break;
				case 'light':
					var icon_moon = jQuery('.js-moon');
					icon_moon.removeClass('d-none');
					var icon_sun = jQuery('.js-sun');
					icon_sun.addClass('d-none');
				break;
			}
		}
		else
		{
			if(window.matchMedia('(prefers-color-scheme: dark)').matches)
			{
				localStorage.setItem('tablerTheme', 'dark')
				body.setAttribute('data-bs-theme', 'dark');
				var icon = jQuery('.js-sun');
				icon.addClass('d-none');
			}

			if(window.matchMedia('(prefers-color-scheme: light)').matches)
			{
				let body = document.querySelector('body');
				localStorage.setItem('tablerTheme', 'light')
				body.setAttribute('data-bs-theme', 'light');
				var icon = jQuery('.js-moon');
				icon.addClass('d-none');
			}
		}

	}
	else
	{
		console.error('Browser doesn\'t support window.matchMedia')
	}
});

