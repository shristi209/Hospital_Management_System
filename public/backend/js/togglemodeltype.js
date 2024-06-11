document.addEventListener('DOMContentLoaded', function() {

    const menuType = document.getElementById('menu_type_select');
    const pageSection = document.getElementById('page_section');
    const modalSection = document.getElementById('modal_section');
    const linkSection = document.getElementById('link_section');

    function toggleSections() {
        const selectedType = menuType.value;
        pageSection.style.display = selectedType === '1' ? 'block' : 'none';
        modalSection.style.display = selectedType === '2' ? 'block' : 'none';
        linkSection.style.display = selectedType === '3' ? 'block' : 'none';
    }

    menuType.addEventListener('change', toggleSections);
    console(menuType);
    toggleSections();
});
