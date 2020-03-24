class TypeWriter {
    
    /**
     * @param  {HTMLElement} txtElement
     * @param  {Array} words
     * @param  {String} [wait=3000] 
     */
    constructor(txtElement, words, wait = 3000) {
        this.txtElement = txtElement;
        this.words = words;
        this.txt = '';
        this.wordIndex = 0;
        this.wait = parseInt(wait, 10);
        this.type();
        this.isDeleting = false;
    }

    
    /**
     * Infinite type loop
     */
    type() {
        // Current index of the word in the array
        const current = this.wordIndex % this.words.length;

        // Get full text of current word
        const fullTxt = this.words[current];

        // Check if it's writing or if it's deleting the word
        if (this.isDeleting) {
            // Remove a char
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            // Add a char
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        // Insert txt into html element
        this.txtElement.innerHTML = `<span class="txt">${this.txt}</span>`;

        // Set writing typeSpeed
        let typeSpeed = 150;

        if (this.isDeleting) {
            typeSpeed /= 2;
        }

        // if word is complete then change to the next one
        if (!this.isDeleting && this.txt === fullTxt) {
            this.isDeleting = true;
            // Make a pause at the end of the word or writing phrase
            typeSpeed = this.wait;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.wordIndex++;
            // do a little pause after deleting the word or phrase
            typeSpeed = 300;
        }

        setTimeout(() => this.type(), typeSpeed);
    }
}

document.addEventListener('DOMContentLoaded', init);

function init() {
    const txtElement = document.querySelector('.txt-type');
    const words = JSON.parse(txtElement.getAttribute("data-words"));
    const wait = txtElement.getAttribute("data-wait");
    // Init TypeWriter
    new TypeWriter(txtElement, words, wait);
}
