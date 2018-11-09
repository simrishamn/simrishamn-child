/**
 * Simrishamn helpers
 */
export default class Helpers {
    /**
     * Focus an element in the dom
     *
     * @param {string} selector CSS selector for the element to focus
     * @return {boolean} true if the element was visible and could be focused,
     * otherwise false
     */
    focusElement(selector) {
        const jqueryElement = $(selector);
        const isVisible = $(jqueryElement).is(':visible');

        if (isVisible) {
            $(jqueryElement).focus();
        }

        return isVisible;
    }

    /**
     * Delay the invocation of a function call
     *
     * @param {Function} func the function call to delay
     * @param {number} delay The delay in milliseconds
     * @return {Promise} A promise which resolves to the function result after
     * it has completed its execution
     */
    delayedInvokation(func, delay) {
        return new Promise((resolve) => {
            setTimeout(() => resolve(func()), delay);
        });
    }

    /**
     * Try to invoke a function until it returns true
     *
     * @param {Function} func the function to invoke until it returns true
     * @param {number} tryInterval the interval between tries in ms
     * @param {number} maximumTries the maximum number of tries
     * @param {number} [currentTry] the current number of tries (defaults to 0)
     * @return {Promise} A promise which resolves to the function result after
     * it has completed successfully
     */
    tryInvoke(func, tryInterval, maximumTries, currentTry = 0) {
        return Promise.resolve()
            .then(() => {
                if (currentTry >= maximumTries) {
                    throw new Error(`Never successfully invoked ${func}. Reached maximum tries: ${maximumTries}.`);
                }

                return func();
            }).then((result) => {
                if (result) {
                    return result;
                }

                return this.delayedInvokation(() => this.tryInvoke(func, tryInterval, maximumTries, (currentTry + 1)),
                    tryInterval);
            }).catch((reason) => {
                console.error(reason);
            });
    }

    /**
     * Toggle the menu
     */
    toggleMenu(el) {
        const menuTriggerSelector = '.menu-trigger';
        const isActiveClass = 'is-active';
        const toggleActive = !$(menuTriggerSelector).hasClass(isActiveClass);

        if (toggleActive) {
            this.tryInvoke(() => this.focusElement('#mobile-menu li:first a'), 10, 100);
        }

        el.setAttribute('aria-expanded', toggleActive);
        $(menuTriggerSelector).toggleClass(isActiveClass);
    }
}
