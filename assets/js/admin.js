/**
 * Swatch, settings screen behaviour.
 *
 * One job: keep the "Swatches in the shop loop" row honest about the master
 * switch above it. With swatches off the row reads as inactive and says why,
 * so nobody ticks a box that quietly does nothing.
 *
 * Progressive enhancement only. The same state is rendered server-side from
 * the saved option, so with JavaScript off the row is still correct, still
 * reachable and still saves. Nothing here is the only way to reach a field.
 */
(function () {
    'use strict';

    var STILL = window.matchMedia
        ? window.matchMedia('(prefers-reduced-motion: reduce)')
        : null;

    function prefersStillness() {
        return !!(STILL && STILL.matches);
    }

    /** Reveal or retire the "this does nothing yet" note. */
    function note(el, show) {
        if (!el) {
            return;
        }

        if (show) {
            el.hidden = false;
            // Next frame, so the transition has a start state to run from.
            window.requestAnimationFrame(function () {
                el.classList.add('is-shown');
            });
            return;
        }

        el.classList.remove('is-shown');

        if (prefersStillness()) {
            el.hidden = true;
            return;
        }

        window.setTimeout(function () {
            if (!el.classList.contains('is-shown')) {
                el.hidden = true;
            }
        }, 220);
    }

    function sync(master, row, immediate) {
        var on = master.checked;

        row.classList.toggle('is-inactive', !on);

        var message = row.querySelector('[data-swatch-dependency]');
        if (immediate) {
            if (message) {
                message.hidden = on;
                message.classList.toggle('is-shown', !on);
            }
            return;
        }

        note(message, !on);
    }

    function init() {
        var master = document.querySelector('[data-swatch-master]');
        var row = document.querySelector('[data-swatch-dependent]');
        var wrap = document.querySelector('.swatch-settings');

        if (!master || !row || !wrap) {
            return;
        }

        // Only now does the stylesheet get to animate anything: without this
        // class every state is painted flat, which is what a no-JS load needs.
        wrap.classList.add('is-enhanced');

        sync(master, row, true);

        master.addEventListener('change', function () {
            sync(master, row, false);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
}());
