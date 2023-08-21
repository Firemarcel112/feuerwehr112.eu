document.addEventListener('DOMContentLoaded', () => {
	let toggle = document.querySelector('.toggle-theme');

	toggle.addEventListener('click', () => {
		let body = document.querySelector('body');
		body.classList.toggle('theme-dark');


		if(body.classList.contains('theme-dark'))
		{
			localStorage.setItem('tablerTheme', 'dark');
			body.setAttribute('data-bs-theme', 'dark');
		}
		else
		{
			localStorage.setItem('tablerTheme', 'light');
			body.setAttribute('data-bs-theme', 'light');
		}
	});
	if(window.matchMedia)
	{
		let body = document.querySelector('body');
		if(localStorage.getItem('tablerTheme') != null)
		{
			body.classList.add('theme-' + localStorage.getItem('tablerTheme'));
			body.setAttribute('data-bs-theme', localStorage.getItem('tablerTheme'));
		}
		else
		{
			if(window.matchMedia('(prefers-color-scheme: dark)').matches)
			{
				localStorage.setItem('tablerTheme', 'dark')
				body.setAttribute('data-bs-theme', 'dark');
			}

			if(window.matchMedia('(prefers-color-scheme: light)').matches)
			{
				let body = document.querySelector('body');
				localStorage.setItem('tablerTheme', 'light')
				body.setAttribute('data-bs-theme', 'light');
			}
		}

	}
	else
	{
		console.error('Browser doesn\'t support window.matchMedia')
	}
});

