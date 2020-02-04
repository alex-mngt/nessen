document.addEventListener('DOMContentLoaded', (event) => {
    let axisWrappers = document.getElementsByClassName('axis-wrapper');
    for (let i = 0; i < 3; i++) {
        let expanded = false;
        let titleHeigth = axisWrappers[i].getElementsByClassName('title-wrapper')[0].getBoundingClientRect().height;
        axisWrappers[i].style.height = `${titleHeigth}px`;
        let titleWrapper = axisWrappers[i].getElementsByClassName('title-wrapper')[0];

        titleWrapper.addEventListener('click', (event) => {
            if (!expanded) {
                titleWrapper.parentNode.style.paddingBottom = `${titleWrapper.parentNode.getElementsByClassName('content')[0].getBoundingClientRect().height}px`;
                titleWrapper.querySelector('div .cross-helper').classList.add('rotated');
                expanded = true;
            } else {
                titleWrapper.parentNode.style.paddingBottom = `0`;
                titleWrapper.querySelector('div .cross-helper').classList.remove('rotated');
                expanded = false;
            }
        })
    }
})