(function () {
    const navigation = document.querySelector('.site-navigation');
    const toggle = document.querySelector('.menu-toggle');

    if (!navigation || !toggle) {
        return;
    }

    if (typeof careliusTheme === 'object' && 'menuToggleLabel' in careliusTheme) {
        toggle.setAttribute('aria-label', careliusTheme.menuToggleLabel);
    }

    const toggleMenu = () => {
        const isExpanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!isExpanded));
        navigation.classList.toggle('open');
    };

    toggle.addEventListener('click', toggleMenu);
    toggle.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            toggleMenu();
        }
    });

    document.addEventListener('click', (event) => {
        if (!navigation.contains(event.target) && !toggle.contains(event.target)) {
            navigation.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });
})();
