/**
 * Add different animation delay to each project container 
 * for an unique effect
 */
function addDelays() {
    let defaultDelay = 50;
    let animatedElements = document.querySelectorAll('.animated');

    animatedElements.forEach(animatedElement => {
        animatedElement.setAttribute('style', 'animation-delay:' + defaultDelay + 'ms;');
        defaultDelay += 100;
    });
}

document.addEventListener('DOMContentLoaded', function() {
    addDelays();
});